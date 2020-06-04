<?php
include "partial/_dbconnect.php";
error_reporting(0);
session_start();
$id=$_SESSION['uid'];
$project_title=$_POST['title'];
$project_desc=$_POST['project'];
$project_link=$_POST['link'];
//echo $project_desc;
//echo $project_link;
//echo $project_title;






if($project_title!=""&&$project_desc!="")
{
    $sql="INSERT INTO `projects` (`Srno`, `user_id`, `project_title`, `description`, `link`, `date-added`) VALUES (NULL, '$id', '$project_title', '$project_desc', '$project_link', current_timestamp());";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
       // echo "success";
        header('location:profile.php');
    }
    else
    {
       // echo "oops";
    }
}



//echo "jenil";
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Insert your projects</title>
  </head>
  <body>
    
<?php
include "partial/_header.php"
?>
<div class="container mt-4">
    <div class="container my-3 display-3">
        <h3 class="display-3" style="font-size:50px">Add a project below</h3>
    </div>
<hr>


<form method="post" action="project.php">
  <div class="form-group display-4">
    <label for="form-group" style="font-size:20px">Project-Title</label>
    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group" class="form-group display-4">
    <label for="exampleFormControlTextarea1" style="font-size:20px">Project-Description</label>
    <textarea class="form-control" style="height:200px" id="exampleFormControlTextarea1" name="project" rows="3"></textarea>
  </div>
  <div class="form-group" class="form-group display-4" >
    <label for="exampleInputEmail1" style="font-size:20px">Project-link</label>
    <input type="text" class="form-control" name="link" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  <button type="submit" class="btn btn-success">Add-Project</button>
</form>
</div>

<br><br><br><br><br><br><br><br>
<?php
include "partial/_footer.php"
?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>