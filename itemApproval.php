<?php
session_start();
include('controller.php');

approveItem($_GET['request_id']);
$user_id = $_GET['user_id'];

header("Location: confirmedItems.php?user_id=$user_id");
?>