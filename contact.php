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
ob_flush();
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
    <title>Contact Us</title>
</head>

<body>
    <?php
      include "partial/_header.php"; 
    // This is the template for header...
      
      ?>


    </div>
    <?php
$i=0;
error_reporting(0);
//$cntr=0;
   // if($i>0)
    //{
        $name="";
        $email="";
        $title="";
        $desc="";

$name=$_POST['name'];
$email=$_POST['email'];
$title=$_POST['title'];
$desc=$_POST['description'];
if($name!="")
{

$sql="INSERT INTO `queries` (`Srno`, `name`, `email`, `title`, `description`, `Date-added`) VALUES (NULL, '$name', '$email', '$title', '$desc', current_timestamp())";
$result=mysqli_query($conn,$sql);
    //}
    //else
    //{
        $i=$i+1;
    //}
    if($result)
    {
       $i=0;
    }
    else
    {
        $i=1;
    }



    
      if($i==0)
      {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Good your Query has been submitted</strong> We will get back to you via your email address
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      }
      if($i==0 && ($name=""||$email==""||$title==""))
      {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>You can\'t leave feilds empty</strong> Fill them to submit your query
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
      }
ob_flush();
    }   
    

?>
    <div class="container mt-4">
        <h1>Contact Us</h1>
        <p>If you have a question or a comment or you want a category in the discussion, email us at
            confusedjogger01@gmail.com or use the form below to contact us.Please feel free to contact </p>
        <hr>

        <div class="container my-4">
            <form action="contact.php" method="post">

                <div class="form-group row">
                    <label for="Name" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="inputPassword">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="E-mail" class="col-sm-2 col-form-label">E-Mail</label>
                    <div class="col-sm-10">
                        <input type="e-mail" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Query Title" class="col-sm-2 col-form-label" na,e="title">Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" id="title" name="title">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea class="form-control" name="description" style=" height:311px "
                        id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="container">
                    <button class="btn btn-success  float-right" type="submit">Submit your query</button>
                </div>
            </form>



        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br><br><br>
        <br>
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
