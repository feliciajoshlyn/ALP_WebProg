<?php
session_start();
include ("controller.php");
$user_id = $_POST["customer_id"];
$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$telnum = $_POST["phone-input"];
$address = $_POST["address"];

$_SESSION['user']['user_id'] = $user_id;
$_SESSION['user']['username'] = $username;
$_SESSION['user']['password'] = $password;
$_SESSION['user']['email'] = $email;
$_SESSION['user']['phone-input'] = $telnum;
$_SESSION['user']['address'] = $address;

updateUser($user_id, $username, $password, $telnum, $email, $address);

header("Location: profile.php");

?>