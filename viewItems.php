<?php
session_start();
include ('controller.php');
?>
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
    <title>viewItems</title>
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

        .quantity-control {
            display: flex;
            align-items: center;
        }

        .minus-btn,
        .plus-btn {
            border: none;
            padding: 5px;
            cursor: pointer;
        }

        .quantity-input {
            width: 30px;
            text-align: center;
            border: 1px solid #ccc;
            padding: 5px;
        }

        .back-button {
            background-color: transparent;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            margin-bottom: 16px;
            font-size: 1.5rem;
        }

        .back-button:hover ion-icon {
            color: #3b4a8b;
        }
    </style>
</head>

<body class="bg-yellow-50 background-size:contain">
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
                        class="font-medium hover:text-orange-200  duration-500">Home</a></li>
                <li class="mx-4 my-6 md:my-0"><a href="viewItems.php"
                        class="font-medium hover:text-orange-200  duration-500">Products</a></li>

                <?php if (isset($_SESSION['user'])) {
                    if ($_SESSION['user']['admin'] == 0) {
                        ?>
                        <li class="mx-4 my-6 md:my-0 md:hidden"><a href="cart.php"
                                class="font-medium hover:text-orange-200  duration-500">View Cart</a></li>
                        <?php
                    } else {
                        ?>
                        <li class="mx-4 my-6 sm:my-0 sm:hidden"><a href="adminViewUser.php"
                                class="font-medium hover:text-orange-200  duration-500">View Users</a></li>
                        <?php
                    }
                    ?>
                    <li class="mx-4 my-6 sm:my-0 sm:hidden"><a href="profile.php"
                            class="font-medium hover:text-orange-200  duration-500">Profile</a></li>
                    <li class="mx-4 my-6 sm:my-0 sm:hidden"><a href="logout.php"
                            class="font-medium hover:text-orange-200  duration-500">Logout</a></li>
                    <li class="mx-4 my-6 sm:my-0 relative">
                        <img src="path/to/profile-pic.jpg" alt="Profile"
                            class="w-10 h-10 hidden md:block rounded-full cursor-pointer" onclick="toggleDropdown()">
                        <div id="dropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-20 hidden">
                            <?php
                            if ($_SESSION['user']['admin'] == 0) {
                                ?>
                                <a href="cart.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">View Cart</a>
                                <?php
                            } else {
                                ?>
                                <a href="adminViewUser.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">View
                                    Users</a>
                                <?php
                            }
                            ?>
                            <a href="profile.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Profile</a>
                            <a href="logout.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Logout</a>
                            <?php
                } else {
                    ?>
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

                            <?php

                } ?>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="flex flex-col items-center mt-16 md:mt-28 md:items-start md:w-full lg:w-full mx-auto p-4">
            <div class="flex items-center w-full justify-between text-center md:text-left">
                <div class="flex items-left">
                    <button class="back-button text-left md:hidden" onclick="history.back()">
                        <ion-icon name="arrow-back-outline"></ion-icon>
                    </button>
                </div>
                <div class="flex-grow">
                    <p class="text-3xl font-bold m-3 mb-4">View Items</p>
                </div>
            </div>

            <?php
            $conn = my_connectDB();

            $sql = "";
            if (isset($_GET['country'])) {
                $sql = "SELECT * FROM products WHERE country =" . $_GET['country'];
            } else {
                $sql = "SELECT * FROM products";
            }
            $result = mysqli_query($conn, $sql);

            //if admin
            
            if (isset($_SESSION['user'])) {
                if ($_SESSION['user']['admin'] == 1) {
                    ?>
                    <div class="text-right mb-4">
                        <a href="adminUpload.php" class="bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg">+ Add
                            Item</a>
                    </div>
                    <?php
                }
            }
            ?>
            <!-- div for product -->
            <div class="w-[90%] lg:w-[80%] mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <?php

                while ($data = $result->fetch_assoc()) {
                    ?>
                    <div class="bg-white bg-opacity-80 border rounded-lg p-2 md:p-4 shadow-lg mb-2">
                        <div class="grid m-5">
                            <p class="text-center font-bold mb-1 w-full overflow-hidden text-ellipsis whitespace-nowrap">
                                <?= $data['name'] ?>
                            </p>

                            <div style=" height:200px" class=" flex justify-center">
                                <img src="<?= $data['photo'] ?>" style="width:200px" class="mx-auto">
                            </div>

                            <div class="mt-5 ml-10 sm:ml-15 md:ml-5 lg:ml-2">
                                <p>Description: <?= $data['description'] ?></p>
                                <p>Price: <?= $data['price'] ?></p>
                                <p>Category: <?= $data['category'] ?></p>
                                <p>Country: <?= $data['country'] ?></p>
                                <a href="viewItemDetail.php?product_id=<?= $data['product_id'] ?>"
                                    class="text-xs text-blue-300 hover:underline ">View Details</a>
                            </div>

                        </div>
                    </div>
                    <?php
                }
                my_closeDB($conn);
                ?>
            </div>
        </div>
    </div>
    <footer class="pt-8 pb-8 bg-[#4C62B7] text-sky-50 font-thin flex flex-col md:flex-row justify-center items-center r">
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
</body>
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

</html>