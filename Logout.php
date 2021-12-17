<?php
session_start();
   $connect=mysqli_connect("localhost","root","","Foodspacial");
session_destroy();
header('location:Home.php');
?>