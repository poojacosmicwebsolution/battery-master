<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>UV + </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <style>
        @media only screen and (min-width: 570px){
        .invoice{
            width: 100%;
            margin-left: auto;
            margin-right: auto;
            }
            .invoice table{
            width: 100%;
            border-collapse: collapse;
        }
        }
        @media only screen and (max-width: 620px) {
            .invoice{
            width: 100%;
            margin-left: auto;
            margin-right: auto;
            }
            .invoice table{
            width: 100%;
            border-collapse: collapse;
        }
        }

        .invoice{
            width: 880px;
            margin-left: auto;
            margin-right: auto;
            font-family: 'Roboto', sans-serif;
        }
        .invoice table{
            width: 100%;
            border-collapse: collapse;
        }
        .invoice .invoicedetails{
            font-size: 13px;
            text-align: center;
        }
        .invoice .gstin tr{
            border: 1px solid #000;

        }
        .invoice .gstin tr p{
            font-size: 14px;
            text-align: center;
           
        }
        .invoice .gstin{
            margin-top:20px;
        }
        .invoice .gstin tr p span{
            margin-left:20px
        }
        .invoice .customer p{
            font-size: 20px;
            text-align: left !important;
            padding-left: 10px;
        }
        .invoice .product_details tr td{
            border: 1px solid #000;
            text-align: center;
        }
        .invoice .footer tr.brd{
            border: 1px solid #000;
        }
        .invoice .footer tr td{
            /* line-height: 0; */
            
        }
        
        .invoice .footer .acc tr td{
            /* border: 1px solid #000; */
            text-align: center;
            line-height: 0;
        }
        .print{
        		    background: #f00;
			    color: #fff;
			    text-decoration: none;
			    padding: 9px 10px;
			    border-radius: 6px;
			    display: table;
			    margin: 0 auto;
			    text-align: center;
			    margin-top: 20px;
        	}
        
    </style>
