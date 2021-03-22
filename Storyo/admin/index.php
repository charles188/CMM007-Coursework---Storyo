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
if ($_SESSION['usertype'] !== "A") {
    $error = "Only Admin can access this page";
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

// Read post
if(isset($_POST['action']) && $_POST['action'] == 'Read'){
    $postid = $_POST['id'];
    try{
        include '../assets/dbConnect.php';
        $query = "SELECT postid, date(postdate) as postdate, title, description, story, substr(story, 1, 50) as intro,
        audio, image, firstname, lastname FROM posts INNER JOIN media ON posts.mediaid = media.mediaid 
        INNER JOIN users on posts.userid = users.userid WHERE postid = '".$postid."'";
        $result = $db->query($query);
        if($result) {
            $posts = $result->fetch_assoc();
            $_SESSION['posts'] = $posts;
            $_SESSION['homeurl'] = '../admin';
            header('Location: ../fullstory');
            exit();
        }else {
            $_SESSION['message'] = $db->error;
            include 'message.html.php';
            exit;
        }           
    }catch(Exceptio $ex){
        $_SESSION['message'] = "Error Occured ". $ex;
        include 'message.html.php';
        exit;
    }  
}

// Approve post
if(isset($_POST['action']) && $_POST['action'] == 'Approve'){
    include '../assets/dbConnect.php';
    $sql = "UPDATE posts SET approved=1 WHERE postid=?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('i', $_POST['id']);
    if($stmt->execute()){
        $_SESSION['message'] = "Post Succesfully Approved";
        include 'message.html.php';
        exit;
    }else{
        $_SESSION['message'] = "Error Occured ". $db->error;
        include 'message.html.php';
        exit;
    }
    $stmt->close();
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

// Disprove post
if(isset($_POST['action']) && $_POST['action'] == 'Disprove'){
    include '../assets/dbConnect.php';
    $sql = "UPDATE posts SET approved=0 WHERE postid=?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('i', $_POST['id']);
    if($stmt->execute()){
        $_SESSION['message'] = "Post Succesfully Disproved";
        include 'message.html.php';
        exit;
    }else{
        $_SESSION['message'] = "Error Occured ". $db->error;
        include 'message.html.php';
        exit;
    }
    $stmt->close();
    exit;
}

// update profile
if(isset($_GET['updateprofile'])){
    include 'update_profile.php';
    exit();
}

//load default
try{
    include '../assets/dbConnect.php';
    
    $query = "SELECT postid, postdate, title, description, substr(story, 1, 50) as story, approved, firstname, lastname FROM 
    posts INNER JOIN users ON posts.userid = users.userid ORDER BY postdate DESC";
    $result = $db->query($query);
    if($result){
      //$result = $stmt->get_result();
      $posts = $result->fetch_all(MYSQLI_ASSOC);
      include 'adminprofile.php';;
    }else{
      $_SESSION['message'] = 'Error occured '. $db->error;
    }
  }catch(Exception $ex){
    $_SESSION['message'] = 'Error occured '. $ex;
    include 'message.html.php';
  }
  
?>