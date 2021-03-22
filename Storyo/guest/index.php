<?php
ini_set( "display_errors", 1 );
session_start();

// user login check
if (!isset($_SESSION['email'])) {
    $home_url = '../';
    $signup_url = '../signup.html';
    $login_url = '../login.php';
    $password_url = '../reset_password';
    include '../login.html.php'; 
      exit();
}

//check usertype
if ($_SESSION['usertype'] !== "C") {
    $error = "Only Guest can access this page";
    include '../accessdenied.html.php'; 
    exit();
} 


//logging out
if (isset($_POST['action']) and $_POST['action'] == 'logout'){
    session_unset();
    header('Location: ' . $_POST['goto']);
    exit();
}

//greeting
$welcome = 'Hi';
if (date("H") <= 12) {
	$welcome = 'Good Morning';
} else if (date('H') > 12 && date("H") < 18) {
	$welcome = 'Good Afternoon';
} else if(date('H') > 17) {
	$welcome = 'Good Evening';
}

$greeting = $welcome.', '.$_SESSION['firstname'];

if(isset($_GET['postpage'])) {
    include 'post.html.php';
    exit;
}

// submit update data
if(isset($_POST['submitupdate'])){
    include("../assets/dbConnect.php");

    $firstname 		= $_POST['fname'];
    $lastname 		= $_POST['lname'];
    $email 			= $_POST['email'];
    $profession 	= $_POST['prof'];
    $address 		= $_POST['address'];
    $country		= $_POST['country'];
    $state 		    = $_POST['state'];
    $gender 		= $_POST['gender'];
    $age		    = $_POST['age'];
    $usertype 	    = $_POST['usertype'];

    $sql = "UPDATE users SET firstname=?, lastname=?, email=?, gender=?, age=?, 
    address=?, state=?, country=?, profession=?, usertype=? WHERE userid = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('ssssisssssi', $firstname, $lastname, $email, $gender, $age, $address, $state, $country, $profession, $usertype, $_SESSION['userid'] );
    if ($stmt->execute()) {
        $_SESSION['message'] = "profile updated successful";
        include 'message.html.php';
    } else {
        echo "Error: " .$db->error;
    }

    exit;
}

// update profile
if(isset($_GET['updateprofile'])){
    include 'update_profile.php';
    exit();
}

include 'guestprofile.php';
?>