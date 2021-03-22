<?php
session_start();

//logging out
if (isset($_POST['action']) and $_POST['action'] == 'logout'){
    session_unset();
    header('Location: .' );
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
  
  if (isset($_SESSION['email'])) { 
      $greeting = $welcome.', '.$_SESSION['firstname'];
  }
//Get started
if(isset($_GET['getstarted'])){
  include 'signup.html';
  exit;
}
// search post
if(isset($_POST['searchpost'])){
echo "serach post";
  $search = $_POST['search'];
  $_SESSION['search'] = $search;
  if($search == '') {
    $_SESSION['message'] = "Please enter search keywords";
    include 'storyteller/message.html.php';
    exit;
  }
  try{
    include 'assets/dbConnect.php';
    $query = "SELECT postid, date(postdate) as postdate, title, description, category, location, audio, image 
    FROM posts INNER JOIN media ON posts.mediaid = media.mediaid WHERE location LIKE '%".$search."%' 
    OR category LIKE '%".$search."%' OR title LIKE '%".$search."%' AND approved=1 ORDER BY postdate DESC";
    $result = $db->query($query);
    if($result) {
      $posts = $result->fetch_all(MYSQLI_ASSOC);
    }else {
      $_SESSION['message'] = $db->error;
      include 'storyteller/message.html.php';
    }
    include 'index.html.php';
    exit;
  }catch(Exceptio $ex){
      $_SESSION['message'] = "Error Occured ". $ex;
      include 'storyteller/message.html.php';
  }
}

// Load with location
if(isset($_POST['postlocation'])){

  $location = $_POST['location'];
  if($location == 'Choose a location...') {
    $_SESSION['message'] = "Please choose a location";
    include 'storyteller/message.html.php';
    exit;
  }
  try{
    include 'assets/dbConnect.php';
    $query = "SELECT postid, date(postdate) as postdate, title, description, category, location, audio, image 
    FROM posts INNER JOIN media ON posts.mediaid = media.mediaid WHERE location = '".$_POST['location']."' AND approved=1 ORDER BY postdate DESC";
    $result = $db->query($query);
    if($result) {
      $posts = $result->fetch_all(MYSQLI_ASSOC);
    }else {
      $_SESSION['message'] = $db->error;
      include 'storyteller/message.html.php';
    }
    include 'index.html.php';
    exit;
  }catch(Exceptio $ex){
      $_SESSION['message'] = "Error Occured ". $ex;
      include 'storyteller/message.html.php';
  }
}

// Load with category
if(isset($_POST['postcategory'])){

  $category = $_POST['category'];
  if($category == 'Choose Category...') {
    $_SESSION['message'] = "Please choose a category";
    include 'storyteller/message.html.php';
    exit;
  }
  try{
    include 'assets/dbConnect.php';
    $query = "SELECT postid, date(postdate) as postdate, title, description, category, location, audio, image 
    FROM posts INNER JOIN media ON posts.mediaid = media.mediaid WHERE category = '".$_POST['category']."' AND approved=1 ORDER BY postdate DESC";
    $result = $db->query($query);
    if($result) {
      $posts = $result->fetch_all(MYSQLI_ASSOC);
    }else {
      $_SESSION['message'] = $db->error;
      include 'storyteller/message.html.php';
    }
    include 'index.html.php';
    exit;
  }catch(Exceptio $ex){
      $_SESSION['message'] = "Error Occured ". $ex;
      include 'storyteller/message.html.php';
  }
}

//fullstory
if(isset($_GET['fullstory'])){
  //get the id of the clicked post
  $postid = $_GET['fullstory'];
  $_SESSION['fullstory'] = $postid;
  // user login check
  if (!isset($_SESSION['email'])) {
    // signup url;
    $signup_url = 'signup.html';
    $home_url = '.';
    include 'login.html.php'; 
      exit();
  }else{
    try{
      include 'assets/dbConnect.php';
      $query = "SELECT postid, date(postdate) as postdate, title, description, story, category, location,
       audio, image, firstname, lastname FROM posts INNER JOIN media ON posts.mediaid = media.mediaid 
      INNER JOIN users on posts.userid = users.userid WHERE postid = '".$postid."' ORDER BY postdate DESC";
      $result = $db->query($query);
      if($result) {
        $posts = $result->fetch_assoc();
        $_SESSION['posts'] = $posts;
        header('Location: fullstory');
        exit();
      }else {
        $_SESSION['message'] = $db->error;
        include 'storyteller/message.html.php';
        exit;
      }
      include 'index.html.php';
    }catch(Exceptio $ex){
      $_SESSION['message'] = "Error Occured ". $ex;
      include 'storyteller/message.html.php';
      exit;
    }   

  }
}

try{
    include 'assets/dbConnect.php';
    $query = "SELECT postid, date(postdate) as postdate, title, description, category, location, audio, image 
    FROM posts INNER JOIN media ON posts.mediaid = media.mediaid WHERE approved=1 ORDER BY postdate DESC";
    $result = $db->query($query);
    if($result) {
      $posts = $result->fetch_all(MYSQLI_ASSOC);
    }else {
      $_SESSION['message'] = $db->error;
      include 'storyteller/message.html.php';
    }
    include 'index.html.php';
}catch(Exceptio $ex){
    $_SESSION['message'] = "Error Occured ". $ex;
    include 'storyteller/message.html.php';
}

?>