<?php

require_once("dbconfig.php");

$mobile = $_POST['mobile'];
$pass = $_POST['pass'];
$name = $_POST['name'];
$email = $_POST['email'];

$query = "SELECT * FROM tbl_users WHERE mobile = '$mobile'";
$res = mysqli_query($con,$query);
$data = mysqli_num_rows($res);

if($data == 1){
    echo json_encode("Account exists");
}
else{
    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $encryption_iv = '4289843533322139';
    $encryption_key = "orgaNicSaga";
    $encryption = openssl_encrypt($pass, $ciphering,
            $encryption_key, $options, $encryption_iv);
    $sql = "INSERT INTO tbl_users (username,password,email,mobile,modified,wallet_balance,active,fcm_id) VALUES ('$name','$encryption','$email','$mobile',NOW(),0.0,1,'')";
    $res = mysqli_query($con,$sql);
    if($res){
        echo json_encode("true");
    }
    else{
        echo json_encode("false");
    }
}


?>