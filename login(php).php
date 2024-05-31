<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if (isset($_GET['signedIn'])) { ?>
        <h2>sign in to access this feature</h2>
    <?php } ?>
    <?php if (isset($_SESSION['user'])) {
        header("Location: index.php");
    } ?>
    <form method="POST" action="loginBehind.php">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" name="submit">
    </form>
</body>

</html>