<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

if(isset($_POST['save'])){
    include "config.php";
   $fname=mysqli_real_escape_string($conn,$_POST['fname']);
  //  echo $fname;
   $lname=mysqli_real_escape_string($conn,$_POST['lname']);
  //  echo $lname;
   $user=mysqli_real_escape_string($conn,$_POST['user']);
  //  echo $user;
   $password=mysqli_real_escape_string($conn,md5($_POST['password']));
  //  echo $password;
   $role=mysqli_real_escape_string($conn,$_POST['role']);
    // echo  $role;

    $SQL="SELECT username from user WHERE username='{$user}'";

   
    $result1=mysqli_query($conn, $SQL);
    $row=mysqli_fetch_assoc($result1);
  
   if(mysqli_num_rows($result1)>0){
    // echo "";
    echo '<script type ="text/JavaScript">';  
    echo 'alert("User aleady exist")';  
    echo '</script>';
    header("Location:{$hostname}/admin/add-user.php");
  
    
   
 
   }
   else{
    $SQL1= "INSERT INTO user (first_name, last_name, username, password, role) VALUES ('{$fname}','{$lname}','{$user}','{$password}','{$role}')";
    echo $SQL1;
 
 
    if(mysqli_query($conn, $SQL1)){
      header("Location:{$hostname}/admin/users.php");
    }
    
  }

   }




?>