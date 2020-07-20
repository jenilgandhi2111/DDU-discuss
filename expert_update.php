<?php
include "partial/_dbconnect.php";
session_start();
$cid=$_SESSION['uid'];
?>


<?php
error_reporting(0);
$email=$_POST['email'];
$cmail=$_POST['c-email'];

$sql="SELECT * FROM `users` WHERE user_id='$cid'";
$result1=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result1))
{
    $intital_skills=$row['expert_in'];
}
//echo $intital_skills;
if($email==$cmail&&($email!=""&&$cmail!=""))
{
    $changed=$cmail.",".$intital_skills;
   
    $sql="UPDATE `users` SET `expert_in` = '$changed' WHERE `users`.`user_id` ='$cid' ";
    echo $sql;
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        echo "success";
        header('location:profile.php');

    }
    else
    {
        echo "OOPS";
    }
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

    <title>Expert-in</title>
</head>

<body>
    <?php
    include "partial/_header.php";
    ?>
    <div class="container mt-3">
        <h1>Update your Skills</h1>
    </div>
    <hr>
    <div class="container mt-3">
        <h4>Type your skills seperated by a comma</h4>
    </div>
    <div class="container mt-4">
        <form method="post" action="expert_update.php">
            <div class="form-group">
                <label for="exampleInputEmail1">New-skills</label>
                <input type="text" class="form-control" name="email" id="exampleInputEmail1"
                    aria-describedby="emailHelp">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Confirm New skills</label>
                <input type="text" name="c-email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">

            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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