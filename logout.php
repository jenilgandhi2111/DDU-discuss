<?php
// this is the code for logout in DDU Discuss website
session_start();
session_unset();
session_destroy();

header('location:index.php');
//this script has some issues like donot show that you have successfully logged out
/* Created or identified by testing
/*
?>
