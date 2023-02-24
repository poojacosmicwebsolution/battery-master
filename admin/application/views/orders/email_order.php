<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        @media screen and (max-width: 480px) {
            .mobile-hide {
                display: none !important;
            }

            .mobile-center {
                text-align: center !important;
            }
        }

        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
    </style>

<body style="margin: 0 !important; padding: 0 !important; background-color: #eeeeee;" bgcolor="#e32923">
    <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Open Sans, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
        For what reason would it be advisable for me to think about business content? That might be little bit risky to have crew member like them.
    </div>
    
    
    
    
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td align="center" style="background-color: #e32923;" >
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                    <tr>
                        <td align="center" valign="top" style="font-size:0; padding: 15px;" bgcolor="#fff">
                            <div style="display:inline-block; max-width:40%; min-width:100px; vertical-align:top; width:100%;">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                    <tr>
                                        <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 36px; font-weight: 800; line-height: 48px;" class="mobile-center">
                                            <img src="https://babufashion.googlehai.com/admin-dashboard/uploads/media/web-size-01-1635254677-1.jpg" width="200px" >
                                        </td>
                                    </tr>
                                </table>
                            </div>
                          
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 10px 35px 20px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                                <tr>
                                    <?php
                                    // echo "<pre>"; print_r($details);
                                    foreach($details as $detail){
                                        
                                        foreach($detail['order'] as $dtl){
                                             $dtl['id'];
                                        
                                    
                                        
                                    
                                        // exit();
                                        $order_details=$this->om->getOrderDetailbyidemail($dtl['id']);
                                        
                                        
                                        // exit();
                                        }
                                        
        $name=$detail['username'];
        // $pieces = explode(",", $address);
        
        
    } ?>
                                    <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;"> <h2 style="font-size: 20px; line-height: 36px; color: #333333; margin: 0;">Hi <?php echo $name ?>,</h2><br>
                                        <!--<h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;"> Thank You For Your Order! </h2>-->
                                        <?php foreach($order_details as $st){ ?>
                                        <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;"> Your Order have been <?php echo $st['status'] ?></h2><?php } ?>
                                        
                                    </td>
                                    
                                </tr>
                                <tr>
                                   
                                </tr>
                                    
                                <tr>
                                    <td align="left" style="padding-top: 20px;">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td width="33%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;"> Product Name </td>
                                                <td width="33%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;"> QTY </td>
                                                <td width="33%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;"> Amount </td>
                                            </tr>
                                             <?php 
                                            $subtotal=0;
                                            $cal_gst_value=0;
                                            $sub_total=0;
                                            $order_p_details=$this->om->getAllOrderDetails($dtl['id']);
                                            
                                            foreach($order_details as $odtl){
                                                 $promo_dis=$odtl['promo_discount'];
                                                 $order_id=$odtl['order_no'];
                                            
                                            // echo "<pre>"; print_r($order_p_details);
                                             foreach($order_p_details as $det){ 
                                                 $disc=$promo_dis;
                                        $amt_dic = explode(",", $disc);
                                                 
                                                 
                                                 $subtotal+=$det['special_price']*$det['qty'];
                                                     $gst_value=$det['gst']; 
                                                      $single_p=$det['special_price']*$det['qty']; 
                                                     $gst_cal_price=$gst_value*$single_p; 
                                                       $sub1=$single_p+$gst_cal_price;
                                                     $cal_gst_value+=$gst_cal_price;
                                                     $sub_total+=$sub1;
                                                    $div_gst=$cal_gst_value/2;
                                                    
                                                    if($amt_dic[0]>0){
                                                        $final_sub=$sub1-$amt_dic[0];
                                                    }else{
                                                        $final_sub=$sub_total;
                                                    }
                                             ?>
                                            <tr>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;"> <?php echo $det['product_name'] ?> </td>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;"> <?php echo $det['qty'] ?> </td>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;"> &#8377; <?php echo $det['special_price'] ?> </td>
                                                
                                                
                                            </tr>
                                            <?php  
                                                   
                                            } } ?>
                                            

                                            
                                        </table>
                                    </td>
                                </tr>


                                <tr>
                                    <td align="left" style="padding-top: 20px;">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td width="60%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;"> Order No : <?php echo $order_id ?> </td>
                                                <td width="40%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;"> Amount </td>
                                            </tr>
                                            <tr>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;"> Sub Total </td>
                                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;"> &#8377; <?php echo $subtotal ?></td>
                                            </tr>
                                            <tr>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;"> GST </td>
                                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;"> &#8377; <?php echo $div_gst ?> </td>
                                            </tr>
                                            <tr>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;"> SGST </td>
                                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;"> &#8377; <?php echo $div_gst ?> </td>
                                            </tr>

                                            <tr>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;"> Discount </td>
                                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">  <?php echo $amt_dic[0] ? "&#8377;".$amt_dic[0] : 00; ?> </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="padding-top: 20px;">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;"> TOTAL </td>
                                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;"> &#8377; <?php echo $final_sub ?> </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" height="100%" valign="top" width="100%" style="padding: 0 35px 35px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:660px;">
                                <tr>
                                    <td align="center" valign="top" style="font-size:0;">
                                        <!-- <div style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;"> -->
                                            <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                <tr>
                                                    <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
                                                        <p style="font-weight: 800;">Delivery Address</p>
                                                        <?php foreach($details as $detail){ ?>
                                                        <p><?php echo $detail['address'].','. $detail['address1'].','.$detail['area'].','.$detail['city'].','.$detail['pincode']; ?></p>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        <!-- </div> -->
                                       
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style=" padding: 20px; background-color: #000;" bgcolor="#1b9ba3">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                                
                                <tr>
                                    <td align="center" style="padding: 5px 0 0px 0;">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center" style="border-radius: 5px; padding-right: 10px;" > <a href="#" target="_blank" style=""><img src="<?php echo ASSETS ?>assets/images/email/facebook.png" width="30px"></a> </td>

                                                <td align="center" style="border-radius: 5px; padding-right: 10px;" > <a href="#" target="_blank" style=""><img src="<?php echo ASSETS ?>assets/images/email/instagram.png"  width="30px" ></a> </td>

                                                <td align="center" style="border-radius: 5px; padding-right: 10px;"> <a href="#" target="_blank" style=""><img src="<?php echo ASSETS ?>assets/images/email/linkedin.png" width="30px" ></a> </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;">
                                        <h2 style="font-size: 13px; font-weight: 500; line-height: 20px; color: #ffffff; margin: 0;"> Copyright 2021 Babu Fashion </h2>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                </table>
            </td>
        </tr>
    </table>
</body>

</html>