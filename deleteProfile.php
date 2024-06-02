<?php
session_start();
include("controller.php");

deleteUser($_SESSION['user']['customer_id']);
session_unset();
header('Location: login.php');
?>