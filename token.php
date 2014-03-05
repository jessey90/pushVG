<?php
require_once("connect.php");
set_time_limit(0);

$create_time = date('Y-m-d H:i:s');
$messContent = $_POST["mess_content"];
$userId = $_POST["user_id"];
$deviceType = $_POST["device_type"];
$token = $_POST["token"];

//$result = mysqli_query($con,"SELECT user_id FROM cr_user WHERE user_id = '$userId')");

//Lưu token vào bảng
$sql1 = mysqli_query($con,"INSERT INTO cr_user (user_id,status,create_time,update_time) VALUES ('$userId','1','$create_time','$create_time')");

$sql2 = mysqli_query($con,"INSERT INTO cr_device_token (user_id,device_type,token) VALUES ('$userId','$deviceType','$token')");

if($sql2){
    echo "Đã thêm dữ liệu";
}else{
    echo "Lỗi: ". mysqli_error($con);
}
http_response_code(200);
mysqli_close($con);