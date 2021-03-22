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
           <li><a class="active" href="../">Home</a></li>
           <li><a href="../about.html">Our Story</a></li>
         </ul>
       </div>
    </nav>
  </header>

    <div class="story-tell-profile" style="margin: 0 auto; width: 1000px; margin-top: 50px;">
        
        <div class="container">
 
            <form class="form-signin">
           <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                <strong><p><?php echo $_SESSION['message']; ?><a href=".">Back</a></p></strong> 
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
                <li><a class="active" href="../">Home</a></li>
                <li><a href="../help.html">Help</a></li>
                <li><a href="../about.html">Our Story</a></li>
                <li><a href="../contact.html">Contact</a></li>
                <li><a href="../privacy.html">Privacy</a></li>
                <li><a href="../terms.html">Terms & Conditions</a></li>
              </ul>
          © 2021 Copyright:
          <a class="text-white" href="../about.html">Charles Odum | Intranet Systems Development</a>
        </div>
        <!-- Copyright -->
      </footer>

    

</div>

</body>


</html>
