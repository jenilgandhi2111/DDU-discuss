<?php
error_reporting(0);
include "partial/_dbconnect.php";
$usnm=$_POST['username'];
$password=$_POST['password'];
$sql="SELECT * FROM `users` WHERE name='$usnm' AND password='$password'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
$error_displayer="";

if($num>0)
{
  //echo "success";
  header('location:home.php');
  session_start();
  $_SESSION['username']=$usnm;
  $_SESSION['cat']=true;
  while($row=mysqli_fetch_assoc($result))
  {
    $uid=$row['user_id'];
  }
  $_SESSION['uid']=$uid;
}
// validation for password
else if($password!="")
{
  //echo "oops";
  $error_displayer="true";
}
?>





<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/aa880fb50f.js" crossorigin="anonymous"></script>

</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-text text-light" style="font-size:40px">
            DDU-Discuss
        </span>
        <span class="text-light" style="float:right;padding-left:700px">
            Do not have an account?

        </span>
        <span style="float: right;"><a href="signup.php"><button type="button"
                    class="btn btn-success">SignUp</button></a></span>
    </nav>
    <?php
if($error_displayer=="true")
{
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Wrong Username or Password </strong>Try again.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
?>
    <form method="post" action="index.php">
        <div class="login-box">
            <h1>Login</h1>
            <div class="textbox">
                <i class="fas fa-user"></i>
                <input type="text" name="username" placeholder="Username">
            </div>

            <div class="textbox">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password">
            </div>

            <input type="submit" class="btn btn-success" value="Login">
    </form>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php
include "partial/_footer.php";
?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>
