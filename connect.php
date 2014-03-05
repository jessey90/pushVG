<?php
$con=mysqli_connect("localhost","root","","api_cucre");
// Check connection
if (mysqli_connect_errno($con))
{
    echo "Không thể kết nối đến CSDL: " . mysqli_connect_error();
}
?>
