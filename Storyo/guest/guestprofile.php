
<?php include_once '../assets/helpers.inc.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Storyo</title>
	  <link rel="stylesheet" type="text/css" href="../assets/css/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/unsemantic-grid-responsive-tablet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
           <li><a href="../">Home</a></li>
           <li><a class="active" href="storytellerprofile.php">Profile</a></li>
           <li><a href="../about.html">Our Story</a></li>
           <li><a href="../contact.html">Contact Us</a></li>
           <li><?php include '../logout.html.php'; ?></li>
           <li style="color:#fff"><?php htmlout($greeting); ?></li>
         </ul>
       </div>
    </nav>
  </header>

    <div class="story-tell-profile" style="margin: 0 auto; width: 1000px; margin-top: 50px;">
        
        <div class="container flex-column align-items-center text-center">
            <h3 class="text-secondary mb-1" style="margin-left: 15px;">Profile</h3>
            <div class="main-body">
                
                  <!-- /Breadcrumb -->
            
                  <div class="row gutters-sm">
                    <div class="">
                      <div class="card" style="width: 400px; margin-left: 300px;">
                        <div class="card-body">
                          <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <p class="text-secondary mb-1">Guest</p>
                              <h4><?php htmlout($_SESSION['firstname'].' '.$_SESSION['lastname']) ?></h4><br><br><br><br><br>
                              <p class="text-secondary mb-1"><?php htmlout($_SESSION['profession']) ?></p>
                              <p class="text-muted font-size-sm"><?php htmlout($_SESSION['address'].' '.$_SESSION['state']) ?></p>
                              <p class="text-secondary mb-1"><?php htmlout($_SESSION['gender']. ', '.$_SESSION['age']. ' Years') ?></p>
                              <p><a class="btn btn-primary" href="?updateprofile">Update Profile</a></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
            </div>
        
    </div>

   <div class="footer2">

    <footer class="text-center text-white " style="background-color: rgb(49, 49, 49); margin-top: 50px;">
        <!-- Grid container -->

        <!-- Grid container -->
      
        <!-- Copyright -->
        <div class="text-center p-3">
            <ul class="the-footer">
                <li><a href="../">Home</a></li>
                <li><a href="../contact.html">Help</a></li>
                <li><a href="../about.html">Our Story</a></li>
                <li><a href="../contact.html">Contact</a></li>
                <li><a href="../privacy.html">Privacy</a></li>
                <li><a href="../terms.html">Terms & Conditions</a></li>
              </ul>
          © 2021 Copyright:
          <a class="text-white" href="../about.html">Charles Odum | Intranet System Development</a>
        </div>
        <!-- Copyright -->
      </footer>

    

</div>

</body>
</html>
