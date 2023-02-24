<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(empty($this->session->userdata('aid'))){
			redirect(base_url("Auth"));
		}
		$this->load->model("Order_model",'om');
		$this->load->model("Customer_model",'cm');
	}

	public function index()
	{
		// print_r($this->session->userdata());die;
		$data = array();
		$data['orders'] = $this->om->getAllOrder();	
		$this->load->view('orders/orders-list',$data);
	}
	
	public function ajaxOrderDetails(){
		$order_id = $this->input->post("order_id");
		$order_data = $this->om->getAllOrderDetails($order_id);
		$str = "";
		$total = 0;
		$total_gst=0;
		foreach ($order_data as $ord) {
		    $gst=$ord['gst'];
		    $gst_price=$ord['special_price']*$gst;
		    $total+=$ord['special_price']*$ord['qty'];
		    $total_gst=$gst_price+$ord['special_price']-$ord['promo_discount'];
		    
		    
			$str.="<tr><td>".$ord['product_name']." - ".$ord['variant']."</td>";
			$str.="<td>".$ord['qty']."</td>";
			$str.="<td>".$ord['special_price']."</td>";
			$str.="<td>".$total_gst."</td>";
			$str.="<td>".$ord['promo_discount']."</td>";
			$str.="<td>".$total_gst."</td></tr>";
// 			$total +=$gst_price;
		}
		$str.="<tr><td colspan='5' style='text-align:right'>Total</td><td>".number_format($total,2)."</td></tr>";

		echo $str;

	}
	
	public function status(){
		 $id = $this->input->post("id");
		 $status = $this->input->post("status");
		 
		 $order_data = $this->om->getOrderDetailbyid($id);
// 		 $order_data1 = $this->om->getAllOrderDetails($id);
		 
// 		 echo "<pre>"; print_r($order_data1);
		
        
		if($order_data[0]['status'] == $status){
			$this->session->set_flashdata("error","Already Placed Successfully...");
// 		 redirect(base_url("Orders"));
		}
		if($order_data[0]['status'] == $status){
			$this->session->set_flashdata("error","Already Packed Successfully...");
// 		 redirect(base_url("Orders"));
		}
		if($order_data[0]['status'] == $status){
			$this->session->set_flashdata("error","Already Shipped Successfully...");
// 		 redirect(base_url("Orders"));
		}
		if($order_data[0]['status'] == $status){
			$this->session->set_flashdata("error","Already Delivered Successfully...");
// 		 redirect(base_url("Orders"));
		}


	
		 
		 
		  
		 
// 		echo "<pre>"; print_r($order_data); 
		 
		 
		 $data['userdetails']=$this->cm->getUserDetails($order_data[0]['user_id']);
		$userdetails=$this->cm->getUserDetails($order_data[0]['user_id']);
        
        // echo "<pre>"; print_r($userdetails);
        // echo exit();
        
		$data['useraddress']=$this->cm->getUserAddress($order_data[0]['user_id']);
		$useraddress=$this->cm->getUserAddress($order_data[0]['user_id']);
        $codamount=0;

        	$order_details = $this->db->where("order_id",$id)->get("tbl_order_details")->result_array();
        	
        // 	echo "<pre>"; print_r($order_details);
        // 	exit();
        	
       if($status == "Packed"){
			$order = $this->db->where("id",$id)->get("tbl_orders")->row_array();
// 			echo $order['address_id'];
// 			exit();
			$order_details = $this->db->where("order_id",$id)->get("tbl_order_details")->result_array();
			$address = $this->db->where("id",$order['address_id'])->get("tbl_address")->row_array();
			
			
			if($order['payment_type']=='cod'){
			    $payment_mode='cod';
			    $codamount=$order['amount'];
			}else{
			    $payment_mode='prepaid';
			}
			
// 			echo "<pre>"; print_r($order);
// 			exit();
            // $order_id='u-'.$order['id'];
            $order_id='ORD-'.rand();
            
            
            
            	$dataArray = array(
				  "order_id"=> $order_id,
				  "order_date"=> date("Y-m-d H:i:s",strtotime($order['created'])),
				  "pickup_location"=> "Primary",
				  "channel_id"=> "3400609",
				  "comment"=> "",
				  "billing_customer_name"=> $address['name'],
				  "billing_last_name"=> $address['address2'],
				  "billing_address"=> $address['address1'],
				  "billing_address_2"=> " ",
				  "billing_city"=> $address['city'],
				  "billing_pincode"=> $address['pincode'],
				  "billing_state"=> $address['state'],
				  "billing_country"=> "India",
				  "billing_email"=> "",
				  "billing_phone"=> $address['phone'],
				  "shipping_is_billing"=> true,
				  "shipping_customer_name"=> $address['name'],
				  "shipping_last_name"=> " ",
				  "shipping_address"=> $address['address1'],
				  "shipping_address_2"=> $address['address2'],
				  "shipping_city"=> $address['city'],
				  "shipping_pincode"=> $address['pincode'],
				  "shipping_country"=> "India",
				  "shipping_state"=> $address['state'],
				  "shipping_email"=>"",
				  "shipping_phone"=> $address['phone'],
				  "order_items"=> array(),
				  "payment_method"=> $payment_mode,
				  "shipping_charges"=> 0,
				  "giftwrap_charges"=> 0,
				  "transaction_charges"=> 0,
				  "total_discount"=> 0,
				  "sub_total"=> $order["amount"],
				  "length"=> 25,
				  "breadth"=> 25,
				  "height"=> 5,
				  "weight"=> 1

			  );
			$total = 0;
			foreach($order_details as $od){
				
				$sku='sku-'.rand();
				$dataArray['order_items'][] =  array(
											    "name"=> $od['product_name'],
										        "sku"=> $sku,
										        "units"=> $od['qty'],
										        "selling_price"=> $od['special_price'],
										        "discount"=>0,
										        "tax"=> $od['gst'],
										        "hsn"=> ""
											);
			}
			

// 			echo json_encode($dataArray);
// die;

		 $curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://apiv2.shiprocket.in/v1/external/orders/create/adhoc",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  
			  CURLOPT_POSTFIELDS => json_encode($dataArray),
			  CURLOPT_HTTPHEADER => array(
			    "authorization: Bearer ".$this->session->userdata("shiprocket_token"),
			    "cache-control: no-cache",
			    "content-type: application/json",
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);
			
// 			echo $response;
// 			echo $err;
// 			die;

			$res = json_decode($response,true);
			curl_close($curl);
			
			if($res['status_code']=='1'){
			    
			    	$arr=array(
					   'status'=>$order['status']
				   );
				   
			   
					$this->db->where("id",$id);
					$this->db->update("tbl_orders", $arr);
					
					
						
		 
		 $arr=array(
		   'product_status'=>$order['status']
	   );
	   
   
		$this->db->where("order_id",$id);
		$this->db->update("tbl_order_details", $arr);
		
		
		$msg = "Status Updated successfully";
					$this->session->set_flashdata("success",$msg);
					redirect(base_url("Orders"));
					
		
			}else{
			    
			    $msg = "There is something issue from shipping side : ".json_encode($res['errors']);
					$this->session->set_flashdata("error",$msg);
					redirect(base_url("Orders"));
			    
			}
			    
			
            
            
            
    
            


       }
		 
		 
		 
	
		

	}
	
	public function delete($id){
		$this->db->where("id",$id);
		$this->db->delete("tbl_orders");

		$this->db->where("order_id",$id);
		$this->db->delete("tbl_order_details");
		$this->session->set_flashdata("success","Product Deleted Successfully");
		redirect(base_url("Orders"));
	}
	
	public function invoice($id)
	{   
		$data = array();
		
		 
		 
		 $order_data = $this->om->getOrderDetailbyid($id);

		$data['userdetails']=$this->cm->getUserDetails($order_data[0]['user_id']);
// 		$userdetails=$this->cm->getUserDetails($order_data[0]['user_id']);
		
	

		$data['useraddress']=$this->cm->getUserAddress($order_data[0]['user_id']);

	    $data['orders']=$this->om->getOrderDetailbyidemail($order_data[0]['id']);

	    $orders=$this->om->getOrderDetailbyidemail($order_data[0]['id']);

// 		$orderno=$this->Order_model->getOrderDetailbyid($countvalue);
		
// 		foreach($orderno as $ord){
		   
// 		   $data['order_details']=$this->Order_model->getAllOrderDetails($ord['id']);
//         	$order_details=$this->Order_model->getAllOrderDetails($ord['id']);
// 		  //  echo "<pre>";print_r($order_details);
		    		
// 		}
        	
		$this->load->view('orders/invoice',$data);
	}
	
	
