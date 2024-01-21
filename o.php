<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "assign";

$conn = mysqli_connect($server, $username, $password, $dbname);


if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}

$id =$_POST['id'];
$status =$_POST['status'];
$cusername =$_POST['cusername'];
$username =$_POST['username'];
$subject =$_POST['subject'];
$message =$_POST['message'];
$dob =$_POST['dob'];
$dob1 =$_POST['dob1'];




   
$sql = " UPDATE assign SET  status = '$status', cusername = '$cusername', username = '$username', subject = '$subject', message = '$message', dob = '$dob',dob1 = '$dob1' WHERE id= '$id' ";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
header("Location: updateq.php");
} else {
  echo "Error updating record: " . $conn->error;
}

?>  