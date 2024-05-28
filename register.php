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
        Phone number:<input type="text" name="phone-input" id="phone-input" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" pattern="[0-9]{12}" placeholder="123-456-7890" required /><br>
        Address: <input type="text" name="address">
        <input type="submit" name="ok">
        </form>
</body>
</html>