// 	delhivery 
// 	public function status(){
// 		 $id = $this->input->post("id");
// 		 $status = $this->input->post("status");
		 
// 		 $order_data = $this->om->getOrderDetailbyid($id);
// // 		 $order_data1 = $this->om->getAllOrderDetails($id);
		 
// // 		 echo "<pre>"; print_r($order_data1);
		
        
// 		if($order_data[0]['status'] == $status){
// 			$this->session->set_flashdata("error","Already Placed Successfully...");
// // 		 redirect(base_url("Orders"));
// 		}
// 		if($order_data[0]['status'] == $status){
// 			$this->session->set_flashdata("error","Already Packed Successfully...");
// // 		 redirect(base_url("Orders"));
// 		}
// 		if($order_data[0]['status'] == $status){
// 			$this->session->set_flashdata("error","Already Shipped Successfully...");
// // 		 redirect(base_url("Orders"));
// 		}
// 		if($order_data[0]['status'] == $status){
// 			$this->session->set_flashdata("error","Already Delivered Successfully...");
// // 		 redirect(base_url("Orders"));
// 		}


// 		$arr=array(
// 			'status'=>$status
// 		);
		
	
// 		 $this->db->where("id",$id);
// 		 $this->db->update("tbl_orders", $arr);
		 
		 
// 		 $arr=array(
// 		   'product_status'=>$status
// 	   );
	   
   
// 		$this->db->where("order_id",$id);
// 		$this->db->update("tbl_order_details", $arr);
		 
		 
		  
		 
// // 		echo "<pre>"; print_r($order_data); 
		 
		 
// 		 $data['userdetails']=$this->cm->getUserDetails($order_data[0]['user_id']);
// 		$userdetails=$this->cm->getUserDetails($order_data[0]['user_id']);
        
