<?php 
session_start();
include("controller.php");

confirmItem($_SESSION['user']['customer_id']);
header("Location: confirmedItems.php")
?>