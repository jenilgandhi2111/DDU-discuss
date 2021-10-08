<?php
session_start();

if($_SESSION==0)
{
    header('location:index.php');
}

if(!isset($_SESSION['cat']))
{
    header('location:index.php');
    // If session is not set then direct to index.php...
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
    //include "partial/_loggedinnavbar.php"
    ?>
    <!--Slider starts here-->
    <div class="mb-3">
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active " data-interval="10000">
                    <img src="https://source.unsplash.com/2500x800/?apple,coding" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-interval="5000">
                    <img src="https://source.unsplash.com/2500x800/?coding,java" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-interval="5000">
                    <img src="https://source.unsplash.com/2500x800/?coding,javascript" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    </div>
    <!--Slider ends here-->
    <div class="container-fluid text-center my-4">
        <hr>
        <h2>DDU Discuss categories</h2>
        <hr>
    </div>
    <div class="row">
        <?php
      $sql="SELECT * FROM `categories`";
      $result=mysqli_query($conn,$sql);
      if($result)
      {
        while($row=mysqli_fetch_assoc($result))
        {
          //echo "Category_id".$row['category_id'];
         echo '<div class="col-md-4">
         <div class="container my-4">
             <div class="container" height=500px width=300px>
                 <div class="card" style="width: 18rem;">
                     <img src="https://source.unsplash.com/500x400/?coding,'.$row['category'].'
" class="card-img-top" alt="...">
                     <div class="card-body">
                         <h5 class="card-title">'.$row['category'].'</h5>
                         <p class="card-text">'.$row['description'].'</p>
                         <a href="listthreads.php?cat_id='.$row['category_id'].'" class="btn btn-success">View Discussions</a>
                     </div>
                 </div>
             </div>
         </div>
     </div>';
        }
      }
      else
      {
        echo "Query FAiled";
      }
      ?>

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
