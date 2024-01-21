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
$photo =$result['photo'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatiable" content="IE=edge">
<title>admin </title>

<link rel="stylesheet" href="style3.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,700;1,100;1,200;1,300;1,600&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,700;1,100;1,200;1,300;1,600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<section id="menu">
<div class="logo">

<img src="image/2.jpg">
<h2>Dyanamic</h2>

</div>
<div class="items">
<li><i class="fa fa-sign-out"></i><a href="logout.php">Logout</a></li>
<li><i class="fa fa-pie-chart"></i><a href="emp.php">Dashboard</a></li>
<li><i class="fa fa-user"></i><a href="profile.php">Profile</a></li>
<li><i class="fa fa-list"></i><a href="update.php">Edit</a></li>
</div>
</section>
<section id="interface">
<div class="navigation">
<div class="n1">
<div class="search">
<i class="fa fa-search"></i>
<input type="text" placeholder="Search">
</div>
</div>




<div class="profile">
<i class="fa fa-bell"></i>

<i id="c" class="fa fa-sun-o" onclick="changeIcon()"></i>


<?php

 echo "<p> {$_SESSION['user_name']}</p>
  <style>
p{
color: var(--primary-color);
padding-right: 10px;}
 </style>";

?>

<img src="
<?php
 echo $result['photo']; ?>">
</div>
</div>
</div>

<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "update1";

$conn = mysqli_connect($server, $username, $password, $dbname);


if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM update1 ";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

if($total != 0)
{ ?>
<table border="5" cellspacing="7">
<thread>
<tr>
<th width="5%">ID</th>
<th width="15%">status</th>
<th width="20%">Problem</th>
<th width="30%">Query</th>
<th width="20%">Update</th>

</tr>
</thread>
<tbody>

</tbody>

<?php

while($result = mysqli_fetch_assoc($data)){
echo "<tr>
     <td>".$result['id']."</td>
     <td>".$result['status'] ."</td>
     <td>".$result['subject']."</td>
     <td>".$result['message']."</td>
     <td>".$result['umessage']."</td>
    


     
      </tr>
<style>
td{color: var(--primary-color);

}
th{color: var(--primary-color);

}
.update{

color: #fff;
background: #FF4500;
border-width: 2px;
font-size: 15px;
cursor: pointer;
width: 80px;
border-radius: 10px;}
.reject{

color: #000000;
background: #FFFF00;
border-width: 2px;
font-size: 15px;
cursor: pointer;
width: 80px;
border-radius: 10px;}
 </style>
      ";
}
}

else{
echo "<h>No record found
</h>
  <style>
h{
color: var(--primary-color);
font-size: 50px;
margin-left: 20%;
text-align: center;
text-transform: uppercase;
padding-right: 10px;}
 </style>";
}
?>
</table>
</div>

</section>
<script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
<script>
var typed = new Typed(".auto-input", {
strings: ["Hi  Welcome Back","Your job is assigned below"],
typeSpeed: 100,
backSpeed: 100,
loop: true
})
</script>
<script>
function changeIcon() {
  var iconElement = document.getElementById("c");
  
  
  if (iconElement.classList.contains("fa-sun-o")) {
    document.body.classList.toggle("dark-theme");    
    iconElement.classList.remove("fa-sun-o");
    iconElement.classList.add("fa-moon-o");
  } else {
    document.body.classList.toggle("dark-theme");
    iconElement.classList.remove("fa-moon-o");
    iconElement.classList.add("fa-sun-o");
  }


}

</script>


</body>
</html>