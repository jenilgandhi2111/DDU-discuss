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
$id=$_GET['thread_id'];
$yids=$id;
//echo $yids;
$sql="SELECT * FROM `threads` WHERE thread_id=$id
";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
while($row=mysqli_fetch_assoc($result))
{
 // echo"INNNN";
  $title=$row['thread_title'];
  $desc=$row['thread_desc'];
  $uid=$row['thread_user_id'];
  $timestamp=$row['timestamp'];
}
/*
echo $title;
echo $desc;
echo $uid;
*/
?>



<?php
error_reporting(0);
$thread_id_post=$yids;
$user_id_post=$_SESSION['uid'];
$answer=$_POST['answer'];
//echo $thread_id_post;
//echo $user_id_post;
//echo $answer;
if($answer!="")
{
$sql="INSERT INTO `discussion_threads` (`sr.no`, `user_id`, `answer`, `thread_id`, `date_added`) VALUES (NULL,'$user_id_post', '$answer', '$thread_id_post', current_timestamp());";
$result1234=mysqli_query($conn,$sql);
//echo var_dump($result);
if($result1234)
{
    //echo "success";
}
else
{
    //echo "oops";
}

}

?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/aa880fb50f.js" crossorigin="anonymous"></script>

    <title></title>

</head>

<body>
    <?php
    include "partial/_header.php";
    ?>







    <div class="jumbotron container">

        <h1 class="display-3"><?php echo$title;?></h1>
        <hr>

        <p class="lead"><?php echo$desc?> </p>
        <hr class="my-4">
        <p>Asked By <?php 
  $usnm=$_SESSION['username'];
  
  echo $usnm;  ?></p>
        <?php
  
  echo 'Asked At-'.$timestamp;
  ?>
        <br>
        <br>
        <a class="btn btn-dark btn-lg" href="rules.php" role="button">RULES</a>
    </div>


<hr>
<div class="container">
    <h4>Join This discussion by answering below</h4>
</div>

<hr>

    <br>
    <div class="container">
        <?php

        $ids=$_GET['thread_id'];
        ?>
        <form method="post" action="threads.php?thread_id=<?php 
        echo $ids;?>
        ">
        <div class="form-group">
    <label for="exampleFormControlTextarea1" class="display-3" style="font-size:25px">Answer Below</label>
    <textarea class="form-control" name="answer" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
      

    </div>  
    <hr>
    <div class="container">
        <h1>View Discussions</h1>
    </div>
    <hr>
    <div class="container my-3">
    <?php

    $sql="SELECT * FROM `discussion_threads` WHERE thread_id='$yids' ORDER BY date_added DESC";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);

    while($row=mysqli_fetch_assoc($result))
    {

        $answer_fetched=$row['answer'];
        $user_id_fetched=$row['user_id'];
       // echo $user_id_fetched;

        $sql1="SELECT * FROM `users` WHERE user_id='$user_id_fetched'";
        $res=mysqli_query($conn,$sql);
        //echo var_dump($res);
       
       $row1=mysqli_fetch_assoc(mysqli_query($conn,$sql1));
       $un=$row1['name'];

       // echo $un;


    echo '<div class="media" >
    <img src="partial/userdefault.png"  style="width:64px;height:64px" class="mr-3" alt="...">
    <div class="media-body">
      <h5 class="mt-0"><a class="text-success" href="user.php?user_id='.$user_id_fetched.'">'.$un.'</a>-Answered at-2020-08-15</h5>
      '.$answer_fetched.'
    </div>
  </div>';

    }

    if($num==0)
    {
        echo '<div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">No discussion has stared</h1>
          <p class="lead">Be the first one to help your fellowmates</p>
        </div>
      </div>';
    }
    ?>
    </div>
    
        <?php
include 'partial/_footer.php';
?>