</head>
<body>
    <div class='invoice'>
        <table>
            <tbody>
                <tr>
                    <td style="text-align: center; font-weight: bold;">GST TAX INVOICE</td>
                </tr>
            </tbody>
        </table>
        <table>
            <tbody>
                <?php
        			 //   echo "<pre>"; print_r($userdetails);
        			foreach($userdetails as $uname){
        				     $username=$uname['username'];
        				     $useremail=$uname['email'];
        				    
        				} 
        				
        				foreach($useraddress as $userdetail){
        				    $usermobile=$userdetail['phone'];
        				    $add1=$userdetail['address1'];
        				    $add2=$userdetail['address2'];
        				    $add3=$userdetail['area'];
        				    $add4=$userdetail['city'];
        				    $add5=$userdetail['pincode'];
        				    $state=$userdetail['state'];
        				    
        				    
        				}
        				
        				?>
        				
                
                <tr>
                    <td class='logo' style='width:20%'>
                        <img src='https://uvplus.in/assets/images/logo/uv.png' width='150px'>
                    </td>
                    <td class='invoicedetails' style='width:80%'>
                        <!--<h1>MOMAI CREATIONS</h1>-->
                        <p>Gala No.A-4, Nutan Nivas,Veer Savarkar Nagar,Opp.Vishakarma Hall,Vasai Road(W) 401202</p>
                        <p>DIST - PALGHAR  CUSTOMER CARE NO. : 797290498 EMAIL : uvplus.mum@gmail.com</p>
                        
                    </td>
                </tr>
                
            </tbody>
        </table>
        <table class="gstin">
            <tbody>
                <tr>
                    <td><p style=" line-height: 0;">GSTIN : 27ABNFM9950B1ZY </p></td>
                    <td><p style=" line-height: 0;">STATE : <?php echo $state ?></p></td>
                    
                </tr>
                <tr class="customer">
                    <td style="background:#c1c1c1; width:50%; line-height: 0; border-right: 1px solid #000;">
                        <p style="text-align: center !important;">Billed To</p></td>
                    
                    	<?php
        				        
        				foreach($orders as $ord){
        				        $order_no=$ord['order_no'];
        				        $order_date=$ord['created'];
        				        $order_modified=$ord['created'];
        				         $promo_dis=$ord['promo_discount'];
        				        
        				        if($promo_dis>0){
        				            $promo_dis;
        				        }else{
        				            $promo_dis=0;
        				        }
        				        
        				        
        				        
        				    } ?>
        				    
                    <td rowspan="4" style="width:50%">
                        <p>INVOCIE No: UV-<?php echo date("y-m" ,strtotime($order_date)).'-'.$ord['id']; ?></p>
                        <p>DATE:  <?php echo date("d-m-y" ,strtotime($order_modified))?></p>
                        	<p>ORDER NO: <?php echo $order_no ?></p>
                        	<p>ORDER DATE : <?php echo $order_date ?></p>
                       
                    </td>
                </tr>
                <tr class="customer">
                    <td style="width:50%; border-right: 1px solid #000;"><p>Name: <strong><?php echo $username ?></strong></p>
                    
                    
                        <p><?php echo $add1.','.$add2.','.$add3.','.$add4.','.$add5 ?></p>
                        <p>Mobile no : <?php echo $usermobile ?> EMAIL : <?php echo $useremail ?></p>
                        <p><strong>GSTIN</strong>: 27AKCPM6176H1ZX   <strong>State</strong> : <?php echo $state ?></p>
                    </td>
                    
                
                </tr>
            </tbody>
        </table>
         <?php $order_details=$this->om->getAllOrderDetailss($ord['id']);
                
            ?>
        <table class="product_details">
            <thead>
                <tr style="background:#c1c1c1">
                    <td>SR</td>
                    <td>Item Name</td>
                    <td>Shade</td>
                    <td>HSN</td>
                    <td>Size / Pcs</td>
                    <!--<td>Pcs</td>-->
                    <td>Rate</td>
                    <td>Amount</td>
                </tr>
            </thead>
            <tbody>
                <?php 
	        		       $i=1;
	        		       $sub_total=0;
	        		       $cal_gst=0;
	        		       $grand=0;
	        		       $qty=0;
	        		     //  echo "<pre>"; print_r($order_details);
	        		    foreach($order_details as $ord_det){ 
	        		         $gst=$ord_det['gst']*100;
	        		        $single=$ord_det['special_price']*$ord_det['qty'];
	        		        $sub_total+=$single;
	        		        
	        		        
	        		        $show_gst_rate=$gst/2;
	        		        
	        		        $withgst=$single*$ord_det['gst'];
	        		         $cal_gst+=$withgst;
	        		        $div_gst=$cal_gst/2;
	        		        $qty+=$ord_det['qty'];
	        		        
	        		        $grand=$sub_total-$promo_dis;
	        		        
	        		    ?>
                <tr>
                    <td><?php echo $i; ?>.</td>
                    <td><?php echo $ord_det['product_name']; ?></td>
                    <td><?php echo $ord_det['value']; ?></td>
                    <td><?php echo $ord_det['hsn_code']; ?></td>
                    <td><?php echo $ord_det['variant'].'-'.$ord_det['qty']; ?></td>
                    <!--<td><?php echo $ord_det['qty'] ?></td>-->
                    <td><?php echo $ord_det['price'] ?></td>
                    <td><?php echo $ord_det['special_price'] ?></td>
                </tr>

               <?php } ?>
            </tbody>
        </table>
        <table class="footer" >
            <tbody>
                <tr class="brd">
                    <td style="width: 60%;  border-right: 1px solid #000;">
                        <table>
                            <tbody>
                                
                                <tr style="border-bottom: 1px solid #000;">
                                    <td colspan="3" style="width: 100%;">
                                        <?php $number = $grand;
   $no = floor($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'one', '2' => 'two',
    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
    '7' => 'seven', '8' => 'eight', '9' => 'nine',
    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
    '13' => 'thirteen', '14' => 'fourteen',
    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
    '60' => 'sixty', '70' => 'seventy',
    '80' => 'eighty', '90' => 'ninety');
   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
 
 ?>
                                        <p style="padding-left:20px; ">In Words : <?php  echo ucwords(strtolower($result)) . "Rupees  Only /-" ; ?></p>
                                    </td>
                                </tr>
                        
                                
                            </tbody>
                        </table>
                    </td>
                    
                    <td style="width: 40%;">
                        
                        <table class="acc">
                            <tbody>
                                <?php if(!empty($promo_dis)){ ?>
                                <tr>
                                    <td style="border-right: 1px solid #000;">
                                        <p>Promo Discount :</p>
                                    </td>
                                    <td>
                                        <p><?php echo round($promo_dis,2) ?></p>
                                    </td>
                                </tr>
                                <?php } ?>
                                
                                <tr>
                                    <td style="border-right: 1px solid #000;">
                                        <p>Total Amt Before Tax :</p>
                                    </td>
                                    <td>
                                        <p><?php echo $grand ?></p>
                                    </td>
                                </tr>
                                <?php if($state=="Maharashtra"){ ?>
                                <tr>
                                    <td style="border-right: 1px solid #000;">
                                        <p>CGST <?php echo $show_gst_rate ?>% :</p>
                                    </td>
                                    <td>
                                        <p><?php echo round($div_gst ,2) ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border-right: 1px solid #000;">
                                        <p> SGST <?php echo $show_gst_rate ?>% :</p>
                                    </td>
                                    <td>
                                        <p><?php echo round($div_gst ,2) ?></p>
                                    </td>
                                </tr>
                                <?php }else{ ?>
                                <tr>
                                    <td style="border-right: 1px solid #000;">
                                        <p>IGST <?php echo $gst ?>%  :</p>
                                    </td>
                                    <td>
                                        <p><?php echo round($cal_gst, 2) ?></p>
                                    </td>
                                <!--</tr>-->
                                <?php } ?>
                                
                                <tr style="background-color: #c1c1c1;">
                                    <td style="border-right: 1px solid #000;"><p>Grand Total :</p></td>
                                    <td><p><?php echo $grand ?></p></td>
                                </tr>
                                <!--<tr style="width: 100%;">-->
                                <!--    <td style="text-align: center;">-->
                                <!--        <p>FOR MOMAI CREATIONS</p>-->
                                <!--        <p>Partner</p>-->
                                <!--    </td>-->
                                <!--</tr>-->
                            </tbody>
                        </table>
                    
                    </td>
                    
                </tr>
            </tbody>
        </table>

          <a class="print" href="javascript:window.print()">Print Invoice</a>
        

    </div>
</body>
</html>