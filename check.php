<?php
require_once("connect.php");
set_time_limit(0);

$token = $_POST["token"];
$query = "SELECT id FROM cr_device_token WHERE token = '$token'";
$result = mysqli_query($con, $query);

if(mysqli_affected_rows($con) == 1)
{
    $string='{"status":"1","msg":" token ton tai"}';
    $json=json_encode($string,true);
}else{
    $string = '{ "status":"0","msg ":" token khong ton tai"}';
    $json=json_encode($string,true);
}

print_r(json_decode($json,true));
http_response_code(200);
mysqli_close($con);