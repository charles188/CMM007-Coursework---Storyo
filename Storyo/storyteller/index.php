<?php
ini_set( "display_errors", 1 );
session_start();

// check if user is logged in
if (!isset($_SESSION['email'])) {
  $home_url = '../';
  $signup_url = '../signup.html';
  $login_url = '../login.php';
  $password_url = '../reset_password';
  include '../login.html.php'; 
	exit();
} 

//check the usertype
if (isset($_SESSION['usertype']) && $_SESSION['usertype'] !== "B") {
  $error = "Only Story Teller can access this page";
  include '../accessdenied.html.php'; 
  exit();
} 

//log out
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

//post page
if(isset($_GET['postpage'])){
  include 'post.html.php';
  exit;
}

// publish post
if(isset($_POST['publish'])){
  try{
    //load database
    include '../assets/dbconnect.php';

    $max_audiosize = 5242880*4; // 20MB
    $max_imagesize = 5242880; // 5MB

    if(isset($_FILES['audioupload']['name']) && isset($_FILES['imageupload']['name']) ){
        $audio_name = $_FILES['audioupload']['name'];
        $image_name = $_FILES['imageupload']['name'];
        $target_dir = "../uploads/";
        $target_audio = $target_dir . $audio_name;
        $target_image = $target_dir . $image_name;

        // Select file type
        $audio_extension = strtolower(pathinfo($target_audio, PATHINFO_EXTENSION));
        $image_extension = strtolower(pathinfo($target_image, PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_audio = array("mp3","wav","ogg","aac");
        $extensions_image = array("png", "jpg", "jpeg");

        // Check extension
        if(in_array($audio_extension, $extensions_audio) && in_array($image_extension, $extensions_image)){

          // Check file size
          if(($_FILES['imageupload']['size'] >= $max_imagesize) || ($_FILES["audioupload"]["size"] >= $max_audiosize)) {
              $_SESSION['message'] = "File too large. File must be less than 20MB for audio and 5MB for image.";
          }else{
              // Upload
              if(move_uploaded_file($_FILES['audioupload']['tmp_name'],$target_audio) && move_uploaded_file($_FILES['imageupload']['tmp_name'],$target_image)){
                // Insert media
                $userid = $_SESSION['userid'];
                $query = "INSERT INTO media(userid, image, audio) VALUES(?,?,?)";
                $stmt = $db->prepare($query);
                $stmt->bind_param('iss', $userid, $target_image, $target_audio);
                if($stmt->execute()) {
                  $mediaid = $stmt->insert_id; 
                  $title = $_POST['title']; 
                  $description = $_POST['description'];
                  $story = $_POST['story']; 
                  $category = $_POST['category']; 
                  $location = $_POST['location'];
                //insert posts
                  $post_query = "INSERT INTO posts (userid,mediaid,title,description,story,location,category) values (?,?,?,?,?,?,?)";
                  $pstmt = $db->prepare($post_query);
                  $pstmt->bind_param('iisssss', $userid,$mediaid,$title,$description,$story,$location,$category);
                  if($pstmt->execute()) {
                    $_SESSION['message'] = "Post successfully published, wait at 24hrs for the post to be approved";
                    $pstmt->close();
                    $stmt->close();
                  }else{
                    $_SESSION['message'] = "Post failed to publish ".$db->error;}
                }else{
                  $_SESSION['message'] = "media failed to publish ".$db->error;
                }
                
              }else{
                $_SESSION['message'] = "media fail to upload";
              }
          }
        }else{
          $_SESSION['message'] = "Invalid file extension.";
        }
    }else{
        $_SESSION['message'] = "Please select a file.";
    }
  }catch(Exception $ex){
    $_SESSION['message'] = $ex->getCode();
    include 'message.html.php';
  }
  include 'message.html.php';
  exit;
} 

// submit update data
if(isset($_POST['submitupdate'])){
  include("../assets/dbConnect.php");

  $firstname = $_POST['fname'];
  $lastname = $_POST['lname'];
  $email = $_POST['email'];
  $profession = $_POST['prof'];
  $address = $_POST['address'];
  $country = $_POST['country'];
  $state = $_POST['state'];
  $gender = $_POST['gender'];
  $age = $_POST['age'];
  $usertype = $_POST['usertype'];

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

//Open edit page
if (isset($_POST['action']) && $_POST['action'] == 'Edit') {
  try{
    include '../assets/dbConnect.php';
    $edit_query = "SELECT title, description, story FROM posts WHERE userid=? and postid=?";
    $estmt = $db->prepare($edit_query);
    $estmt->bind_param('ii',$_SESSION['userid'], $_POST['id']);
    $estmt->bind_result($title,$description,$story);
    $button = 'Edit Post';
    $action = "editpost";

    $estmt->execute();
    $estmt->fetch();
    $estmt->close();
    $query = "SELECT postid, postdate, title, description, story FROM posts WHERE userid=? ORDER BY postdate DESC";
    $stmt = $db->prepare($query);
    $stmt->bind_param('i',$_SESSION['userid']);
    if($stmt->execute()){
      $result = $stmt->get_result();
      $posts = $result->fetch_all(MYSQLI_ASSOC);
      $stmt->close();
      include 'storytellerprofile.php';
    }else{
      $_SESSION['message'] = 'Error occured '. $db_error;
    }
  }catch(Exception $ex){
    $_SESSION['message'] = 'Error occured '. $ex;
    include 'message.html.php';
  }
  exit();
}

//publish edit
if(isset($_POST['editpost'])){
  try{
  //load database
  include '../assets/dbconnect.php';

  $max_audiosize = 5242880*4; // 20MB
  $max_imagesize = 5242880; // 5MB

  if(isset($_FILES['audioupload']['name']) && isset($_FILES['imageupload']['name']) ){
      $audio_name = $_FILES['audioupload']['name'];
      $image_name = $_FILES['imageupload']['name'];
      $target_dir = "../uploads/";
      $target_audio = $target_dir . $audio_name;
      $target_image = $target_dir . $image_name;

      // Select file type
      $audio_extension = strtolower(pathinfo($target_audio, PATHINFO_EXTENSION));
      $image_extension = strtolower(pathinfo($target_image, PATHINFO_EXTENSION));

      // Valid file extensions
      $extensions_audio = array("mp3","wav","ogg","aac");
      $extensions_image = array("png", "jpg", "jpeg");

      // Check extension
      if(in_array($audio_extension, $extensions_audio) && in_array($image_extension, $extensions_image)){

        // Check file size
        if(($_FILES['imageupload']['size'] >= $max_imagesize) || ($_FILES["audioupload"]["size"] >= $max_audiosize)) {
            $_SESSION['message'] = "File too large. File must be less than 20MB for audio and 5MB for image.";
        }else{
            // Upload
            if(move_uploaded_file($_FILES['audioupload']['tmp_name'],$target_audio) && move_uploaded_file($_FILES['imageupload']['tmp_name'],$target_image)){
              // Insert media
              $userid = $_SESSION['userid'];
              $query = "INSERT INTO media(userid, image, audio) VALUES(?,?,?)";
              $stmt = $db->prepare($query);
              $stmt->bind_param('iss', $userid, $target_image, $target_audio);
              if($stmt->execute()) {
                $mediaid = $stmt->insert_id; 
                $title = $_POST['title']; 
                $description = $_POST['description'];
                $story = $_POST['story']; 
                $category = $_POST['category']; 
                $location = $_POST['location'];
              //insert posts
                $post_query = "UPDATE posts SET mediaid = ?,title = ?,description = ?,story = ?,location = ?,category = ? WHERE postid = ?";
                $pstmt = $db->prepare($post_query);
                $pstmt->bind_param('isssssi', $mediaid,$title,$description,$story,$location,$category,$_SESSION['postid']);
                if($pstmt->execute()) {
                  $_SESSION['message'] = "Post successfully edited.";
                  $pstmt->close();
                  $stmt->close();
                }else{
                  $_SESSION['message'] = "Post failed edit ".$db->error;}
              }else{
                $_SESSION['message'] = "media failed to edit ".$db->error;
              }
              
            }else{
              $_SESSION['message'] = "media fail to upload";
            }
        }
      }else{
        $_SESSION['message'] = "Invalid file extension.";
      }
  }else{
      $_SESSION['message'] = "Please select a file.";
  }
}catch(Exception $ex){
  $_SESSION['message'] = $ex->getCode();
  include 'message.html.php';
}
  include 'message.html.php';
  exit();
}

// Delete Post
if (isset($_POST['action']) && $_POST['action'] == 'Delete') {
  include '../assets/dbConnect.php';
  $sql = "DELETE FROM posts WHERE postid=?";
  $stmt = $db->prepare($sql);
  $stmt->bind_param('i', $_POST['id']);
  if($stmt->execute()){
    $_SESSION['message'] = "Post Succesfully Deleted";
    include 'message.html.php';
  }else{
    $_SESSION['message'] = "Error Occured ". $db->error;
    include 'message.html.php';
  }
  $stmt->close();
  exit();
}
// update profile
if(isset($_GET['updateprofile'])){
  include 'update_profile.php';
  exit();
}

//load default
try{
  include '../assets/dbConnect.php';
  $title = '';
  $description = '';
  $story= '';
  $button = "Publish Post";
  $action = "publish";
  $approved = 1;
  $query = "SELECT postid, postdate, title, description, story FROM posts WHERE userid=? ORDER BY postdate DESC";
  $stmt = $db->prepare($query);
  $stmt->bind_param('i',$_SESSION['userid']);
  if($stmt->execute()){
    $result = $stmt->get_result();
    $posts = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    include 'storytellerprofile.php';
  }else{
    $_SESSION['message'] = 'Error occured '. $db->error;
  }
}catch(Exception $ex){
  $_SESSION['message'] = 'Error occured '. $ex;
  include 'message.html.php';
}

?>