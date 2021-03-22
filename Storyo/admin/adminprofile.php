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
           <li><a class="active" href=".">Profile</a></li>
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
            <h3 class="text-secondary mb-1" style="margin-left: 15px;">Profile</h3>
            <div class="main-body">
                
                  <!-- /Breadcrumb -->
            
                  <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <p class="text-secondary mb-1">Admin</p>
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
                    <div class="form-group" style="max-width: 655px; border-bottom-style: solid; border-top-style: solid; border-color: rgb(248, 147, 29); padding-bottom: 19px;">
                    <h3 class="text-secondary mb-1" style="margin-left: 15px;">Published Stories</h3>
                        <table class="table table-sm table-striped ">
                            <thead>
                              <tr>
                                <th scope="col">Author</th>
                                <th scope="col">Title/Date</th>
                                <th scope="col">Description</th>
                                <th scope="col">Story</th>
                                <th csope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php if (!$posts){ echo '<tr><td>No Record Found</td></tr>'; } else{ foreach ($posts as $posts): ?>
                              <form method="POST">
                              <tr>
                                <td><?php htmlout($posts['firstname'].' '.$posts['lastname']); ?></td>
                                <td><?php htmlout($posts['title']); ?></br><?php htmlout($posts['postdate']); ?></td>
                                <td><?php htmlout($posts['description']); ?></td>
                                <td><?php htmlout($posts['story']); ?></td>
                                <td><input type="hidden" name="id" value="<?php htmlout($posts['postid']); $_SESSION['postid'] = $posts['postid'] ?>">
                                <?php
                                  if ($posts['approved'] == 0){ ?>
                                    <input class="btn btn-sm btn-success " type="submit" name="action" value="Approve">
                                  <?php } else{ ?>
                                  <input class="btn btn-sm btn-danger" type="submit"  name="action" value="Disprove">
                                  <?php } ?>
                                  <input class="btn btn-sm btn-secondary" type="submit" name="action" value="Read">
                                </td>
                              </tr>
                              </form>
                              <?php endforeach; } ?>
                              
                            </tbody>
                            </table>
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
          <a class="text-white" href="../about.html">Charles Odum | Intranet Systems Development</a>
        </div>
        <!-- Copyright -->
      </footer>

    

</div>

</body>


</html>
