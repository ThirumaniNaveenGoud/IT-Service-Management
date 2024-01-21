<?php
error_reporting(0);


$server = "localhost";
$username = "root";
$password = "";
$dbname = "assign";
$id= $_GET['id'];
$conn = mysqli_connect($server, $username, $password, $dbname);


if ($conn) {
    
}
else
{

echo "Connection failed".mysqli_connect_error();
 }

$query ="SELECT * FROM assign WHERE id ='$id'";
$data = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($data);
$subject = $result['subject'];
$username = $result['username'];
$cusername = $result['cusername'];
 
$message =$result['message'];

?>

<html>
    <head>
         <title>customer </title>
         
          
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="cus3.css">




</head>
<body>

<div id="preloader"></div>


<div class="sign-up-form">
<h1>Task Update</h1>
<form action="#" method="POST" enctype="multipart/form-data">
  <p> ID:</p>
  <input type="text" id="id" name="id" value="<?php echo $_GET['id'] ?>"   placeholder=" Enter ID" >
<p>STATUS:
  <select id="status" name="status">
    <option value="Assigned">Assigned</option>
    <option value="Onprogress">Onprogress</option>
    <option value="Completed">Completed</option>
     </select>
<p>customer :</p>
  <input type="text" name="cusername" id="cusername" value=" <?php echo $result['username']; ?>"  placeholder="customer" >
<p>Employee username :</p>
  <input type="text" name="username" id="username" value=" <?php echo $result['cusername']; ?>"  placeholder="Username" >
<p>Subject :</p>
  <input type="text" name="subject" id="subject" value=" <?php echo $result['subject']; ?>" placeholder="Subject" >
<p>message :</p>
  <input type="text" name="message" id="message" value=" <?php echo $result['message']; ?>" placeholder="Message" >
<p>update message :</p>
  <input type="text" name="umessage" id="umessage" placeholder=" Update Message" >


  
 <button  type="submit" name="send" class="login-btn">send</button>
  



</form>
</div>
<script>
var loader = document.getElementById("preloader");
window.addEventListener("load",function(){
loader.style.display = "none";
})
</script>
</body>






</html>


<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "update1";

$conn = mysqli_connect($server, $username, $password, $dbname);


if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}

$name =$_POST['id'];
$status =$_POST['status'];
$cusername =$_POST['cusername'];
$username =$_POST['username'];
$subject =$_POST['subject'];
$message =$_POST['message'];
$umessage =$_POST['umessage'];
    
$sql = "INSERT INTO update1 (id, status, cusername, username, subject, message, umessage) VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt= mysqli_stmt_init($conn);

if(! mysqli_stmt_prepare($stmt,$sql))
{die(mysqli_error($conn));
}
mysqli_stmt_bind_param($stmt,"sssssss",
                       $id, 
                      $status,
                       $cusername,
$username,
$subject,
$message,
$umessage);
mysqli_stmt_execute($stmt);


header("Location: emp.php");
if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}


    
?>