<?php include_once 'assets/helpers.inc.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Storyo</title>
	<link rel="stylesheet" type="text/css" href="assets/css/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="assets/css/unsemantic-grid-responsive-tablet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>

<body>

  <header>

    <!-- The Navigation bar -->
    <nav>
      <div class="wrapper">
        <a class="logo" href="#">
          <img src="assets/images/storyo3.png" alt="storyo-logo" height="70">
        </a>
         <ul class="nav-group">
           <li><a class="active" href=".">Home</a></li>
           <li><a href="guest">Guest</a></li>
           <li><a href="storyteller">Story Teller</a></li>
           <li><a href="admin">Admin</a></li>
           <li><a href="about.html">Our Story</a></li>
           <li><a href="contact.html">Contact</a></li>
           <?php if (isset($_SESSION['email'])) { ?> 
              <li> <?php include "logout.html.php"; ?> </li>
              <li style="color:#fff"><?php echo $greeting; ?></li>
            <?php } ?>
         </ul>
       </div>
    </nav> <!-- The Navigation bar -->
  </header>

  
<div class="bottom-nav">
  <div class="wrapper">
    <p>Explore new stories</p>
    <div class="sub">
      <a>Read and share stories from independent voices, world-class publications, and experts from around the globe. Everyone's welcome.</a>
    </div>

        <!-- The search form -->
    <form class="search" action="" method="POST">
      <input type="text" placeholder="What are you looking for?" 
      name="search" value="<?php if(isset($_SESSION['search'])) htmlout($_SESSION['search'])?>">
      <button type="submit" name="searchpost"><i class="fa fa-search"></i></button>
    </form> <!-- The search form -->
    
    <div class="topbutton">
      <a href="?getstarted" class="button button1">Get Started</a>
    </div>
  
  </div>
</div>

<!-- The Filter bar -->
<div class="wrapper grid-con" style="margin-top: 40px; ">
  
    <div class="filter" style="margin-bottom:40px;">
    <table>
    <tr>
    <th>
      <form action="" Method="POST">
        <select class="custom-select" name="location" id="inputGroupSelect01" style="width: 180px; font-size: 17px; padding: 5px;">
            <option selected>Choose a location...</option>
            <option value="Aberdeen">Aberdeen</option>
            <option value="Cairo">Cairo</option>
          <option value="Ghuanzhou">Ghuanzhou</option>
        </select>
        <button type="submit" name="postlocation" style="width: 50px; font-size: 17px; padding: 5px; margin-right: 100px;">Sort</button>
      </form>
      </th>
      <th>
      <form action="" Method="POST">
      <select class="custom-select" name="category" id="inputGroupSelect01" style="width: 180px; font-size: 17px; padding: 5px;">
        <option selected>Choose Category...</option>
        <option value="Adventure">Adventure</option>
        <option value="Conspiracy">Conspiracy</option>
        <option value="Religion">Religion</option>
        <option value="Romance">Romance</option>
        <option value="Science">Science</option>
        <option value="Horror">Horror</option>
        <option value="Record Breaking">Record Breaking</option>
        <option value="Biography">Biography and Memoirs</option>
      </select>
      <button type="submit" name="postcategory" style="width: 50px; font-size: 17px; padding: 5px;">Sort</button>
      </form>
      </th>
      </tr>
      </table>
    </div> <!-- The Filter bar -->

<!-- The section for story posts -->
   <section class="section-container" style="margin-bottom: 30px;">
   <?php if (!$posts){ echo '<div class="alert-secondary">No Record Found</div>'; } else{ foreach ($posts as $posts): ?>
    
      <form method="GET" >
      <div class="blog-post" style="margin-bottom: 20px;">
        <div class="blog-post_img">
          <img src="<?php htmlout(substr($posts['image'], 3)); ?>" alt="image-20">
        </div>
        <div class="blog-post_info">
          <div class="blog-post_date">
          <span>Category: <?php htmlout($posts['category']); ?></span>
            <span><?php $date=date_create($posts['postdate']);htmlout(date_format($date,"F d Y")); ?></span>
          </div>
          <h1 class="blog-post_title"><?php htmlout($posts['title']); ?></h1>
          <p class="blog-post_text">
          <?php htmlout($posts['description']); ?>
          </p>
          <input type ="hidden" name="fullstory" value="<?php htmlout($posts['postid']) ?>" />
          <button type="submit" class="blog-post_cta">Full Story</button>
        </div>
      </div>
      </form>
      <?php endforeach; }?>
      
   </section>

   <!-- The aside -->
   <aside class="aside1">

    <div class="tags">
    <a>DISCOVER MORE OF WHAT MATTERS TO YOU</a><br><br>
    <a href="#" class="button button1" style="padding: 7px; font-weight: normal;">Adventure</a>
    <a href="#" class="button button1" style="padding: 7px; font-weight: normal;">Conspiracy</a>
    <a href="#" class="button button1" style="padding: 7px; font-weight: normal;">Religion </a>
    <a href="#" class="button button1" style="padding: 7px; font-weight: normal;">Horror</a>
    <a href="#" class="button button1" style="padding: 7px; font-weight: normal;">Romance</a>
    <a href="#" class="button button1" style="padding: 7px; font-weight: normal;">Science</a>
    <a href="#" class="button button1" style="padding: 7px; font-weight: normal;">Record Breaking</a>
    <a href="#" class="button button1" style="padding: 7px; font-weight: normal;">Religion</a>
    <a href="#" class="button button1" style="padding: 7px; font-weight: normal;">Biography  and Memoirs</a>
  </div>

    <div class="rec-stories">
    <div>
        <img src="https://media.giphy.com/media/Tk1JAnrarV7VcQmA4r/giphy.gif" alt="join" width="270">
    </div>
    </div>

    
    <div class="footer">
      <ul class="the-footer">
        <li><a href="login.html.php">Login</a></li>
        <li><a href="contact.html">Help</a></li>
        <li><a href="ourstory.html">Our Story</a></li>
        <li><a href="contact.html">Contact</a></li>
        <li><a href="privacy.html">Privacy</a></li>
        <li><a href="terms.html">Terms & Conditions</a></li>
      </ul>
    </div>

   </aside> <!-- The aside -->

  
</div>

</body>


</html>

