<?php
include("connection.php");


$password =$_POST['password'];
$cpassword =$_POST['cpassword'];
$eid =$_POST['username'];
$sql = " UPDATE register SET password = '$password', cpassword = '$cpassword' WHERE username= '$username'";
}
if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}


?>
