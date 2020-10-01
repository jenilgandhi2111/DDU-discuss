<?php
session_start();
//echo $_SESSION['username'];
//echo $_SESSION['cat'];
//echo $_SESSION['uid'];
if($_SESSION==0)
{
    header('location:index.php');
}

if(!isset($_SESSION['cat']))
{
    header('location:index.php');
}

?>
<?php
include "partial/_dbconnect.php";
$usnm=$_POST['search_users'];
$sname=$usnm;
$search_name="%".$usnm."%";
$sql='SELECT * FROM `users` WHERE name LIKE "'.$search_name.'" order by name ';
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Search-users</title>
  </head>
  <body>
  <?php
  include "partial/_header.php";
  ?>
<div class="container">
<?php

  if($num>0)
  {
    echo '<div class="conatiner my-4 display-4"  style="text-align:center;font-size:30px">
    <p>Found '.$num.' Results naming <b>'.$sname.'</b> </p>
    <hr>
    
  </div>';
    while($row=mysqli_fetch_assoc($result))
    {
      //this while loop fetches the results from the database and shows it in the particular formated way  
      $name=$row['name'];
      $role=$row['role'];
      $id=$row['user_id'];
      $institution=$row['Institution'];
      $expert=$row['expert_in'];
      $fpath=$row['photo'];
      if($fpath=="no")
      {
        $fpath="partial/userdefault.png";
      }
      echo '
      
      <div class="card mb-3" style="max-width: 540px; border:1px solid green">
      <div class="row no-gutters">
        <div class="col-md-4">
          <img src="'.$fpath.'" class="card-img rounded" style="padding:10px;height:181px;width:185px">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title"><a class="text-success" href="user.php?user_id='.$id.'">'.$name.'</a></h5>
            <p class="card-text">'.$role.' at '.$institution.'</p>
            <p class="card-text"><small class="text-muted">Expert in: '.$expert.'</small></p>
          </div>
        </div>
      </div>
    </div>
    ';
    }
  }
  else
  {  
    echo '<div class="conatiner mt-4 display-4"  style="text-align:center">
    <h1>Sorry No user found named '. $usnm .'</h1>
    <p>You could always ask your friend '.$usnm.' to join </p>
  </div>';
  }




  ?>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
