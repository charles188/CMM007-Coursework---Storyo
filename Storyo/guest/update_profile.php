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
           <li><a  href=".">Home</a></li>
           <li><a class="active">Sign Up</a></li>
           <li><a href="../about.html">Our Story</a></li>
         </ul>
       </div>
    </nav>
  </header>

    <div class="story-tell-profile" style="margin: 0 auto; width: 1000px; margin-top: 50px;">
        
        <div class="container">
            <div class="main-body">
                
                  <!-- /sign up -->
            
                  <div class="row">
                    <div class="col-6 card" style="padding: 30px; align-items: center; max-width: 450px; margin-left: 50px;"> 
                        <div>
                            <img src="assets/images/storyo3.png" alt="storyo3" width="300">
                        </div><br>
                        <h5 style="text-align:center;">Update Your Profile</h5>
                        <p style="text-align:center; margin-bottom: 20px;" >Please fill in this form to create an account.</p>

                        <form method="POST">
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row mb-4">
                              <div class="col">
                                <div class="form-outline">
                                    <label class="form-label" for="form3Example1" ></label>
                                  <input type="text" id="form3Example1" class="form-control" placeholder="Enter First Name" name="fname" value= "<?php htmlout($_SESSION['firstname']) ?>" required/>
                                </div>
                              </div>
                              <div class="col">
                                <div class="form-outline">
                                    <label class="form-label" for="form3Example2">Last Name</label>
                                  <input type="text" id="form3Example2" class="form-control" placeholder="Enter Last Name" name="lname" value="<?php htmlout($_SESSION['lastname']) ?>" required/>
                                </div>
                              </div>
                            </div>
                          
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example3">Email</label>
                              <input type="email" id="form3Example3" class="form-control" placeholder="Enter Email" name="email" value="<?php htmlout($_SESSION['email']) ?>" required/>
                            </div>
                        
                            <!-- Profession input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example3">Profession</label>
                              <input type="text" id="form3Example3" class="form-control" placeholder="Enter Profession" name="prof" value="<?php htmlout($_SESSION['profession']) ?>" required/>
                            </div>

                            <!-- Address input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example3">Home address</label>
                              <input type="text" id="form3Example3" class="form-control" placeholder="Enter Address" name="address" value="<?php htmlout($_SESSION['address']) ?>" required/>
                            </div>

                            <!-- 2 column grid layout with text inputs for the country and state -->
                            <div class="row mb-4">
                                <div class="col">
                                  <div class="form-outline">
                                      <label class="form-label" for="form3Example1" >Country</label>
                                    <input type="text" id="form3Example1" class="form-control" placeholder="Enter Country" name="country" required/>
                                  </div>
                                </div>
                                <div class="col">
                                  <div class="form-outline">
                                      <label class="form-label" for="form3Example2">State</label>
                                    <input type="text" id="form3Example2" class="form-control" placeholder="Enter State" name="state"  value="<?php htmlout($_SESSION['state']) ?>" required/>
                                  </div>
                                </div>
                              </div>
                          
                              <!-- 2 column grid layout with text inputs for the gender and age -->
                            <div class="row mb-4">
                                <div class="col">
                                  <div class="form-outline">
                                      <label class="form-label" for="form3Example1" >Gender</label>
                                    <select class="custom-select form-control" id="inputGroupSelect01 form3Example2" name="gender" required>
                                        <option selected>Select Gender</option>
                                        <option value="female">Female</option>
                                        <option value="male">Male</option>
                                      </select>
                                  </div>
                                </div>
                                <div class="col">
                                  <div class="form-outline">
                                      <label class="form-label" for="form3Example2">Age</label>
                                    <input type="number" id="form3Example2" class="form-control" placeholder="Enter Age" name="age" value="<?php htmlout($_SESSION['age']) ?>" required/>
                                  </div>
                                </div>
                              </div>

                              <!-- Member Type input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example3">Membership Type</label>
                                <select class="custom-select form-control" id="inputGroupSelect01 form3Example2" name="usertype" required>
                                    <option selected>Select Membership Type</option>
                                    <option value="C">Regular Member</option>
                                    <option value="B">Storyteller</option>
                                  </select>
                            </div>

                            <!-- Checkbox -->
                            <div class="form-check d-flex justify-content-center mb-4">
                              <input class="form-check-input me-2" type="checkbox" value=""
                                id="form2Example3"
                                unchecked
                              />
                              
                            </div>
                          
                            <!-- Submit button -->
                            <button type="submit" name="submitupdate" class="btn btn-primary btn-block" style="margin-bottom: 25px; margin-left: 152px; width: 85px;">Submit</button>                   
                          
                          </form>
                    </div>

                  </div> <!-- /sign up -->
                    
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
