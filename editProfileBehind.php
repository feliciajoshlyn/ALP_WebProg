<?php
session_start();
include("controller.php");
$user_id = $_POST["user_id"];
$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$telephone_num = $_POST["telephone_num"];
$address = $_POST["address"];

if ($username == getUser($username)) {
    header("Location: editProfile.php?sameUsername=1");
} else {

    $_SESSION['user']['customer_id'] = $user_id;
    $_SESSION['user']['username'] = $username;
    $_SESSION['user']['password'] = $password;
    $_SESSION['user']['email'] = $email;
    $_SESSION['user']['telephone_num'] = $telephone_num;
    $_SESSION['user']['address'] = $address;

    updateUser($user_id, $username, $password, $telephone_num, $email, $address);

    header("Location: profile.php");
}

?>
