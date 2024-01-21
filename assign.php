
<?php
error_reporting(0);


$server = "localhost";
$username = "root";
$password = "";
$dbname = "query";
$id= $_GET['id'];
$conn = mysqli_connect($server, $username, $password, $dbname);


if ($conn) {
    
}
else
{

echo "Connection failed".mysqli_connect_error();
 }

$query ="SELECT * FROM query WHERE id ='$id'";
$data = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($data);
$subject = $result['subject'];
$username = $result['username'];
 
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
<h1>assign</h1>
<form action="#" method="POST" enctype="multipart/form-data">
  <p> ID:</p>
  <input type="text" id="id" name="id" value="<?php echo $_GET['id'] ?>"   placeholder=" Enter ID" >
<p>STATUS:</p>
  <select id="status" name="status">
    <option value="Assigned">Assigned</option>
    <option value="Onprogress">Onprogress</option>
    <option value="Completed">Completed</option>
     </select>
<p>customer :</p>
  <input type="text" name="cusername" value=" <?php echo $result['username']; ?>"  placeholder="customer" >
<p>Employee username :</p>
  <input type="text" name="username"  placeholder="Username" >
<p>Subject :</p>
  <input type="text" name="subject" value=" <?php echo $result['subject']; ?>" placeholder="Subject" >
<p>message :</p>
  <input type="text" name="message" value=" <?php echo $result['message']; ?>" placeholder="Message" >

<p>Start date:</p>
  <input type="date" name="dob" id="dob" >
<p>End date:</p>
  <input type="date" name="dob1" id="dob1"  >
  
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


    
$sql = "INSERT INTO assign (id, status, cusername, username, subject, message, dob, dob1) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt= mysqli_stmt_init($conn);

if(! mysqli_stmt_prepare($stmt,$sql))
{die(mysqli_error($conn));
}
mysqli_stmt_bind_param($stmt,"ssssssss",
                       $id, 
                      $status,
                       $cusername,
$username,
$subject,
$message,
$dob,
$dob1);
mysqli_stmt_execute($stmt);


header("Location: index1.php");
if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}



    
?>