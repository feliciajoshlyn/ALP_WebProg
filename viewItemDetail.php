<?php
session_start();
include('controller.php');
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
    <title>ItemDetail</title>
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

                <?php if (isset($_SESSION['user'])) {
                    if ($_SESSION['user']['admin'] == 0) {
                ?>
                        <li class="mx-4 my-6 md:my-0 md:hidden"><a href="cart.php" class="font-medium hover:text-orange-200  duration-500">View Cart</a></li>
                    <?php
                    }
                    ?>
                    <li class="mx-4 my-6 md:my-0 md:hidden"><a href="profile.php" class="font-medium hover:text-orange-200  duration-500">Profile</a></li>
                    <li class="mx-4 my-6 md:my-0 md:hidden"><a href="logout.php" class="font-medium hover:text-orange-200  duration-500">Logout</a></li>
                    <li class="mx-4 my-6 md:my-0 relative">
                        <img src="path/to/profile-pic.jpg" alt="Profile" class="w-10 h-10 hidden md:block rounded-full cursor-pointer" onclick="toggleDropdown()">
                        <div id="dropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-20 hidden">
                            <?php
                            if ($_SESSION['user']['admin'] == 0) {
                            ?>
                                <a href="cart.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">View Cart</a>
                            <?php
                            }
                            ?>
                            <a href="profile.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Profile</a>
                            <a href="logout.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Logout</a>

                        <?php
                    } else {
                        ?>
                    <li class="mx-4 my-6 md:my-0 md:hidden"><a href="login.php" class="font-medium hover:text-orange-200  duration-500">Login</a></li>
                    <li class="mx-4 my-6 md:my-0 md:hidden"><a href="register.php" class="font-medium hover:text-orange-200  duration-500">Register</a></li>
                    <li class="mx-4 my-6 md:my-0 relative">
                        <img src="path/to/profile-pic.jpg" alt="Profile" class="w-10 h-10 hidden md:block rounded-full cursor-pointer" onclick="toggleDropdown()">
                        <div id="dropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-20 hidden">
                            <a href="login.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Login</a>
                            <a href="register.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Register</a>

                        <?php

                    } ?>
                        </div>
                    </li>
            </ul>
        </nav>
    </div>
    <div class="flex flex-col items-center md:items-start md:w-full lg:w-full mx-auto p-4">
        <div class="w-full text-center md:text-left">
            <button class="back-button" onclick="history.back()">
                <ion-icon name="arrow-back-outline"></ion-icon>
            </button>
            <p class="text-3xl font-bold m-3 mt-[-20px] mb-4 md:ml-16">Item Details</p>
        </div>


        <?php
        $product_id = $_GET['product_id'];
        $result = getItemDetails($product_id);
        $data = $result->fetch_assoc();

        echo $data['name'] . "<br>";
        echo $data['description'] . "<br>";
        ?> <img src="<?= $data['photo'] ?>" style="width:200px"><br>
        <?php

        if (isset($_SESSION['user']) && $_SESSION['user']['admin'] == 0) {
            // initializer of the $data['quantity'] variable
            $data['quantity'] = 1;

            // checks if it exists
            if (checkProductinCart($_SESSION['user']['customer_id'], $data['product_id']) == 1) {
                // grabs the data and sets it to $data['quantity']
                $request = viewRequest($_SESSION['user']['customer_id'], $data['product_id']);
                $data['quantity'] = $request->fetch_assoc()['quantity'];
            }


        ?>
            <form method="POST" action="addToCart.php">
                <input type="hidden" name="product_id" id="product_id" value="<?= $data['product_id'] ?>">
                <div class="quantity-control">
                    <button class="minus-btn">-</button>
                    <input type="number" class="quantity-input" name="quantity" value="<?= $data['quantity'] ?>" min="1">
                    <button class="plus-btn">+</button>
                </div>
                <?php
                if (checkProductinCart($_SESSION['user']['customer_id'], $data['product_id']) == false) {
                ?>
                    <button type="submit" name="add_to_cart">Add to Cart</button>
                <?php
                } else {
                ?>
                    <button type="submit" name="update_cart">Update Cart</button>
                <?php
                }
            } else if (!isset($_SESSION['user'])) {
                ?>
                <a href="login.php" class="border rounded-md p-3 bg-orange-100 font-bold">Sign in to Buy</a>
            <?php
            } else if ($_SESSION['user']['admin'] == 1) {
            ?>
                <div>
                    <a href="updateItem.php?update_id=<?= $data['product_id'] ?>">Edit Item</a> | <a href="deleteItem.php">delete</a>
                </div>
            <?php
            }
            ?>
            </form>
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

    const quantityControl = document.querySelector('.quantity-control');
    const minusBtn = document.querySelector('.minus-btn');
    const plusBtn = document.querySelector('.plus-btn');
    const quantityInput = document.querySelector('.quantity-input');

    minusBtn.addEventListener('click', () => {
        event.preventDefault();
        let currentQuantity = parseInt(quantityInput.value);
        if (currentQuantity > 1) {
            quantityInput.value = currentQuantity - 1;
        }
    });

    plusBtn.addEventListener('click', (event) => {
        event.preventDefault(); // Prevent default form submission on "+" button click
        let currentQuantity = parseInt(quantityInput.value);
        quantityInput.value = currentQuantity + 1;
    });
</script>

</html>