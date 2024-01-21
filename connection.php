<?php
error_reporting(0);


$server = "localhost";
$username = "root";
$password = "";
$dbname = "register";

$conn = mysqli_connect($server, $username, $password, $dbname);


if ($conn) {
    
}
else
{
echo "Connection failed".mysqli_connect_error();
 }
?>