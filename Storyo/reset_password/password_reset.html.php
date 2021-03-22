<!DOCTYPE html>
<html>
<head>
	<title>Storyo</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/unsemantic-grid-responsive-tablet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">
</head>

<body>

  <header>

    <!-- The Navigation bar -->
    <nav style="border-bottom-style: solid; border-color: rgb(248, 147, 29);">
      <div class="wrapper">
        <a class="logo" href="#" style="margin: auto;">
          <img src="../assets/images/storyo3.png" alt="storyo-logo" height="70">
        </a>
         <ul class="nav-group">
           <li><a class="active" href="../">Home</a></li>
           <li><a href="about.html">Our Story</a></li>
         </ul>
       </div>
    </nav>
  </header>

    <div class="story-tell-profile" style="margin: 0 auto; width: 1000px; margin-top: 50px;">
        
        <div class="container">
 
            
<form method="post" class="form-signin">
        <h2 class="form-signin-heading btn-lg btn-secondary  btn-block">Password Reset Area</h2>
		<?php 
        if (isset($_POST['submit'])){
			$email = $_POST['email'];
			$password = MD5($_POST['password']);
			$password2 = MD5($_POST['password2']);
			if($password != $password2){?>
				<p><div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                Password do not match. You should check in on some of those password fields below.
                </div></p>
	            <?php 
            }
            else{
			include  '../assets/dbConnect.php';
                try{
                    //check if email is registered
                    $sql = 'SELECT COUNT(*) as count from  users
                        WHERE email = ?';
                    $s1 = $db->prepare($sql);
                    $s1->bind_param('s', $email);
                    $s1->execute();
                    $s1->bind_result($count);
                    $s1->fetch();
                    $s1->close();
                    if($count > 0) {
                        $query = "UPDATE users SET password = ? WHERE email = ?";
                        $s=$db->prepare($query);
                        $s->bind_param('ss', $password2, $email);
                        if($s->execute()){ ?>
                            <p>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                                Password reset successful. You should keep the new password save.
                                </div>
                            </p>
                                <?php
                                $s->close();
                        }else {  ?>
                                <p><div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                                    Your request failed. You should check the entered email quer. <?php echo $db->error ?>
                                </div></p>
                        <?php }
                    }else{ ?>
                        <p><div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                            Email not registered. You should check the email entered below.
                            </div>
                        </p>
                            <?php
                    }
                }catch (Exception $e){
                    //$error = 'Error updating submitted user.';
                    //$error= $e;
                    if(isset($e)){ ?>
                        <p><div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                        Your request failed. You should check the entered email.
                        </div></p>
                    <?php
                                
                    } 
                }
            }
        }?>
        <label for="inputEmail" > Your Email</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" >New Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
		<label for="reenterPassword" >Confirm Password</label>
        <input type="password" name="password2" id="password" class="form-control" placeholder="Password" required>
        <input type="hidden" name="action" value="login">
        <input class="btn btn-lg btn-secondary center-block" type="submit" name="submit" value="Submit"/>
        <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#"></a>
         
      </form>
               
         </div>
        
    </div>
   <div class="footer2">

    <footer class="text-center text-white " style="background-color: rgb(49, 49, 49); margin-top: 50px;">
        <!-- Grid container -->

        <!-- Grid container -->
      
        <!-- Copyright -->
        <div class="text-center p-3">
            <ul class="the-footer">
                <li><a class="active" href="index.html">Home</a></li>
                <li><a href="help.html">Help</a></li>
                <li><a href="about.html">Our Story</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="privacy.html">Privacy</a></li>
                <li><a href="terms.html">Terms & Conditions</a></li>
              </ul>
          © 2021 Copyright:
          <a class="text-white" href="ourstory.html">Charles Odum</a>
        </div>
        <!-- Copyright -->
      </footer>

    

</div>

</body>


</html>