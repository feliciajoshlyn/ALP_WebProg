<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <h1>Login Register</h1>
    <form method="POST" action="registerBehind.php">
        Username: <input type="text" name="username"><br>
        Email: <input type="text" name="email" placeholder="example@gmail.com"><br>
        Password: <input type="password" name="password">
        Phone number:<input type="text" name="phone-input" id="phone-input" aria-describedby="helper-text-explanation" class="" pattern="[0-9]{12}" placeholder="123-456-7890" required /><br>
        Address: <input type="text" name="address">
        <input type="submit" name="ok">
        </form>
</body>
</html>