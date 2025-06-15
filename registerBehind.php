<?php
include('controller.php');
// $_POST -> array to access form data sent via the POST method. holds key-value pairs for all the input fields submitted.
$username = $_POST['username'];
$password = $_POST['password'];
$phone = $_POST['telephone_num'];
$email = $_POST['email'];
$address = $_POST['address'];


saveUser($username, $password, $phone, $email, $address);
header('location:login.php');
?>