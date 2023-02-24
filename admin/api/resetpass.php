<?php
require_once("dbconfig.php");


$mobile = $_POST['mobile'];
$pass = $_POST['pass'];
$ciphering = "AES-128-CTR";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$encryption_iv = '4289843533322139';
$encryption_key = "orgaNicSaga";
$encryption = openssl_encrypt($pass, $ciphering,
            $encryption_key, $options, $encryption_iv);
$query = "UPDATE tbl_users
SET password = '$encryption'
WHERE mobile = '$mobile'";
$res = mysqli_query($con,$query);
$data = mysqli_num_rows($res);
if($res){
    $sql = "SELECT id FROM tbl_users WHERE mobile = '$mobile'";
    $res = mysqli_query($con,$sql);
    $data = mysqli_fetch_row($res);
    echo json_encode($data);
    // echo json_encode("true");
}
else{
    echo json_encode("false");
}
?>