<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>UV Plus Invoice</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        
        <style type="text/css">
        *{
        	padding: 0;
        	margin: 0;
        }
        	.invoice{
        		width: 80%;
        		background: #f1f1f1;
        		margin: 0 auto;
        	}
        	.logo img{
        		width: 250px;
        		margin: 0 auto;
        		display: block;
        	}
        	.shipping_details{
        		margin-top: 30px;
        	}
        	.shipping_details tr td{
        		padding: 10px 65px;
        		width: 50%;
        	}
        	.shipping_details h2{
        		/* text-align: center; */
        		margin-bottom: 20px;
        	}
        	.shipping_details tr td p{
        		margin-bottom: 15px;
        		margin-top: 15px;
        	}
        	.pricing{
        		padding: 10px 65px;
        		width: 50%;
        		text-align: center;
        		border-collapse: collapse;
        	}
        	.pricing thead tr{
        		  border: 1px solid #000;
        	}
        	.pricing thead tr th{
        		 padding: 4px; border: 1px solid #c5c5c5;
        	}
        	.pricing tbody tr td{
        		 padding: 4px; border: 1px solid #c5c5c5;
        	}
        	.pricing_table{
        		/* width: 90%; */
        		padding: 10px 65px;
        	}
        	.pricing_detail tr td{
        		width: 50%;
        	}
        	.calculation{
        		padding: 10px 65px;
        	}
        	.calculation tr td{
        		width: 50%;
        		padding: 5px 10px;
        	}
        	.calculation tr{
        		border-bottom: 1px solid #c5c5c5;
        	}
        	.calculation tr td h5{
        		font-size: 17px;
        	}
        	.title{
        		border-top: 1px solid #000;
        		border-bottom: 1px solid #000;
        		text-align: center;
        		margin-top: 20px;
        		margin-bottom: 20px;
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
      
        <div class="invoice">
        	<div class="logo">
        		<img src="https://uvplus.googlehai.com/assets/images/logo/uv.png">
        	</div>

        	<div class="title">
        		<h1>TAX INVOICE</h1>
        	</div>
        	<table class="shipping_details" style="width:100%">
        		<tr >
        			<td style="border-right:1px dotted #bfbfbf">
        				<h2>Shipping Address:</h2>
        				
        			<?php
        			    
        			foreach($userdetails as $uname){
        				     $username=$uname['username'];
        				    
        				} 
        				
        				foreach($useraddress as $userdetails){
        				    $usermobile=$userdetails['phone'];
        				    $add1=$userdetails['address1'];
        				    $add2=$userdetails['address2'];
        				    $add3=$userdetails['area'];
        				    $add4=$userdetails['city'];
        				    $add5=$userdetails['pincode'];
        				    
        				    
        				}
        				
        				?>

        				<p><strong>Mr/Ms:</strong>  <?php echo $username ?>,</p>
        				
        			

        				<p><strong>Address:</strong> <?php echo $add1.','.$add2.','.$add3.','.$add4.','.$add5 ?></p>

							<p><strong>Phone no:</strong> <?php echo $usermobile ?></p>
        			</td>
        			<td>
        				<h2>Invoice Details</h2>
        				
        				
        				<?php
        				        
        				foreach($orders as $ord){
        				        $order_no=$ord['order_no'];
        				        $order_date=$ord['created'];
        				        $order_modified=$ord['created'];
        				        $promo_dis=$ord['promo_discount'];
        				        
        				        if($promo_dis>0){
        				            $promo_dis;
        				        }else{
        				            0;
        				        }
        				        
        				        
        				        
        				    } ?>

        				<p><strong>INVOICE NO. :</strong> UV-<?php echo date("y-m" ,strtotime($order_date)).'-'.$ord['id']; ?></p>
        				<p><strong>INVOICE DATE :</strong> <?php echo $order_modified?></p>
        				<p><strong>ORDER NO. :</strong> <?php echo $order_no ?></p>
        				<p><strong>ORDER DATE : </strong> <?php echo $order_date ?></p>
        			</td>
        		</tr>
        	</table>


        	
            <?php $order_details=$this->om->getAllOrderDetailss($ord['id']);
                
            ?>
            
            
        	<div class="pricing_table">
        		<table class="pricing" style="width:100%">
	        		<thead style="background: #dfdfdf;">
	        			<tr >
		        			<th>Sr.no</th>
		        			<th>Product Name</th>
		        			<th>Qty</th>
		        			<th>Unit Price</th>
		        			<th>Unit Special Price</th>
		        			<th>GST</th>
		        			<th>Total</th>
		        		</tr>
	        		</thead>
	        		<tbody>
	        		    <?php 
	        		       $i=1;
	        		       $sub_total=0;
	        		       $cal_gst=0;
	        		       $grand=0;
	        		    foreach($order_details as $ord_det){ 
	        		        $gst=$ord_det['gst']*100;
	        		        $single=$ord_det['special_price']*$ord_det['qty'];
	        		        $sub_total+=$single;
	        		        
	        		        $withgst=$single*$ord_det['gst'];
	        		        $cal_gst+=$withgst;
	        		        $div_gst=$cal_gst/2;
	        		        
	        		        
	        		        $grand=$sub_total+$withgst-$promo_dis;
	        		        
	        		    ?>
	        			<tr>
		        			<td><?php echo $i; ?></td>
		        			<td><?php echo $ord_det['product_name'].'-'.$ord_det['variant']?></td>
		        			<td><?php echo $ord_det['qty'] ?></td>
		        			<td>₹ <?php echo $ord_det['price'] ?></td>
		        			<td>₹ <?php echo $ord_det['special_price'] ?></td>
		        			<td><?php echo $gst.'%'; ?></td>
		        			<td>₹ <?php echo $single; ?></td>
	        			</tr>
	        			<?php 
	        			$i++;
	        			
	        			} ?>
	        		</tbody>
	        	</table>
        	</div>


        	<div class="pricing_details">
        		<table class="pricing_detail" style="width:100%">
        			<tr>
        				<td></td>
        				<td>
        					<table class="calculation" style="width:100%">
        						<tr>
        							<td><h5>Subtotal</h5></td>
        							<td>₹ <?php echo $sub_total ?></td>
        						</tr>
        						<tr>
        							<td><h5>GST</h5></td>
        							<td>₹ <?php echo round($div_gst ,2) ?></td>
        						</tr>
        						<tr>
        							<td><h5>SGST</h5></td>
        							<td>₹ <?php echo round($div_gst ,2) ?></td>
        						</tr>
        						<tr>
        							<td><h5>Promo Code Discount</h5></td>
        							<td><?php echo '₹ '.$promo_dis  ?></td>
        						</tr>
        						<tr>
        							<td><h5>Shipping</h5></td>
        							<td>Free</td>
        						</tr>

        						<tr>
        							<td><h5>Grand Total</h5></td>
        							<td><strong>₹ <?php echo round($grand,2) ?></strong></td>
        						</tr>
        					</table>
        				</td>
        			</tr>
        		</table>
        	</div>
        </div>

        <a class="print" href="javascript:window.print()">Print Invoice</a>
       
    </body>

</html>
