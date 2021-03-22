<?php


$name = $_POST['name'];
$email= $_POST['email'];
$title= $_POST['title'];
$message= $_POST['message'];
$to = "storyo@gmail.com";
$subject = "Mail From Storyo";
$txt ="Name = ". $name . "\r\n  Email = " . $email . "\r\n  Subject = " . $subject . "\r\n Message =" . $message;
$headers = "From: noreply@storyo.com";
if($email!=NULL){
    mail($to,$subject,$txt,$headers);
}
//redirect
header("Location:thankyou.html");







?>