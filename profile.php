<?php
session_start();

?>
<?php

$userprofile = $_SESSION['user_name'];
if($userprofile == true)
{}
else{
header('location: sub1.php');
}

include("connection.php");
$username=$_POST['username'];
$query ="SELECT * FROM register WHERE username='$userprofile'";
$data = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($data);
$name = $result['name']; 
$gender =$result['gender'];
$dob =$result['dob'];
$password =$result['password'];
$pno =$result['pno'];
$eid =$result['eid'];
$addr =$result['addr'];
$proof =$result['proof'];

$checkbox =$result['checkbox'];

?>

<html>
    <head>
         <title>customer </title>
         
          
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="cus1.css">




</head>
<body>

<div id="preloader"></div>


<div class="sign-up-form">
<h1>Your data</h1>
<form action="#" method="post" enctype="multipart/form-data">
  <p> Name:</p>
  <input type="text" name="name" value=" <?php echo $result['name']; ?>" placeholder="Full Name" required>
<p> Username:</p>
  <input type="text" name="username" value="<?php echo $_SESSION['user_name'];
?>" placeholder="Username" required>
  <p>Gender:
  <select id="gender" name="gender" value="<?php echo $result['gender'];
?>">
    <option value="MALE">MALE</option>
    <option value="FEMALE">FEMALE</option>
    <option value="OTHERS">OTHERS</option>
     </select>
 </p>
<p>DOB:</p>
  <input type="date" name="dob" id="DOB" value="<?php echo $dob =$result['dob'];
?>" required>
  <p>Password:</p>
  <input type="password" name="password" id="myInput" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" value="<?php echo $password =$result['password'];
?>" required>
<span class="eye" onclick="myFunction()">
<i id="hide1"class="fa fa-eye "></i>
<i id="hide2"class="fa fa-eye-slash "></i>
</span>
<div id="myDIV">
<i class="fa fa-exclamation-circle" aria-hidden="true"></i>
password do not match.
</div>
  
  
  <p>Phone Number:</p>
  <input type="tel" name="pno" placeholder="+91 3434434332" pattern="[0-9]{10}" title="Must contain 10 digit number only" value="<?php echo $result['pno'];?>">
  <p>Email Id:</p>
  <input type="text" name="eid" placeholder="Email Id" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3,}$" value="<?php echo $result['eid'];
?>" required>
  
  <p>Address:</p>
  <input type="text" name="addr" placeholder="Address" value="<?php echo $result['addr'];
?>" required>
  <p>ID proof:</p>
  <input type="text" id="pname" name="proof" value="<?php echo $result['proof'];
?>"  required><br>

  
<p>Are you an employee:</p>
  <input type="text" id="checkbox"  name="checkbox" value="<?php echo $result['checkbox']; ;
?>"









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
<script>
function myFunction(){
var x= document.getElementById("myInput");
var y= document.getElementById("hide1");
var z= document.getElementById("hide2");
if(x.type === 'password')
{
x.type = "text";
y.style.display= "block";
z.style.display= "none";
}
else
{
x.type = "password";
y.style.display= "none";
z.style.display= "block";
}
}
</script>