//         // echo "<pre>"; print_r($userdetails);
//         // echo exit();
        
// 		$data['useraddress']=$this->cm->getUserAddress($order_data[0]['user_id']);
// 		$useraddress=$this->cm->getUserAddress($order_data[0]['user_id']);
//         $codamount=0;

//         	$order_details = $this->db->where("order_id",$id)->get("tbl_order_details")->result_array();
        	
//         // 	echo "<pre>"; print_r($order_details);
//         // 	exit();
        	
//       if($status == "Packed"){
// 			$order = $this->db->where("id",$id)->get("tbl_orders")->row_array();
// 			$order_details = $this->db->where("order_id",$id)->get("tbl_order_details")->result_array();
// 			$address = $this->db->where("id",$order['address_id'])->get("tbl_address")->row_array();
			
			
// 			if($order['payment_type']=='cod'){
// 			    $payment_mode='cod';
// 			    $codamount=$order['amount'];
// 			}else{
// 			    $payment_mode='prepaid';
// 			}
			
// // 			echo "<pre>"; print_r($order);
// // 			exit();
//             // $order_id='u-'.$order['id'];
//             $order_id='ORD-'.rand();
			
// 		    $dataArray = array(
		        
// 				    "pickup_location" => array(
//                         "add" => "Gala No.A-4, Nutan Nivas,Veer Savarkar nagar, Vasai Road (W) 401202 Dist. Palghar.",
//                         "country"=> "India",
//                         "pin"=> "401202",
//                         "phone"=> "9867955449",
//                         "city"=> "Vasai",
//                         "name"=> "Momai Creations",
//                         "state"=> "Maharastra"
//                     ),
//                     "shipments" => array(
//                         array(
//                             "country"=> "India",
//                             "city"=> $address['city'],
//                             "seller_add"=> "Gala No.A-4, Nutan Nivas,Veer Savarkar nagar, Vasai Road (W) 401202 Dist. Palghar.",
//                             "cod_amount"=> $codamount,
//                             "return_phone"=> $address['phone'],
//                             "seller_inv_date"=> "",
//                             "seller_name"=> "Momai Creations",
//                             "pin"=> $address['pincode'],
//                             "seller_inv"=> "",
//                             "state"=> $address['state'],
//                             "return_name"=> "Momai Creations",
//                             "order"=> $order_id,
//                             "add"=> $address['address1'].$address['address2'],
//                             "payment_mode"=> $payment_mode,
//                             "quantity"=> "1",
//                             "return_add"=> $address['address1'].$address['address2'],
//                             "seller_cst"=> "",
//                             "seller_tin"=> "",
//                             "phone"=> $address['phone'],
//                             "total_amount"=> $order["amount"],
//                             "name"=> $address['name'],
//                             "return_country"=> "India",
//                             "return_city"=> $address['city'],
//                             "return_state"=> $address['state'],
//                             "return_pin"=> $address['pincode'],
//                             )
                            
//                         )

// 			  );
			  
// 			  $arr="format=json&data=".json_encode($dataArray);
// 			 // print_r($arr);
// 			 // exit();

//             $curl = curl_init();
            
//             curl_setopt_array($curl, array(
//             CURLOPT_URL => "https://track.delhivery.com/api/cmu/create.json",
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_ENCODING => "",
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 30,
//             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//             CURLOPT_CUSTOMREQUEST => "POST",
//             CURLOPT_POSTFIELDS => $arr,
//             CURLOPT_HTTPHEADER => array(
//             "authorization: Token bce8aa6225246548a73132f1c9212862357eaa2e",
//             "cache-control: no-cache",
//             "content-type: application/json",
//             // "postman-token: 29542d1d-652f-455c-ad99-87ea2de606b6"
//             ),
//             ));
            
//             $response = curl_exec($curl);
//             $err = curl_error($curl);
            
//             curl_close($curl);
// //             echo $response;
// // 			echo "<br>";
// // 			die;
            
//             if ($err) {
//             echo "cURL Error #:" . $err;
//             } else {
//             // echo $response;
            
//             	 $this->session->set_flashdata("success","Status Updated Successfully...");
// 		 redirect(base_url("Orders"));
//             }
            


//       }
		 
		 
		 
	
		

// 	}

}
