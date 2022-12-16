<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include "config.php";
session_start();
if(!isset($_SESSION['user_id'])){

  header("Location:{$hostname}/admin/index.php");
}

$userid=$_GET['id'];

$sql="DELETE FROM user where user_id={$userid}";

if(mysqli_query($conn,$sql)){
  header("Location:{$hostname}/admin/users.php");
}else{
  echo "<pstyle='color:red;margin: 10px 0;'>can not delete user record</p>";
}

mysqli_close($conn);

?>






