<!-- isi php profile -->
<?php 
session_start();
include("controller.php");
// $_SESSION['user'] = getUser($_SESSION['user']['user_id'])->fetch_assoc()->$row;
$user_id = $_SESSION['user']["customer_id"];
$username = $_SESSION['user'] ['username'];
$password = $_SESSION['user'] ['password'];
$telephone_num = $_SESSION['user'] ['phone-input'];
$email = $_SESSION['user'] ['email'];
$address = $_SESSION['user'] ['address'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="editProfileBehind.php">
        <input type="hidden" value="$user_id" name="user_id">
        Username: <input type="text" value="<?= $username?>" name="username"><br>
        Email: <input type="text" value="<?= $email?>" name="email" placeholder="example@gmail.com"><br>
        Password: <input type="password" value="<?= $password?>" name="password">
        Phone number:<input type="text" value="<?= $telephone_num?>" name="phone-input" id="phone-input" aria-describedby="helper-text-explanation" class="" pattern="[0-9]{12}" placeholder="123-456-7890" required /><br>
        Address: <input type="text" value="<?= $address?>" name="address">
        <input type="submit" name="ok">
    </form>
</body>
</html>