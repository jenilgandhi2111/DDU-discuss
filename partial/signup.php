<?php
if($_SERVER['REQUEST_METHOD']=="POST")
{
$username=$_POST['email'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
if($username="")
{
    echo"yesssssss";
}
else
{
    echo "NOOOOOOO";
}
}
else
{
    echo"kakassknaslkdnaskldn";
}
/*
Here this is the auxilary signup modal 
this one is proposed for the future if 
we would use the modal this is the code
*/
?>
