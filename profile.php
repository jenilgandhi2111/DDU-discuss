<?php
include "partial/_dbconnect.php";
session_start();
$id=$_SESSION['uid'];
$sql="SELECT * FROM `users` WHERE user_id=$id";
$result=mysqli_query($conn,$sql);
if($result)
{
    
    while($row=mysqli_fetch_assoc($result))
    {
        $institution=$row['Institution'];
        $conatct_info=$row['contact_info'];
        $role=$row['role'];
        $type=$row['type'];
        $name=$row['name'];
        $expert=$row['expert_in'];
        $answers=$row['Answered'];
        $fpath=$row['photo'];
    }
$sql1="SELECT * FROM `discussion_threads` WHERE user_id='$id'";
$res=mysqli_query($conn,$sql1);
$answers=mysqli_num_rows($res);
//echo $answers;









   // echo $expert;
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

    <title>Your Profile</title>
    <style>
    .rounded {

        padding-left: 10px;
        padding-right: 300px;
        padding-bottom: 10px;


    }

    .rounded img {
        border-radius: 50%;
        text-align: left;
        box-shadow: 5px 1px 5px;

    }

    img {
        display: block;
        margin-left: 500px;
    }
    </style>
</head>

<body>
    <?php
      include "partial/_header.php"
      ?>

    <div class="my-4">
        <div class="rounded ">
            <div class="target">
                <?php
            if($fpath=="no")
            {
                echo'<img src="partial/userdefault.png" height="250" width="250"></img></div>';
            }
            else
            {
                echo '<img src="'.$fpath.'" height="250" width="250"></img></div>';
            }
            ?>
            </div>
            <br>
            <div class="container display-3" style="  font-size:40px; text-align:center;padding-left:50px">

                <b><?php echo $name?></b>
                <div style="float:right" class="text-success"><a href="upload_photo.php">
                        <i class="fa fa-plus text-success" aria-hidden="true"></i></a>
                </div>
            </div>
            <hr>
            <div class="container display-4" style="font-size: 30px;">

                <label style="padding:30px"><b>Institution:</b></label>
                <span style="padding:20px"><?php echo $institution;?></span>
                <div style="float:right"><a href="update.php?update=institute" class="text-success">
                        <i class="fa fa-pencil" aria-hidden="true"></i>

                    </a>
                </div>
                <br>
                <hr>
                <label style="padding:30px"><b>Role:</b></label>
                <span style="padding:93px"><?php echo $role;?></span>
                <br>
                <hr>
                <label style="padding:30px"><b>Type:</b></label>
                <span style="padding:87px">

                    <?php
          if($answers>=0 && $answers<10)
          {  
                 echo 'Rookie-Answer more questions to earn Stars';
          }
          else if($answers>=10 && $answers<50)
          {
              echo'Beginer <i class="fa fa-star-o" style="padding-left:4px" aria-hidden="true"></i>
              ';
          }
          else if($answers>=50 && $answers<100)
          {
              echo 'Intermediate<i class="fa fa-star-o" style="padding-left:4px" aria-hidden="true"></i>
              
              <i class="fa fa-star-o" aria-hidden="true"></i>
              
              ';
          }
          else if($answers>=100 && $answers<175)
          {
              echo 'Master<i class="fa fa-star-o" style="padding-left:4px" aria-hidden="true"></i>
              
              <i class="fa fa-star-o" aria-hidden="true"></i>
              <i class="fa fa-star-o" aria-hidden="true"></i>';
          }
          else if($answers>=175 && $answers<250)
          {
              echo 'Advanced<i class="fa fa-star-o" style="padding-left:4px" aria-hidden="true"></i>
              
              <i class="fa fa-star-o" aria-hidden="true"></i>
              <i class="fa fa-star-o" aria-hidden="true"></i>
              <i class="fa fa-star-o" aria-hidden="true"></i>';
          }
          else
          {
              echo'Instructor<i class="fa fa-star-o" style="padding-left:4px" aria-hidden="true"></i>
              
              <i class="fa fa-star-o" aria-hidden="true"></i>
              <i class="fa fa-star-o" aria-hidden="true"></i>
              <i class="fa fa-star-o" aria-hidden="true"></i>
              <i class="fa fa-star-o" aria-hidden="true"></i>';
          }
?>

                </span>
                <br>
                <hr>
                <label style="padding:30px"><b>Expert In</b></label>
                <span style="padding:36px"><?php echo $expert;?>
                    <div style="float:right"><a href="update.php?update=expert" class="text-success">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </div>
                    <br>
                    <hr>
                    <label style="padding:30px"><b>Answered</b></label>
                    <span style="padding:22px">More than <?php echo $answers;?> questions
                    </span>
                    <br>
                    <hr>
                    <label style="padding:30px"><b>Conatct-info</b></label>
                    <span style="padding:-2px"><?php echo $conatct_info;?>
                    </span>
                    <div style="float:right"><a href="update.php?update=email" class="text-success">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </div>

                    <hr>
                    <label style="padding:30px"><b>Projects</b></label>

                    <div style="float:right"><a href="update.php?update=project" class="text-success">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </a>
                    </div>
                    <br>
                    <ul style="padding-left:100px">
                        <?php 
               $sql="SELECT * FROM `projects` WHERE user_id='$id'";
               $result=mysqli_query($conn,$sql);
               $num=mysqli_num_rows($result);
               if($num!=0)
               {
              while($row=mysqli_fetch_assoc($result))
               {
               
              
               
               
               
               
               echo '<li><h4>'.$row['project_title'].'</h4>
            <br>
            <p style="font-size:25px">
                '.$row['description'].'

            <br>
<p style="font-size:20px">See Project At:  <a class="text-success" target="_blank" href="'.$row['link'].'">'.$row['link'].'</a></p>
 
        </li>';
        
               }
    
    }
        
        else
        {
            echo "NO PROJECTS ADDED";
        }
        
        
        ?>
                    </ul>
                    <br>
                    <hr>



                    </ul>
            </div>


            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br><br><br><br><br><br><br><br><br><br><br><br>
        </div>
















        <?php
      include "partial/_footer.php"
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