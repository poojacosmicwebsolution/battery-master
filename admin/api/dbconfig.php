<?php 
$db_user ="googleha_adminpanel1";
$db_name ="googleha_adminpanel";
$pass ="J_Xx*95UybKG";
$db_host ="localhost";

$con = mysqli_connect($db_host,$db_user,$pass,$db_name);

if(!$con){
    // echo "connection error";
}
else{
    // echo "connection successfull";
   session_start();
}

?>