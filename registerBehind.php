<?php
include('controller.php');
$username = $_POST['username'];
$password = $_POST['password'];
$phone = $_POST['telephone_num'];
$email = $_POST['email'];
$address = $_POST['address'];


saveUser($username, $password, $phone, $email, $address);
header('location:login.php');
?>