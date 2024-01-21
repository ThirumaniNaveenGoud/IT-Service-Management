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

$subject =$_POST['subject'];
$message =$_POST['message'];

$message1 =$_POST['message1'];
    
$sql = "INSERT INTO assign (id, status, cusername, subject, message, message1) VALUES (?, ?, ?, ?, ?, ?)";

$stmt= mysqli_stmt_init($conn);

if(! mysqli_stmt_prepare($stmt,$sql))
{die(mysqli_error($conn));
}
mysqli_stmt_bind_param($stmt,"ssssss",
                       $id, 
                      $status,
                       $cusername,

$subject,
$message,
$message1);
mysqli_stmt_execute($stmt);


header("Location: index1.php");
if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}



    
?>