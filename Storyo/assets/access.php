<?php

function userIsLoggedIn()
{
  if (isset($_POST['action']) and $_POST['action'] == 'login')
  {
    if (!isset($_POST['email']) or $_POST['email'] == '' or
      !isset($_POST['password']) or $_POST['password'] == '')
    {
      $GLOBALS['loginError'] = 'Please fill in both fields';
      return FALSE;
    }

    $password = MD5($_POST['password']);

    if (databaseContainsAuthor($_POST['email'], $password))
    {
      session_start();
      $_SESSION['loggedIn'] = TRUE;
      $_SESSION['email'] = $_POST['email'];
      $_SESSION['password'] = $password;
      return TRUE;
    }
    else
    {
      session_start();
      unset($_SESSION['loggedIn']);
      unset($_SESSION['email']);
      unset($_SESSION['password']);
      $GLOBALS['loginError'] =  'The specified email address or password was incorrect.';
      return FALSE;
    }
  }

  if (isset($_POST['action']) and $_POST['action'] == 'logout')
  {
    session_start();
    unset($_SESSION['loggedIn']);
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    unset($_SESSION['name']);
    backUp();
    header('Location: ' . $_POST['goto']);
    exit();
  }

  session_start();
  if (isset($_SESSION['loggedIn']))
  {
    return databaseContainsAuthor($_SESSION['email'], $_SESSION['password']);
  }
}



function databaseContainsAuthor($email, $password)
{
  include 'dbConnect.php';

  try
  {
    $sql = 'SELECT COUNT(*) as count FROM users
        WHERE email = ? AND password = ?';
    $s = $db->prepare($sql);
    $s->bind_param('ss', $email, $password);
    $s->execute();
  }
  catch (Exception $e)
  {
      $GLOBALS['loginError'] = 'Error searching for user.';
    //include 'error.html.php';
    exit();
  }

  $row = $s->fetch();
  
  if ($row['count'] > 0)
  {
  
    return TRUE;
  }
  else
  {
    return FALSE;
  } 
  
}

function userHasType($type)
{
  include 'dbConnect.php';

  try
  {
    $sql = "SELECT COUNT(*) FROM users WHERE email = :email AND usertype = :usertype";
    $s = $db->prepare($sql);
    $s->bind_param('ss', $_SESSION['email'], $type);
    $s->execute();
  }
  catch (PDOException $e)
  {
     $GLOBALS['loginError'] = 'Error searching for user roles.';
    //include 'error.html.php';
    exit();
  }

  $row = $s->fetch();

  if ($row[0] > 0)
  {
    return TRUE;
  }
  else
  {
    return FALSE;
  }
}
