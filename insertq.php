<?php
session_start();

?>

<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "query";

$conn = mysqli_connect($server, $username, $password, $dbname);


if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}

$username =$_SESSION['user_name']
$subject =$_POST['subject'];
$message =$_POST['message'];



$sql = "INSERT INTO query (username, subject, message) VALUES (?, ?, ?)";

$stmt= mysqli_stmt_init($conn);

if(! mysqli_stmt_prepare($stmt,$sql))
{die(mysqli_error($conn));
}
mysqli_stmt_bind_param($stmt,"sss",                      
                      $username,
                      $subject,
                       $message);

mysqli_stmt_execute($stmt);


  
    
?>