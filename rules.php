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
require "partial/_dbconnect.php";
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/aa880fb50f.js" crossorigin="anonymous"></script>
    <title>DDU Discuss</title>

</head>

<body>
    <?php
    include "partial/_header.php";
    ?>
    



<div class="my-5">
<div class="container mt-7">
<ul class="list-group mt-7">
  <li class="list-group-item active bg-dark">Rules for discussion in forums</li>
  <?php
  $sql='SELECT * FROM `rules`';
  $result=mysqli_query($conn,$sql);
  
  while($row=mysqli_fetch_assoc($result))

  {
  if($result)
  {
    echo'<li class="list-group-item">'.$row['Rule'].' </li>';
  }
  else
  {

  }
}

  ?>
  <br> <br> <br> <br>
  
</ul>
</div>
</div>











    <?php
    include "partial/_footer.php";
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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