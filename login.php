<?php
include("connection.php");
if(isset($_POST['login']))
{
$username = $_POST['username'];
$pwd = $_POST['password'];
$query ="SELECT * FROM register WHERE username='$username' && password= '$pwd' ";

$data = mysqli_query($conn,$query);
$total = mysqli_num_rows($data);
echo $total;
}

?>