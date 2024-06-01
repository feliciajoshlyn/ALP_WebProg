<?php
session_start();
include('controller.php');
if (!isset($_SESSION['user']['customer_id'])) {
    header("Location: login.php?signedIn=no");
} else {
    $result = viewCart($_SESSION['user']['customer_id']);
?>
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
        <title>Cart</title>
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

        /* image setting */
        .image-container {
            position: relative;
            display: inline-block;
            width: 150px;
            height: 100px;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .image-container:hover .overlay {
            opacity: 1;
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>

    <body class="bg-yellow-50 background-size:contain">
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
                    <li class="mx-4 my-6 md:my-0"><a href="index.php" class="font-medium hover:text-orange-200  duration-500">Home</a></li>
                    <li class="mx-4 my-6 md:my-0"><a href="viewItems.php" class="font-medium hover:text-orange-200  duration-500">Products</a></li>
                    <li class="mx-4 my-6 md:my-0 md:hidden"><a href="cart.php" class="font-medium hover:text-orange-200  duration-500">View Cart</a></li>
                    <li class="mx-4 my-6 md:my-0 md:hidden"><a href="editProfile.php" class="font-medium hover:text-orange-200  duration-500">Edit Profile</a></li>
                    <li class="mx-4 my-6 md:my-0 md:hidden"><a href="logout.php" class="font-medium hover:text-orange-200  duration-500">Logout</a></li>
                    <li class="mx-4 my-6 md:my-0 relative">
                        <img src="path/to/profile-pic.jpg" alt="Profile" class="w-10 h-10 hidden md:block rounded-full cursor-pointer" onclick="toggleDropdown()">
                        <div id="dropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-20 hidden">
                            <a href="cart.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">View Cart</a>
                            <a href="editProfile.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Edit Profile</a>
                            <a href="logout.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Logout</a>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- cart -->
            <div class="flex flex-col items-center md:items-start md:w-full lg:w-full mx-auto p-4">
                <div class="w-full text-center md:text-left mt-1 mb-2">
                    <p class="text-3xl font-bold m-3 mt-2 mb-4 md:ml-16">Items in Cart</p>
                </div>
                <div class="w-[90%] lg:w-[80%] mx-auto grow bg-white bg-opacity-80 border rounded-lg p-2 md:p-4 shadow-lg">
                    <div class="grid">
                        <?php
                        if($result->num_rows==0){
                            ?>
                            <p class="mx-auto text-slate-600 text-opacity-50">No Items in Cart</p>
                            <?php
                        }
                        while ($data = $result->fetch_assoc()) {
                        ?>
                            <div class="p-2 flex md:mx-1">
                                <div class="image-container">
                                    <a href="viewItemDetail.php?product_id=<?= $data['product_id'] ?>">
                                        <img src="<?= $data['photo'] ?>" alt="<?= $data['name'] ?>">
                                        <div class="overlay">View Details</div>
                                    </a>
                                </div>
                                <div class="ml-2 md:ml-4 md:text-right w-full p-1">
                                    <p class=" md:text-left mb-6 md:mb-0"><?= $data['name'] ?> | x<?= $data['quantity'] ?></p>
                                    <p class="md:text-xs text-sm md:mb-8 hidden md:block md:text-left ">description: <?= $data['description'] ?></p>
                                    <!-- just edit and delete button -->
                                    <a class="text-xs text-blue-300 hover:underline" href="viewItemDetail.php?product_id=<?= $data['product_id'] ?>">Details</a><br class="md:hidden">
                                    <span class="hidden md:inline mx-2 text-blue-300">|</span>
                                    <a class="text-xs text-red-300 hover:underline" href="deleteCartItem.php?product_id=<?= $data['product_id'] ?>">Remove</a>
                                </div>
                            </div>
                            <hr class="mb-2">
                    <?php
                        }
                    }
                    ?>
                    </div>
                </div>
            </div>
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
        document.addEventListener('click', function(event) {
            let dropdown = document.getElementById('dropdown');
            let profilePic = dropdown.previousElementSibling;
            if (!dropdown.contains(event.target) && !profilePic.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        });
    </script>

    </html>