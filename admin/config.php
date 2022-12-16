<?php

  $hostname="http://localhost:8080/learnPHP/project/news_site";
  $conn=mysqli_connect("localhost","root","","news_site") or die("conaection faild:". mysqli_connect_error());

session_start();
if(!isset($_SESSION['user_id'])){
    header("Location:{$hostname}/admin/index.php");
}

?>
