<?php

require_once("dbconfig.php");

$mobile = $_POST['mobile'];

$query = "SELECT * FROM tbl_users WHERE mobile = '$mobile'";
$res = mysqli_query($con,$query);
$data = mysqli_num_rows($res);

if($data == 1){
    echo json_encode("true");
}
else{
    echo json_encode("false");  
}


?>