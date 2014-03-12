<?php
$con=mysqli_connect("localhost","root","","api_cucre");
// Check connection
if (mysqli_connect_errno($con))
{
    echo "Không thể kết nối đến CSDL: " . mysqli_connect_error();
}

/*
 * Google API Key
 */
define("GOOGLE_API_KEY", "AIzaSyBIuqC1MenjT9jJcwrH42uU1JLyJip4ZVc");
//define("GOOGLE_API_KEY", "AIzaSyDhsD9lT1k4ODPz3D1QL8pGCqvY6H8HF1M");

?>
