<?php

 $_POST['cat_search'];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Search catagories</title>
  </head>
  <body>
    <?php
include "partial/_header.php";

?>

<?php

$cat= $_POST['cat_search'];
include "partial/_dbconnect.php";
$sql="SELECT * FROM `CATEGORIES` WHERE category='$cat'";
$res=mysqli_query($conn,$sql);
$num=mysqli_num_rows($res);
if($num>0)
{
while($row=mysqli_fetch_assoc($res))
{
    $catname=$row['category'];
    $description=$row['description'];
    $cat_id=$row['category_id'];
    //echo $catname;
    //echo $cat_id;
    //echo $description;

    echo '
    <div class="container my-4">
    <div class="card" style="width: 18rem;">
    <img src="https://source.unsplash.com/500x400/?coding,'.$catname.'" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">'.$catname.'</h5>
      <p class="card-text">'.$description.'</p>
      <a href="listthreads.php?cat_id='.$cat_id.'" class="btn btn-success">View Discussions</a>
    </div>
    </div>
  </div>
  <br><br><br><br><br><br><br><br><br>';
}
}
else
{
    echo '
    <div class="conatiner mt-4"><h2 style="text-align:center">Sorry No category found named '.$cat.'</h2>
    <br><p style="text-align:center">Ask the admin to add this category go to <a href="contact.php" class="text-success">  contact us page</a></p>
    
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    
    
    ';
}
?>


<?php
include "partial/_footer.php";

?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>