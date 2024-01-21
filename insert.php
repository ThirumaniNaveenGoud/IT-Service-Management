
<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "register";

$conn = mysqli_connect($server, $username, $password, $dbname);


if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}

$name =$_POST['name'];
$username =$_POST['username'];
$gender =$_POST['gender'];
$dob =$_POST['dob'];
$password =$_POST['password'];
$cpassword =$_POST['cpassword'];
$pno =$_POST['pno'];
$eid =$_POST['eid'];
$addr =$_POST['addr'];
$filename = $_FILES["proof"]["name"];
$tempname = $_FILES["proof"]["tmp_name"];
$folder = "image1/".$filename;
move_uploaded_file($tempname,$folder);

$filename2 = $_FILES["photo"]["name"];
$tempname2 = $_FILES["photo"]["tmp_name"];
$folder2 = "image3/".$filename2;

move_uploaded_file($tempname2,$folder2);

$checkbox =isset($_POST['checkbox']) ? 1 : 0;
$exp =$_POST['exp'];
$des =$_POST['des'];
$age =$_POST['age'];
$filename1 = $_FILES["edu"]["name"];
$tempname1 = $_FILES["edu"]["tmp_name"];
$folder1 = "image2/".$filename1;

move_uploaded_file($tempname1,$folder1);
$query= mysqli_query($conn,"SELECT * FROM register WHERE username= '$username' ");
if(mysqli_num_rows($query)>0)
{
echo "Username or email id already exist ";
}
else    
{    
$sql = "INSERT INTO register (name, username, gender, dob, password, cpassword, pno, eid, addr, proof, photo, checkbox, exp, des, age, edu) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt= mysqli_stmt_init($conn);

if(! mysqli_stmt_prepare($stmt,$sql))
{die(mysqli_error($conn));
}
mysqli_stmt_bind_param($stmt,"ssssssisssssssis",
                       $name, 
                      $username,
                       $gender,
$dob,
$password,
$cpassword,
$pno,
$eid,
$addr,
$folder,
$folder2,
$checkbox,
$exp,
$des,
$age,
$folder1);
mysqli_stmt_execute($stmt);


header("Location: sub1.php");
exit();

}

    
?>