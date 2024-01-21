
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
<h1>Reject</h1>
<form action="l.php" method="POST" enctype="multipart/form-data">
  <p> ID:</p>
  <input type="text" id="id" name="id" value="<?php echo $_GET['id'] ?>"   placeholder=" Enter ID" >
<p>STATUS:</p>
  <input type="text" name="status" value="rejected"  >
<p>customer :</p>
  <input type="text" name="cusername" value=" <?php echo $result['username']; ?>"  placeholder="customer" >

<p>Subject :</p>
  <input type="text" name="subject" value=" <?php echo $result['subject']; ?>" placeholder="Subject" >
<p>Objective :</p>
  <input type="text" name="message" value=" <?php echo $result['message']; ?>" placeholder="Message" >

<p>message :</p>
  <input type="text" name="message1"  placeholder="Reason" >



  
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


