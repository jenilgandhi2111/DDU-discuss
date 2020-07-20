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
$usnm=$_SESSION['username'];
    if(isset($_POST['submit']))
    {
        $report="none";
        $file=$_FILES['file'];
        // echo "hihihihihih";
        $fileName=$_FILES['file']['name'];
        $fileTmpName=$_FILES['file']['tmp_name'];
        $fileSize=$_FILES['file']['size'];
        $fileError=$_FILES['file']['error'];
        $fileType=$_FILES['file']['type'];
    
        $fileExt=explode('.',$fileName);
        $fileActualExt=strtolower(end($fileExt));

        $allowed=array('jpg','jpeg','png','jfif');

        if(in_array($fileActualExt,$allowed))
        {
            if($fileError==0)
            {
                if($fileSize<4000000 & $fileSize>=1000)
                {
                    $fileNameNew=$usnm;
                    $fileNameNew=$fileNameNew.'.'.$fileActualExt;
                    $fileDestination='uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName,$fileDestination);
                    $report= 'Success';
                    echo $fileDestination;
                    $uid=$_SESSION['uid'];
                    $sql="UPDATE `users` SET `photo` = '".$fileDestination."' WHERE `users`.`user_id` = $uid";
                    echo $sql;
                    $res=mysqli_query($conn,$sql);
                    echo var_dump($res);
                }
                else
                {
                    $report= 'file too big';
                }
            }
            else
            {
                $report= 'error uploading file';
            }

        }
        else
        {
            $report= 'Invalid file type';
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

    <title>Upload_photo</title>
</head>

<body>
    <?php
    include "partial/_header.php";
  ?>
    <?php
    // echo $report;
        if($report=="Invalid file type")
        {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Invalid File type</strong> Check again and upload
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
        else if($report=="error uploading file")
        {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Oops there was error uploading files</strong> We will fix it up soon 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
        else if($report=="file too big")
        {
            
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Too big file size</strong> upload a smaller one 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
        else if($report=="Success")
        {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Oops there was error uploading files</strong> We will fix it up soon 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
          header("location:profile.php");
            
        }
    
    ?>
    <?php

    include "partial/_dbconnect.php";
    
    
    ?>
    <form action="upload_photo.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file">
        <button type="submit" name="submit" class="btn btn-outline-success">Upload</button>
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