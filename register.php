<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

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

    #dropdown a {
        transition: background-color 0.2s;
    }
</style>

<body class="bg-yellow-50 sm:background-size:contain">
    <div>
        <nav id="navbar"
            class="w-full p-4 text-sky-50 items-center sm:h-20 sm:flex sm:items-center sm:justify-between fixed top-0 left-0 z-50">
            <div class="flex justify-between items-center">
                <ion-icon name="happy-outline" class="small-icon mr-2"></ion-icon>
                <span class="text-xl cursor-pointer font-semibold">
                    TitipinAja.com
                </span>
                <span class="text-3xl cursor-pointer sm:hidden block mx-2">
                    <ion-icon name="menu" onclick="menu(this)"></ion-icon>
                </span>
            </div>

            <ul id="slide"
                class="bg-red-800 sm:flex sm:items-center z-50 sm:z-auto sm:static absolute w-full left-0 sm:w-auto sm:py-0 py-4 sm:pl-0 pl-7 sm:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-500">
                <li class="mx-4 my-6 md:my-0"><a href="index.php"
                        class="font-medium hover:text-orange-200 duration-500 ">Home</a></li>
                <li class="mx-4 my-6 md:my-0"><a href="viewItems.php"
                        class="font-medium hover:text-orange-200  duration-500">Products</a></li>
                <li class="mx-4 my-6 md:my-0 md:hidden"><a href="login.php"
                        class="font-medium hover:text-orange-200  duration-500">Login</a></li>
                <li class="mx-4 my-6 md:my-0 md:hidden"><a href="register.php"
                        class="font-medium hover:text-orange-200  duration-500">Register</a></li>
                <li class="mx-4 my-6 md:my-0 relative">
                    <img src="path/to/profile-pic.jpg" alt="Profile"
                        class="w-10 h-10 hidden md:block rounded-full cursor-pointer" onclick="toggleDropdown()">
                    <div id="dropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-20 hidden">
                        <a href="login.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Login</a>
                        <a href="register.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Register</a>
                    </div>
                </li>
            </ul>
        </nav>

        <?php if (isset($_GET['failed'])) { ?>
            <h2>REGISTER FAILED - DUPLICATE USERNAME</h2>
        <?php } ?>

        <div
            class="bg-[#FBEBA1] p-6 mt-28 mb-10 rounded-lg shadow-md w-[90%] md:w-[40%] mx-auto text-center flex flex-col">
            <h1 class="text-">Welcome!</h1>
            <h4>Register account</h4>
            <div>
                <form class="flex flex-col justify-start items-start mt-4" method="POST" action="registerBehind.php">
                    Username<input type="text" name="username"
                        class="w-full outline outline-offset-1 rounded-lg mb-4 pl-2 pb-1 pt-1">
                    Email<input type="email" name="email"
                        class="w-full outline outline-offset-1 rounded-lg mb-4 pl-2 pb-1 pt-1">
                    Password<input type="password" name="password"
                        class="w-full outline outline-offset-1 rounded-lg mb-4 pl-2 pb-1 pt-1">
                    Phone Number<input type="number" name="telephone_num" id="telephone_num" placeholder="123-456-7890"
                        required class="w-full outline outline-offset-1 rounded-lg mb-4 pl-2 pb-1 pt-1">
                    Address<input type="text" name="address"
                        class="w-full outline outline-offset-1 rounded-lg pl-2 pb-1 pt-1">

                    <a href="login.php" class="text-sm text-left text-blue-500 w-full mt-4 hover:underline">Sign in</a>
                    <div id="button"
                        class="flex justify-center items-center w-4/5 mx-auto rounded-lg mt-4 py-1 transition-transform duration-300 ease-in-out hover:scale-110 hover:bg-blue-700">
                        <button type="submit" name="submit"
                            class="w-full text-center text-white bg-[#4C62B7] rounded-lg py-2 hover:bg-blue-700">Register</button>
                    </div>
                </form>
            </div>
        </div>

        <footer
            class="pt-8 pb-8 bg-[#4C62B7] text-sky-50 font-thin flex flex-col md:flex-row justify-center items-center r">
            <div class="w-full md:w-1/2 flex flex-col justify-center items-center mb-4 md:mb-0">
                <h3 class="font-bold text-lg mb-2">Navigation</h3>
                <div class="font-normal space-y-1 text-center text-center md:text-left">
                    <div><a href="index.php" class="font-normal text-sm hover:underline">Home</a></div>
                    <div><a href="viewItems.php" class="font-normal text-sm hover:underline">Products</a></div>
                </div>
            </div>
            <div class="w-full md:w-1/2 flex flex-col items-center md:items-start mb-4 md:mb-0">
                <h3 class="font-bold text-lg mb-2">Contact</h3>
                <div class="font-normal space-y-1 text-center md:text-left">
                    <div>
                        <p class="text-sm">Address: Ciputra Univeristy, Surabaya</p>
                        <p class="text-sm">Phone: 081-34869995</p>
                        <p class="text-sm">Email: info@titipinaja.com</p>
                    </div>
                </div>
            </div>
            <div class="w-full flex justify-center">
                <h6 class="font-normal text-xs mt-3 text-center">© 2024 TitipinAja.com. All Rights Reserved.</h6>
            </div>
        </footer>

    </div>

    <script>
        function menu(e) {
            let list = document.querySelector('ul');

            e.name === 'menu' ? (e.name = "close", list.classList.add('top-[80px]'), list.classList.add('opacity-100')) : (e.name = "menu", list.classList.remove('top-[80px]'), list.classList.remove('opacity-100'))
        }

        function toggleDropdown() {
            let dropdown = document.getElementById('dropdown');
            dropdown.classList.toggle('hidden');
        }

        //tutup dropdown
        document.addEventListener('click', function (event) {
            let dropdown = document.getElementById('dropdown');
            let profilePic = dropdown.previousElementSibling;
            if (!dropdown.contains(event.target) && !profilePic.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
</body>



</html>