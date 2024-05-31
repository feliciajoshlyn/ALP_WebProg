<?php
session_start();
include("controller.php");

deleteUser($_SESSION['user']['customer_id']);
header('Location: profile.php');
?>