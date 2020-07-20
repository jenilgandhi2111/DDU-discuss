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





<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>About us</title>

</head>

<body>
    <?php
      include "partial/_header.php"
      ?>

    <div class="container my-4">
        <h1>About Me</h1>
        <hr>
        <p class="display-3" style="font-size:30px">Hey guys I am Jenil Gandhi.I created this forum to promote the
            community contribution by the students of DDU. This would provide a platform to all of them who would like
            to improve their profile.<br></p>
        <p class="display-3" style="font-size:30px">The main motto behind developing this forum is just that it would
            help the students of DDU to ask questions in a wide community so that someone out of them might help them
            out.Also you could help others grow up . As we know the Alumni of DDU is widespread over the world I would
            also encourage them to join the forum</p>
        <p class="display-3" style="font-size:30px">I hope a great response from all of you and obviously this forum is
            nothing without its users so do contribuite and grow well.</p>
        <br>

        <p class="display-3" style="font-size:20px">Thanking You,</p>
        <p class="display-3" style="font-size:20px">Jenil J Gandhi</p>
        <br>
        <hr>
    </div>

    <br><br><br><br><br><br><br><br>


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