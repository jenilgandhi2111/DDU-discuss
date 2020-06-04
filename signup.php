<?php
error_reporting(0);
include "partial/_dbconnect.php";
$name=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['pass'];
$cpassword=$_POST['cpass'];
$institute=$_POST['institute'];
$error_showing="null";
$type="Rookie";
if($_POST['stuprof']=="student"||$_POST['stuprof']=="Student")
{
    $role="student";
}
else
{
    
    $role="professor";
}

$sql1="SELECT name FROM `users` WHERE name='$name'";
$result1=mysqli_query($conn,$sql1);
//echo var_dump($result1);
$num= mysqli_num_rows($result1);
//echo $num;
if($num>0)
{
  $error_showing="Username already exists";
  //echo $error_showing;
}
else
{




if($password==$cpassword && $name!="" && $password!="")
{

  $sql="INSERT INTO `users` (`user_id`, `name`, `password`, `Institution`, `type`, `role`, `expert_in`, `Answered`, `contact_info`, `date-added`, `photo`) VALUES (NULL, '$name', '$password', '$institute', '$type', '$role', 'No', '0', '$email', current_timestamp(), 'no')";


  $result=mysqli_query($conn,$sql);
  if($result)
  {
    $error_showing="passed";
  }
  else
  {
    echo "erroooooooooor";
  }
}
else
{
    $error_showing="pass mismatch";
    //echo $error_showing;
    if($name=="")
    {
      $error_showing="plain username not allowed";
    }
    if($password=="")
    {
      $error_showing="plain pass";
    }
}
}
?>








<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/aa880fb50f.js" crossorigin="anonymous"></script>

  </head>
  <body>
  <nav class="navbar navbar-dark bg-dark">
  <span class="navbar-text text-light" style="font-size:40px">
    DDU-Discuss
  </span>
  <span class="text-light" style="float:right;padding-left:700px">
      Already have an account
  </span>
  <span style="float: right;"><a href="index.php"><button type="button" class="btn btn-success">Login</button></a></span>
</nav>

<?php
  if($error_showing=="Username already exists")
  {
    echo '<div class="alert alert-dark alert-dismissible fade show" role="alert">
    <strong>Username is already taken</strong> Try another username
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
  if($error_showing=="pass mismatch")
  {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Passwords Mismatched</strong> Try matching your password
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
  if($error_showing=="passed")
  {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Your account is created </strong> you could go to <a href="index.php" class="text-success">login page</a>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
  /*if($error_showing=="plain username not allowed")
  {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Plain username found </strong>Keep a valid username
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }*/
  if($error_showing=="plain pass")
  {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Plain Password not allowed </strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
  

?>
<form method="post" action="signup.php">
<div class="login-box">
  <h1>Signup</h1>
  <div class="textbox">
    <i class="fas fa-user"></i>
    <input type="text" name="username" placeholder="Username">
  </div>
  <div class="textbox">
  <i class="fa fa-university" aria-hidden="true"></i>

    <input type="text" name="institute" placeholder="Institution">
  </div>
  <div class="textbox">
  <i class="fa fa-graduation-cap" aria-hidden="true"></i>
    <input type="text" name="stuprof" placeholder="Student/professor">
  </div>
  <div class="textbox">
  <i class="fa fa-envelope" aria-hidden="true"></i>

    <input type="text" name="email" placeholder="E-mail">
  </div>

  <div class="textbox">
    <i class="fas fa-lock"></i>
    <input type="password" name="pass" placeholder="Password">
  </div>
  <div class="textbox">
    <i class="fas fa-lock"></i>
    <input type="password" name="cpass" placeholder="Confirm Password">
  </div>

  <input type="submit" class="btn btn-success" value="Sign Up">
</form>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include "partial/_footer.php";
?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
