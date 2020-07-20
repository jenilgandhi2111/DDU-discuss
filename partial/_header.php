<?php 
error_reporting(0);


echo' <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="home.php">DDU-Discuss</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          
        <a class="dropdown-item" href="listthreads.php?cat_id=1">Competetive Programming</a>
        <a class="dropdown-item" href="listthreads.php?cat_id=3">C Programming</a>
        <a class="dropdown-item" href="listthreads.php?cat_id=4">Java</a>
        <a class="dropdown-item" href="listthreads.php?cat_id=5">PHP</a>
        <a class="dropdown-item" href="listthreads.php?cat_id=6">.NET</a>
        
          
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="index.php">For More Look Down</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact Us</a>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       HEY! '.$_SESSION['username'].'
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        
      <a class="dropdown-item" href="profile.php">View your Profile</a>
      <a class="dropdown-item" href="rules.php">Rules</a>
      <a class="dropdown-item" href="about.php">About Us</a>
     
      
        
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="logout.php">logout</a>
      </div>
    </li>
      
    </ul>
    <form method="post" action="user_list.php" class="form-inline my-2 my-lg-0" style="padding-right:10px">
      <input class="form-control mr-sm-2" name="search_users" type="search" placeholder=" Search your Friends" aria-label="Search">
      <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <form class="form-inline my-2 my-lg-0" method="post" action="search_cat.php">
      <input class="form-control mr-sm-2" name="cat_search" type="search" placeholder="Search categories" aria-label="Search">
      <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    
    s
    
  </div>
</nav>';

?>