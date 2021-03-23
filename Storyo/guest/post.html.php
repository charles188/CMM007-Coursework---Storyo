
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
          <img src="assets/images/storyo3.png" alt="storyo-logo" height="70">
        </a>
         <ul class="nav-group">
           <li><a  href="../">Home</a></li>
           <li><a class="active" href=".">Posts</a></li>
           <li><a href="../about.html">Our Story</a></li>
           <li><a href="../contactus.html">Contact Us</a></li>
           <li><?php include '../logout.html.php'; ?></li>
           <li style="color:#fff"><?php echo $greeting; ?></li>
         </ul>
       </div>
    </nav>
  </header>

    <div class="story-tell-profile" style="margin: 0 auto; width: 1000px; margin-top: 50px;">
        
        <div class="container">
            
            <div class="main-body">
                
                  <!-- /Breadcrumb -->
            
                  <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                      <div class="card" style="width: 250px; height: 80px;">
                        <div class="card-body">
                          <div class="d-flex flex-column align-items-center text-center">
                            
                            <a><img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="50" style="margin-right: 14px">Wesley Virgin</a><br>
                            <div class="mt-3">
                              
                             
                             
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    

                    <div class="form-group flex-column" style="max-width: 655px; color: rgb(79, 172, 254); height: 80px;">
                        
                        <h3 class="text-secondary mb-1" style="margin-left: 5px; color: rgb(79, 172, 254); line-height: 80px;">THE GREAT STONES</h3>

                    </div>

                    <div class="row">

                        <div class="col-8 card">
                            
                            <div class="post-media">
                                <img src="assets/images/image-20.jpg" alt="image-20">
                            </div>

                        </div>

                        <div class="col-4" style="padding-left: 23px; padding-top: 20px">
                            
                            <p class="blog-post_text" style="font-size: 21px;">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a sem vel nulla blandit tincidunt sed a lectus.
                                 Vivamus ultrices dolor id felis interdum, et hendrerit nisi tempus. Cras ut metus ac ante commodo semper. 
                                 Nullam sit amet cursus ex. In eget sem sit amet lorem efficitur tempor. 
                            </p>
                        
                        </div>

                      </div>

                      <div class="post-body" style="margin-top: 30px; font-size: 19px;">
                          
                        <audio controls style="width: 970px;">
                            <source src="http://www.w3schools.com/html/horse.ogg" type="audio/ogg" />
                            <source src="http://www.w3schools.com/html/horse.mp3" type="audio/mpeg" />
                            <a href="http://www.w3schools.com/html/horse.mp3">horse</a>
                        </audio>

                        <p class="post-body_text" style="margin-top: 30px;">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                             Fermentum odio eu feugiat pretium nibh ipsum consequat nisl. Pretium fusce id velit ut tortor pretium viverra suspendisse 
                             potenti. Maecenas pharetra convallis posuere morbi leo urna molestie at. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                             Fermentum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                             Fermentum odio eu feugiat pretium nibh ipsum consequat nisl. Pretium fusce id velit ut tortor pretium viverra suspendisse 
                             potenti.
                        </p>

                        <p class="post-body_text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                             Fermentum odio eu feugiat pretium nibh ipsum consequat nisl. Pretium fusce id velit ut tortor pretium viverra suspendisse 
                             potenti. Maecenas pharetra convallis posuere morbi leo urna molestie at.
                        </p>

                        <p class="post-body_text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                             Fermentum odio eu feugiat pretium nibh ipsum consequat nisl. Pretium fusce id velit ut tortor pretium viverra suspendisse 
                             potenti. Maecenas pharetra convallis posuere morbi leo urna molestie at.
                             Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                             Fermentum odio eu feugiat pretium nibh ipsum consequat nisl. Pretium fusce id velit ut tortor pretium viverra suspendisse 
                             potenti.
                        </p>

                        <p class="post-body_text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                             Fermentum odio eu feugiat pretium nibh ipsum consequat nisl. Pretium fusce id velit ut tortor pretium viverra suspendisse 
                             potenti. Maecenas pharetra convallis posuere morbi leo urna molestie at. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                             Fermentum odio eu feugiat pretium nibh ipsum consequat nisl. Pretium fusce id velit ut tortor pretium viverra suspendisse 
                             potenti.
                        </p>

                        <p class="post-body_text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                             Fermentum odio eu feugiat pretium nibh ipsum consequat nisl. Pretium fusce id velit ut tortor pretium viverra suspendisse 
                             potenti. Maecenas pharetra convallis posuere morbi leo urna molestie at.
                        </p>

                        <p class="post-body_text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                             Fermentum odio eu feugiat pretium nibh ipsum consequat nisl. Pretium fusce id velit ut tortor pretium viverra suspendisse 
                             potenti. Maecenas pharetra convallis posuere morbi leo urna molestie at.
                        </p>

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
                <li><a href="help.html">Help</a></li>
                <li><a href="ourstory.html">Our Story</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="privacy.html">Privacy</a></li>
                <li><a href="Terms.html">Terms & Conditions</a></li>
              </ul>
          © 2021 Copyright:
          <a class="text-white" href="https://mdbootstrap.com/">Charles Odum</a>
        </div>
        <!-- Copyright -->
      </footer>

    

</div>

</body>


</html>
