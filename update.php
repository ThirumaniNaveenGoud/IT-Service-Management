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
$cpassword =$result['cpassword'];
$pno =$result['pno'];
$eid =$result['eid'];
$addr =$result['addr'];
$photo =$result['photo'];

?>

<html>
    <head>
         <title>customer </title>
         
          
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="cus2.css">




</head>
<body>

<div id="preloader"></div>


<div class="sign-up-form">
<h1>Update data</h1>
<form  action="#" method="post" enctype="multipart/form-data">
  <p> Name:</p>
  <input type="text" name="name" value=" <?php echo $result['name']; ?>" placeholder="Full Name" required>


  <p>Gender:
  <select id="gender" name="gender">
    <option value="MALE"
<?php
if($result['gender'] == "MALE")
{ echo "selected";
}
?>
>
MALE</option>
    <option value="FEMALE"<?php
if($result['gender'] == "FEMALE")
{ echo "selected";
}
?>
>
FEMALE</option>
    <option value="OTHERS"
<?php
if($result['gender'] == "OTHERS")
{ echo "selected";
}
?>
>>OTHERS</option>
     </select>
 </p>
<p>DOB:</p>
  <input type="date" name="dob" id="DOB" value="<?php echo $dob =$result['dob'];
?>" required>
  <p>Password:</p>
  <input type="password" name="password" id="myInput" placeholder="Password" value="<?php echo $result['password'];?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
<span class="eye" onclick="myFunction()">
<i id="hide1"class="fa fa-eye "></i>
<i id="hide2"class="fa fa-eye-slash "></i>
</span>
<div id="myDIV">
<i class="fa fa-exclamation-circle" aria-hidden="true"></i>
password do not match.
</div>
  
  <p>Renter Password:</p>
  <input type="password" name="cpassword" placeholder="Password" value="<?php echo $result['cpassword'];?>" id="lmyInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
<span class="eye" onclick="myFunction1()">
<i id="hide3"class="fa fa-eye "></i>
<i id="hide4"class="fa fa-eye-slash "></i>
</span>
  
  
  
  <p>Phone Number:</p>
  <input type="tel" name="pno" placeholder="+91 3434434332" pattern="[0-9]{10}" title="Must contain 10 digit number only" value="<?php echo $result['pno'];?>">
  <p>Email Id:</p>
  <input type="text" name="eid" placeholder="Email Id" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3,}$" value="<?php echo $result['eid'];
?>" required>
  
  <p>Address:</p>
  <input type="text" name="addr" placeholder="Address" value="<?php echo $result['addr'];
?>" required>
  <p>Insert your profile photo:</p>
  <input type="file" id="pname" name="profile"  required><br>



<button  onclick="myfun()" type="submit" name="update" value="update" class="login-btn">Update</button>



<script>
var loader = document.getElementById("preloader");
window.addEventListener("load",function(){
loader.style.display = "none";
})
</script>


</body>


</html>

<script>
function show(){

if(document.getElementById('checkbox').checked)
{document.getElementById('employee').style.display='block';
document.getElementById("exp").setAttribute('required', '');
document.getElementById("des").setAttribute('required', ''); 
document.getElementById("age").setAttribute('required', '');
document.getElementById("expq").setAttribute('required', '');




}
else{
document.getElementById('employee').style.display='none';}
}


function myfun(){
let password = document.getElementById("myInput").value;
let cnfrmPassword = document.getElementById("lmyInput").value;
let y = document.getElementById("myDIV");

const dob = document.getElementById("DOB").value;


const birthDate = new Date(dob);


const ageDiff = Date.now() - birthDate.getTime();
const ageDate = new Date(ageDiff);
const age = Math.abs(ageDate.getUTCFullYear() - 1970);


console.log(password,cnfrmPassword);
let message = document.getElementById("message");
if(password.length!=0)
{
if(password==cnfrmPassword )
{if (age >= 18) {
if(document.getElementById('hell').checked){
document.location.href="file:///C:/Users/SUBHAM/OneDrive/Documents/html/var.htm";
}
}
}


else{
y.style.display= "block";

}
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
function myFunction1(){
var l= document.getElementById("lmyInput");
var m= document.getElementById("hide3");
var n= document.getElementById("hide4");
if(l.type === 'password')
{
l.type = "text";
m.style.display= "block";
n.style.display= "none";
}
else
{
l.type = "password";
m.style.display= "none";
n.style.display= "block";
}
}
</script>

<?php

if($_POST['update']){
$name =$_POST['name'];
$username =$_POST['username'];
$gender =$_POST['gender'];
$dob =$_POST['dob'];
$password =$_POST['password'];
$cpassword =$_POST['cpassword'];
$pno =$_POST['pno'];
$eid =$_POST['eid'];
$addr =$_POST['addr'];

$filename2 = $_FILES["photo"]["name"];
$tempname2 = $_FILES["photo"]["tmp_name"];
$folder2 = "image3/".$filename2;

move_uploaded_file($tempname2,$folder2);




   
$sql = " UPDATE register SET name = '$name', username = '$userprofile', gender = '$gender', dob = '$dob', password = '$password', cpassword = '$cpassword', pno = '$pno',addr = '$addr', photo = '$photo' WHERE username= '$userprofile'";
}
if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

?>

























    
