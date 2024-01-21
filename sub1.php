<?php
session_start();
?>





<html>
    <head>
         <title>hide password </title>

           <link rel="stylesheet" href="img.css">
           <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

         </head>
<body>
<div class="form-box" data-tilt>

<h1>Login Here</h1>
<form action="#" method="POST">
<div class="input-box">
<i class="fa fa-user-o"></i>
<input type="text" placeholder="Username" name="username" id="email">
</div>
<div class="input-box">
<i class="fa fa-key"></i>
<input type="password" placeholder="Password" name="password" id="myInput">
<span class="eye" onclick="myFunction()">
<i id="hide1"class="fa fa-eye"></i>
<i id="hide2"class="fa fa-eye-slash"></i>
</span>
</div>
<div id="myDIV">
<i class="fa fa-exclamation-circle" aria-hidden="true"></i>
password or email do not match.
</div>
<a href= "lost.htm">Lost your password?</a><br>
<input name="login" value ="login" onclick="myfun()" type="submit" class="login-btn">
<a href= "customer.htm">Create Account?</a><br>

</div>
</form>


<script>
function myfun()
{let password = document.getElementById("myInput").value;
let y = document.getElementById("myDIV");

let emai = document.getElementById("email").value;


const hasNumber = /[0-9]/.test(password);
  const hasUpper = /[A-Z]/.test(password);
  const hasLower = /[a-z]/.test(password);
  const isLengthValid = password.length >= 8;
if(hasNumber && hasUpper && hasLower && isLengthValid)
{
document.location.href="file:///C:/Users/SUBHAM/OneDrive/Documents/html/var.htm";


}
else{
y.style.display= "block";
}
}
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
<script
src="tilt.js"></script>

</body>
</html>


<?php
function writeMsg() {
  echo '<script>alert("login failed")</script>';
}
include("connection.php");
if(isset($_POST['login']))
{
$username = $_POST['username'];
$pwd = $_POST['password'];
$query ="SELECT * FROM register WHERE username='$username' && password= '$pwd' ";

$data = mysqli_query($conn,$query);
$total = mysqli_num_rows($data);
$row=mysqli_fetch_array($data);

if($total == 1)
{
if(($row["username"]=="Nirmala34")&&($row["password"]=="Subham01")){$_SESSION['user_name']=$username;


header('location:index1.php');


}
else if($row["checkbox"]=="0"){$_SESSION['user_name']=$username;


header('location:hello1.php');
}
if($row["checkbox"]=="1"){$_SESSION['user_name']=$username;


header('location:emp.php');
}
}
else{
echo "login fails";
writeMsg();}


}


?>