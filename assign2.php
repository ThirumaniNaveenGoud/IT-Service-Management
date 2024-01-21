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
$status =$result['status'];
$cusername =$result['cusername'];

$message =$result['message'];
$dob =$result['dob'];
$dob1 =$result['dob1'];
$formattedDate = date('Y-m-d', strtotime($dob));
$formattedDate1 = date('Y-m-d', strtotime($dob1));


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
<h1>Update</h1>
<form action="o.php" method="POST" enctype="multipart/form-data">
  <p> ID:</p>
  <input type="text" id="id" name="id" value="<?php echo $_GET['id'] ?>"   placeholder=" Enter ID" >
<p>STATUS:</p>
  <select id="status" name="status">
    <option value="Assigned" <?php
if($result['status'] == "MALE")
{ echo "selected";
}
?>
>Assigned</option>
    <option value="Onprogress" <?php
if($result['status'] == "Onprogress")
{ echo "selected";
}
?>
>Onprogress</option>
    <option value="Completed" <?php
if($result['status'] == "Completed")
{ echo "selected";
}
?>
>Completed</option>
     </select>
<p>customer :</p>
  <input type="text" name="cusername" value=" <?php echo $result['cusername']; ?>"  placeholder="customer" >
<p>Employee username :</p>
  <input type="text" name="username" value=" <?php echo $result['username']; ?>"  placeholder="Username" >
<p>Subject :</p>
  <input type="text" name="subject" value=" <?php echo $result['subject']; ?>" placeholder="Subject" >
<p>message :</p>
  <input type="text" name="message" value=" <?php echo $result['message']; ?>" placeholder="Message" >

<p>Start date:</p>
  <input type="date" name="dob" id="dob" value="<?php echo $formattedDate; ?>" >
<p>End date:</p>
  <input type="date" name="dob1" id="dob1" value="<?php echo $formattedDate1; ?>"  >
  
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
