<?php
ini_set( "display_errors", 1 );
session_start();

// user login check
if (!isset($_SESSION['email'])) {
  include '../login.html.php'; 
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
    $posts = $_SESSION['posts'];
    $home_url = $_SESSION['homeurl'];
    include 'post.html.php';
?>