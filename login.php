<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>Login</title>
</head>

<style>
    body {
        font-family: 'poppins';
    }

    #navbar {
        background-color: #4C62B7;
    }

    #slide,
    #button {
        background-color: #4C62B7;
    }

    .small-icon {
        font-size: 22px;
        color: white;
    }
</style>

<body class="bg-yellow-50 sm:background-size:contain">
    <?php if (isset($_GET['signedIn'])) { ?>
        <h2>sign in to access this feature</h2>
    <?php } ?>
    <?php if (isset($_SESSION['user'])) {
        header("Location: index.php");
    } ?>
    <div>
        <nav id="navbar" class="w-full p-4 text-sky-50 items-center sm:h-20 sm:flex sm:items-center sm:justify-between">
            <div class="flex justify-between items-center">
                <ion-icon name="happy-outline" class="small-icon mr-2"></ion-icon>
                <span class="text-xl cursor-pointer font-semibold">
                    TitipinAja.com
                </span>
                <span class="text-3xl cursor-pointer sm:hidden block mx-2">
                    <ion-icon name="menu" onclick="menu(this)"></ion-icon>
                </span>
            </div>

            <ul id="slide" class="bg-red-800 sm:flex sm:items-center z-50 sm:z-auto sm:static absolute w-full left-0 sm:w-auto sm:py-0 py-4 sm:pl-0 pl-7 sm:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-500">
                <li class="mx-4 my-6 md:my-0"><a href="index.php" class="font-medium hover: text-orange-50 duration-500">Home</a></li>
                <li class="mx-4 my-6 md:my-0"><a href="viewItems.php" class="font-medium hover: text-orange-50  duration-500">Product</a></li>
                <li class="mx-4 my-6 md:my-0"><a href="profile.php" class="font-medium hover: text-orange-50  duration-500">Profile</a></li>
            </ul>
        </nav>

        <div class="bg-[#FBEBA1] p-6 mt-20 rounded-lg shadow-md w-60 md:w-72 mx-auto text-center flex flex-col">
            <h1 class="text-">Welcome!</h1>
            <h4>Login into your account to continue</h4>
            <div>
                <form class="flex flex-col justify-start items-start mt-4" method="POST" action="loginBehind.php">
                    Username<input type="text" name="username" class="w-full outline outline-offset-1 rounded-lg mb-4">
                    Password<input type="password" name="password" class="w-full outline outline-offset-1 rounded-lg">
                    <a href="#" class="text-sm text-left text-blue-500 w-full mt-4">Forget Password?</a>
                    <a href="register.php" class="text-sm text-left text-blue-500 w-full mt-4">Register</a>
                    <div id="button" class="flex justify-center items-center w-4/5 mx-auto rounded-lg mt-4 py-1"><button type="submit" name="submit" class="text-center text-white">Login</button></div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function menu(e) {
            let list = document.querySelector('ul');

            e.name === 'menu' ? (e.name = "close", list.classList.add('top-[80px]'), list.classList.add('opacity-100')) : (e.name = "menu", list.classList.remove('top-[80px]'), list.classList.remove('opacity-100'))
        }
    </script>
</body>



</html>