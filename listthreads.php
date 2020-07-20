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
<?php
$catid=$_GET['cat_id'];
$sql="SELECT * FROM `categories` WHERE category_id='$catid'
";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result))
{
  $catname=$row['category'];
  $desc=$row['description'];
  
}

?>
<?php
error_reporting(0);

$current_title=$_POST['current_title'];
$current_desc=$_POST['current_desc'];
$user_id=$_SESSION['uid'];
$code=$_POST['code'];
$code=str_replace("<pre>","",$code);
$code=str_replace("</pre>","",$code);
$code=str_replace("<","&lt;",$code);
$code=str_replace(">","&gt;",$code);
// echo "<pre><code>".$code."</code><pre>";
// echo "</pre>";

$id_current_user=$_SESSION['uid'];

if($current_desc!=""&&$current_title!="")
{


$sql="INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`,`code`) VALUES (NULL, '$current_title', '$current_desc', '$catid', '$user_id', current_timestamp(),'$code')";
$result=mysqli_query($conn,$sql);

}


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



    <title>DDU Discuss <?php echo $catname ;?>forums</title>

</head>

<body>
    <?php
    include "partial/_header.php";
    ?>







    <div class="jumbotron">
        <h1 class="display-4"><?php echo$catname;?> Discussion Forums</h1>
        <p class="lead"><?php echo$desc?> </p>
        <hr class="my-4">
        <p>These are the special forums for the students of Dharamsinh Desai University.Kindly use it for only
            discussions and rules are as listed below</p>
        <a class="btn btn-dark btn-lg" href="rules.php" role="button">RULES</a>
    </div>

    <br>
    <hr>

    <div class="container">
        <h3>Start a Discussion</h3>
        <?php echo'
<form method="post" action="listthreads.php?cat_id='.$catid.'">
  <div class="form-group">
    <label for="exampleInputEmail1" class="display-4"  style="font-size:20px">Question Title</label>
    <input type="text" name="current_title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">Keep the title as short as possible</small>
  </div>
  <div class="form-group display-4" style="font-size:20px">
  <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active text-success" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" >Description</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link text-success" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" >Code</a>
  </li>
  
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="height: 200px;" name="current_desc"></textarea></div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"><textarea class="form-control" name="code" id="exampleFormControlTextarea1" rows="3" style="height: 402px;"></textarea></div>
  
</div>
  </div>
  
  <button type="submit" class="btn btn-success">Submit</button>
</form>';?>
        <br>

    </div>
    <hr>
    <div class="container mt-4">

        <h1>Browse Questions</h1>
    </div>
    <hr>
    <div class="container">
        <?php

$sql="SELECT * FROM `threads` WHERE thread_cat_id=$catid ORDER BY timestamp DESC
";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);

for($i=0;$i<$num;$i=$i+1)
{
while($row=mysqli_fetch_assoc($result))
{
$title=$row['thread_title'];
$desc=$row['thread_desc'];
$thread_id=$row['thread_id'];
$usercid=$row['thread_user_id'];
$timestamp=$row['timestamp'];
$result12=mysqli_query( $conn,"SELECT * FROM `users` WHERE user_id='$usercid'");
    while($row1=mysqli_fetch_assoc($result12))
    {
        $cusnm=$row1['name'];
    }
echo'
<div class="media">
  <img src="partial/userdefault.png" width=64px height=64px class="mr-3" alt="...">
  <div class="media-body">
    <h5 class="mt-0"><a class="text-dark" href="threads.php?thread_id='.$thread_id.'">'.$title.'</a>-Asked By-<a class="text-success" style="font-size:20px" href="user.php?user_id='.$usercid.'">'.$cusnm.'</a></h5>'.$desc.'
    
  </div>
</div><br>';

}
}

if($num==0)
{
    echo '<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">No questions found</h1>
      <p class="lead">Be the first one to start a discussion</p>
    </div>
  </div>';
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