<?php

include("assets/dbConnect.php"); //Connect with database
session_start();

if(empty($_POST["email"]) || empty($_POST["password"])) 
{
    $GLOBALS['loginError'] = 'Both fields are required.';
}

//else echo $OK

    $email = $_POST['email'];
    $password = MD5($_POST['password']);
    //$sql = "SELECT * FROM users WHERE username LIKE '$email' AND password LIKE '$password' ";
    //$sql="SELECT userid FROM users WHERE email='$email' and password='$password'";

    //$result = $conn->query($sql);
   // $result=mysqli_query($db,$sql);

    $query = "SELECT userid, usertype, firstname, lastname, profession, address, state, gender, age
     FROM users WHERE email=? AND password=? LIMIT 1";
    $stmt = $db->prepare($query);
    $stmt->bind_param('ss', $email, $password);
    $stmt->execute();
    $stmt->bind_result($userid, $usertype, $firstname, $lastname, $profession, $address, $state, $gender, $age );
    $stmt->fetch();
    
    if($usertype == "A")
    {
        $_SESSION['email'] = $email;
        $_SESSION['userid'] = $userid;
        $_SESSION['firstname'] = $firstname;
        $_SESSION['usertype'] = $usertype;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['profession'] = $profession;
        $_SESSION['address'] = $address;
        $_SESSION['age'] = $age;
        $_SESSION['gender'] = $gender;
        $_SESSION['state'] = $state;
        //goto fullstory
        fullStory();
        header('Location: admin');
    }
    else if($usertype == "B")
    {
        $_SESSION['email'] = $email;
        $_SESSION['userid'] = $userid;
        $_SESSION['firstname'] = $firstname;
        $_SESSION['usertype'] = $usertype;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['profession'] = $profession;
        $_SESSION['address'] = $address;
        $_SESSION['age'] = $age;
        $_SESSION['gender'] = $gender;
        $_SESSION['state'] = $state;
        //goto fullstory
        fullStory();
        header('Location: storyteller');
    }
    else if($usertype == "C")
    {
        $_SESSION['email'] = $email;
        $_SESSION['userid'] = $userid;
        $_SESSION['firstname'] = $firstname;
        $_SESSION['usertype'] = $usertype;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['profession'] = $profession;
        $_SESSION['address'] = $address;
        $_SESSION['age'] = $age;
        $_SESSION['gender'] = $gender;
        $_SESSION['state'] = $state;
        //goto fullstory
        fullStory();
        header('Location: guest');
    }
    else
    {
        $GLOBALS['loginError']  = "Email / Password is Invalid";
        //header('Location: login.html.php');
        $home_url = '.';
        $login_url = 'login.php';
        $password_url = 'reset_password';
        include 'login.html.php';
    }

    function fullStory(){
        if(isset($_SESSION['fullstory'])){
            $postid = $_SESSION['fullstory'];
            try{
                include 'assets/dbConnect.php';
                $query = "SELECT postid, date(postdate) as postdate, title, description, story, category, location,
                 audio, image, firstname, lastname FROM posts INNER JOIN media ON posts.mediaid = media.mediaid 
                INNER JOIN users on posts.userid = users.userid WHERE postid = '".$postid."'";
                $result = $db->query($query);
                if($result) {
                    $posts = $result->fetch_assoc();
                    $_SESSION['posts'] = $posts;
                    $_SESSION['homeurl'] = '../';
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
    $db -> close();

?>