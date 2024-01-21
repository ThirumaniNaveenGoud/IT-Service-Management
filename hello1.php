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
<li><i class="fa fa-pie-chart"></i><a href="hello1.php">Dashboard</a></li>
<li><i class="fa fa-user"></i><a href="profile.php">Profile</a></li>
<li><i class="fa fa-book"></i><a href="track.php">Query Tracking</a></li>
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

<div class="text-box">
<h1><span class="auto-input"></span></h1>
<p>Please write you query below</p>
</div>
<div class="contact-col">
<form action="#" method="POST">

<input types="text" name="subject" placeholder="Enter your subject" autocomplete="off" required>
<div class="result-box">


</div>

<textarea rows="8" name="message" placeholder="messsage" required></textarea>
<button type="submit" class="hero-btn red-btn">send message</button>
</form>
</div>

</section>
<script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
<script>
var typed = new Typed(".auto-input", {
strings: ["Hi  Welcome <?php echo $_SESSION['user_name'];
?> Back","How Should I Help You Today"],
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
<script src="autocomplete.js">
</script>
</body>
</html>
}

<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "query";

$conn = mysqli_connect($server, $username, $password, $dbname);


if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}

$username =$_SESSION['user_name'];
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