<?php
include('controller.php');
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$result = loginUser($username, $password);

if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['user'] = $row;
    // if ($row['admin'] == 1) {
    //     header("Location: admin.php");
    // } else {
    //     header("Location: index.php");
    // }
    header("Location: index.php");
}else{
    header("Location: login.php?notFound=1");
}
