<?php

require_once("dbconfig.php");
header("Access-Control-Allow-Origin: *");
$mobile= $_POST["mobile"];
$pass =$_POST["pass"];

$query = "SELECT * FROM tbl_users WHERE mobile = '$mobile'";
$res = mysqli_query($con,$query);
$data = mysqli_num_rows($res);

if($data == 1){
    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $encryption_iv = '4289843533322139';
    $encryption_key = "orgaNicSaga";
    $encryption = openssl_encrypt($pass, $ciphering,
            $encryption_key, $options, $encryption_iv);
    $query = "SELECT * FROM tbl_users WHERE mobile ='$mobile' and password = '$encryption'";
    $res = mysqli_query($con,$query);
    $data = mysqli_num_rows($res);
    if($data == 1){
        echo json_encode("true");
    }
    else{
        echo json_encode("false");
    }
}
else{
    echo json_encode("dont have an account");
}

?>