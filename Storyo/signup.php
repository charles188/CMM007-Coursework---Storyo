<?php
include("assets/dbConnect.php");

$firstname 		= $_POST['fname'];
$lastname 		= $_POST['lname'];
$email 			= $_POST['email'];
$password 		= MD5($_POST['password']); //password encription
$profession 	= $_POST['prof'];
$address 		= $_POST['address'];
$country		= $_POST['country'];
$state 		    = $_POST['state'];
$gender 		= $_POST['gender'];
$age		    = $_POST['age'];
$usertype 	    = $_POST['usertype'];

$sql = "INSERT INTO users (firstname, lastname, email, password, gender, age, address, state, country, profession, usertype) VALUES ('$firstname', '$lastname', '$email', '$password', '$gender', '$age', '$address', '$state', '$country', '$profession', '$usertype')";

if (mysqli_query($db , $sql)) {
} else {
    echo "Error: " . $sql . "<br>" . mysql_error($db);
}

header("location: signupcomplete.html");


?>