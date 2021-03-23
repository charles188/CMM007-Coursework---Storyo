
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
    </nav> <!-- The Navigation bar -->
  </header>

    <div class="story-tell-profile" style="margin: 0 auto; width: 1000px; margin-top: 50px;">
        
        <div class="container">
            <h3 class="text-secondary mb-1" style="margin-left: 15px;">Profile</h3>
            <div class="main-body">
                
                  <!-- storyteller profile -->
            
                  <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <p class="text-secondary mb-1">Storyteller</p>
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
                    <div  class="form-group" style="max-width: 655px; border-bottom-style: solid; border-color: rgb(248, 147, 29); padding-bottom: 19px;">
                      <form method="post"  enctype="multipart/form-data" >
                        <input type="text" id="typeText" placeholder="Enter Title" class="form-control" name="title" value= "<?php htmlout($title); ?>" style="margin-bottom: 3px;"/>
                        <textarea class="form-control" id="exampleFormControlTextarea3" placeholder="Enter Description" rows="3" name="description" style="margin-bottom: 3px;"><?php htmlout($description); ?></textarea>
                        <textarea class="form-control" id="exampleFormControlTextarea3" placeholder="Enter Story" rows="15" name="story" style="margin-bottom: 20px;"><?php htmlout($story); ?></textarea>
                        
                        <div style="display: block; margin-bottom: 15px;">
                        <a style="margin-right: 15px;">Select audio to upload</a>
                        <input type="file" name="audioupload" id="audioupload">
                        </div>

                        
                        <a style="margin-right: 15px;">Select image to upload</a>
                        <input type="file" name="imageupload" id="imageupload">
                        
                        <div class="row" style="margin-top: 25px;">

                         <div class="col-md-6">
                            <div class="input-group" style="margin-left: 25px;">
                                <div class="input-group-prepend">
                                  <label class="input-group-text" for="inputGroupSelect01">Location</label>
                                </div>
                                <select class="custom-select" name="location" id="inputGroupSelect01" style="width: 160px;">
                                  <option selected>Choose Location...</option>
                                  <option value="Aberdeen">Aberdeen</option>
                                  <option value="Cairo">Cairo</option>
                                  <option value="Ghuanzhou">Ghuanzhou</option>
                                  <option value="Glasgow">Glasgow</option>
                                  <option value="Columbus">Columbus</option>
                                  <option value="New York">New York</option>
                                  <option value="New Castle">New Castle</option>
                                </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="input-group" style="margin-left: 25px;">
                                <div class="input-group-prepend">
                                  <label class="input-group-text" for="inputGroupSelect01">Category</label>
                                </div>
                                <select class="custom-select" name="category" id="inputGroupSelect01" style="width: 160px;">
                                  <option selected>Choose Category...</option>
                                  <option value="Adventure">Adventure</option>
                                  <option value="Conspiracy">Conspiracy</option>
                                  <option value="Religion">Religion</option>
                                  <option value="Romance">Romance</option>
                                  <option value="Science">Science</option>
                                  <option value="Horror">Horror</option>
                                  <option value="Record Breaking">Record Breaking</option>
                                  <option value="Biography and Memoirs">Biography and Memoirs</option>
                                </select>
                            </div>
                          </div>

                        <div style="margin-bottom: 10px; margin-top: 25px;">
                        <button type="submit" name="<?php htmlout($action)?>" class="btn btn-primary" style="margin-left: 260px; background-color: rgb(248, 147, 29); border: 1px solid aliceblue;"><?php htmlout($button)?></button>                      
                      </div>
                      </div>
                      
                      </form>

                      <div style="max-width: 655px; border-top-style: solid; border-color: rgb(248, 147, 29); padding-bottom: 19px; padding-top: 70px; margin-top: 18px;">
                        <h3 class="text-secondary mb-1" style="margin-left: 15px;">My Stories</h3>
                        <table class="table table-sm table-striped ">
                            <thead>
                              <tr>
                              <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Story</th>
                                <th csope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php if (!$posts){ echo '<tr><td>No Record Found</td></tr>'; } else{ foreach ($posts as $posts): ?>
                              <form method="POST">
                              <tr>
                                <td><?php htmlout($posts['title']); ?></br><?php htmlout($posts['postdate']); ?></td>
                                <td><?php htmlout($posts['description']); ?></td>
                                <td><?php htmlout($posts['story']); ?></td>
                                <td><input type="hidden" name="id" value="<?php htmlout($posts['postid']); $_SESSION['postid'] = $posts['postid'] ?>">
                                  <input class="btn btn-sm btn-secondary " type="submit" name="action" value="Edit">
                                  <input class="btn btn-sm btn-danger" type="submit"  name="action" value="Delete"></td>
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
        
    </div>

   <div class="footer2">

      <!-- the footer -->
    <footer class="text-center text-white " style="background-color: rgb(49, 49, 49); margin-top: 50px;">

      
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
      </footer> <!-- the footer -->

    

</div>

</body>
</html>
