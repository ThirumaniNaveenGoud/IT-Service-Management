<?php
$name=$_POST['name'];
$visitor_email=$_POST['email'];
$subject = $_POST['subject'];
$message =$_POST['message'];


$email_from = 'info@website.com';
$email_subject= 'new Form submission';
$email_body= "User Name: $name.\n".
             "User Email: $visitor_email.\n".
             "Subject: $subject.\n".
             "User Message: $message.\n";


$to= 'subham.dash267@gmail.com';
$header= "Form: $email_form \r\n";
$header .="Reply-To: $email_from\r\n";

mail($to,$email_subject,$email_body,$headers);
header("Location : contact.html")








?>