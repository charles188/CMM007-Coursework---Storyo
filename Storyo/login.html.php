<?php include_once 'assets/helpers.inc.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Storyo</title>
	<link rel="stylesheet" type="text/css" href="assets/css/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="assets/css/unsemantic-grid-responsive-tablet.css">
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
          <img src="assets/images/storyo3.png" alt="storyo-logo" height="70">
        </a>
         <ul class="nav-group">
           <li><a href="<?php if(!isset($home_url)) { $home_url = '.'; } htmlout($home_url)?>">Home</a></li>
           <li><a class="active" >Login</a></li>
           <li><a href="<?php if(!isset($signup_url)) { $signup_url = 'signup.html'; } htmlout($signup_url) ?>">Sign Up</a></li>
           <li><a href="about.html">Our Story</a></li>
         </ul>
       </div>
    </nav> <!-- The Navigation bar -->
  </header>

    <div class="story-tell-profile" style="margin: 0 auto; width: 1000px; margin-top: 50px;">
        
        <div class="container">
            <div class="main-body">
                
                  <!-- /sign in form-->
            
                  <div class="row">
                    <div class="col-6 card" style="padding: 30px; align-items: center; max-width: 400px; margin-left: 70px;"> 
                        
                        <div>
                            <img src="assets/images/login.png" alt="contactus" height="200">
                        </div>
                        <h4 style="text-align:center; margin-top: 20px;" >Sign in to your account to view stories from top storytellers around the world.</h4>
          <hr>
                    </div>

                    <form method="post" action="<?php if(!isset($login_url)) { $login_url = 'login.php'; } htmlout($login_url)?>" class="col-6 card" style="padding: 30px; align-items: center; width: 400px; margin-left: 40px;">
                       
                        <h2 style="text-align:center;">Sign In To Get Access</h2>
                        <?php if (isset($loginError)): ?>
                          <p><?php echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                                '.$loginError.' You should check in on some of those fields below.
                              </div>' ?>
                            </p>
                        <?php endif; ?>  
                        <div class="form-outline" style="width: 350px;">
                            <label class="form-label" for="typeEmail" style="padding-top: 10px;">Email</label>
                            <input type="email" id="typeEmail" class="form-control" placeholder="Enter Email" name="email" required />
                        </div>

                        <div class="form-outline" style="width: 350px;">
                            <label class="form-label" for="typePassword" style="padding-top: 10px;">Password</label>
                            <input type="password" id="typePassword" class="form-control" placeholder="Enter Password" name="password" required />
                        </div>
                        <input type="hidden" name="action" value="login">
                        <button type="submit" class="btn btn-primary btn-block" value="Login"style="margin-top: 25px; margin-bottom: 25px;  width: 80px;">Sign in</button>

                        <p style="text-align:center;"> Don't have an account? <a href="<?php if(!isset($signup_url)) { $signup_url = 'signup.html'; } htmlout($signup_url) ?>" style="color:rgb(9, 109, 209)">Sign Up Here</a>.</p>
                        
                      </form>

                  </div> <!-- /sign in form-->
                    
                  </div>
                </div>
            </div>
        
    </div>





    <!-- the footer -->                      
   <div class="footer2">

    <footer class="text-center text-white " style="background-color: rgb(49, 49, 49); margin-top: 50px;">
      
        <!-- Copyright -->
        <div class="text-center p-3">
            <ul class="the-footer">
                <li><a href=".">Home</a></li>
                <li><a href="contact.html">Help</a></li>
                <li><a href="about.html">Our Story</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="privacy.html">Privacy</a></li>
                <li><a href="terms.html">Terms & Conditions</a></li>
              </ul>
          © 2021 Copyright:
          <a class="text-white" href="about.html">Charles Odum | Intranet Systems Development</a>
        </div>
        <!-- Copyright -->
      </footer> <!-- the footer -->

    

</div>

</body>


</html>
