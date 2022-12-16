<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include 'config.php';
include "config.php";

if(!isset($_SESSION['user_id'])){
    header("Location:{$hostname}/admin/index.php");
}

session_start();  
session_unset();
session_destroy();

header("Location:{$hostname}/admin/index.php");
?>