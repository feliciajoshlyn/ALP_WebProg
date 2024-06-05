<?php session_start(); ?>
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
</style>
</head>

<body class="bg-yellow-50 background-size:contain">
    <div>
        <nav id="navbar" class="w-full p-4 text-sky-50 items-center sm:h-20 sm:flex sm:items-center sm:justify-between fixed top-0 left-0 z-50">
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
                    } else {
                    ?>
                        <li class="mx-4 my-6 md:my-0 md:hidden"><a href="adminViewUser.php" class="font-medium hover:text-orange-200  duration-500">View Users</a></li>
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
                            } else {
                            ?>
                                <a href="adminViewUser.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">View
                                    Users</a>
                            <?php
                            }
                            ?>
                            <a href="profile.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Profile</a>
                            <a href="logout.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Logout</a>
                        </div>
                    </li>
            </ul>
        </nav>
    </div>
<?php
                } else {
?>
    <li class="mx-4 my-6 sm:my-0 sm:hidden"><a href="login.php" class="font-medium hover:text-orange-200  duration-500">Login</a></li>
    <li class="mx-4 my-6 sm:my-0 sm:hidden"><a href="register.php" class="font-medium hover:text-orange-200  duration-500">Register</a></li>
    <li class="mx-4 my-6 sm:my-0 relative">
        <img src="path/to/profile-pic.jpg" alt="Profile" class="w-10 h-10 hidden sm:block rounded-full cursor-pointer" onclick="toggleDropdown()">
        <div id="dropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-20 hidden">
            <a href="login.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Login</a>
            <a href="register.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Register</a>
        </div>
    </li>
    </ul>
    </nav>
    </div>

<?php

                }
?>

<div class="flex flex-col items-center mt-20 md:mt-20 md:w-full lg:w-full mx-auto p-4">
    <div class="text-indigo-800 opacity-80">
        <h1 class="font-bold text-center mt-20 text-xl sm:text-2xl  md:text-3xl lg:text-4xl">Your Global Shopping
            Assistant - TitipinAja.com</h1>
        <h2 class="text-md text-center mt-5 sm:text-xl ">Your Trusted Partner for International Online Shopping</h2>

    </div>

    <div class="w-[80%] flex flex-col items-center">
        <img src="https://raw.githubusercontent.com/feliciajoshlyn/ALP_WebProg/main/img/pngegg-removebg.png" alt="Home Image">
    </div>

    <div class="mt-20 rounded shadow-lg w-full inline-flex flex-nowrap overflow-hidden [mask-image:_linear-gradient(to_right,transparent_0,_black_128px,_black_calc(100%-200px),transparent_100%)]">

        <ul class="flex items-center justify-center md:justify-start [&_li]:mx-8 [&_img]:max-w-none animate-infinite-scroll">
            <li class="px-4 py-2 bg-[#4C62B7] text-white rounded">USA</li>
            <li class="px-4 py-2 bg-[#4C62B7] text-white rounded">UK</li>
            <li class="px-4 py-2 bg-[#4C62B7] text-white rounded">China</li>
            <li class="px-4 py-2 bg-[#4C62B7] text-white rounded">Japan</li>
            <li class="px-4 py-2 bg-[#4C62B7] text-white rounded">Germany</li>
            <li class="px-4 py-2 bg-[#4C62B7] text-white rounded">Singapore</li>
            <li class="px-4 py-2 bg-[#4C62B7] text-white rounded">Taiwan</li>
            <li class="px-4 py-2 bg-[#4C62B7] text-white rounded">Thailand</li>
            <li class="px-4 py-2 bg-[#4C62B7] text-white rounded">Malaysia</li>
        </ul>

        <ul class="flex items-center justify-center md:justify-start [&_li]:mx-8 [&_img]:max-w-none animate-infinite-scroll" aria-hidden="true">
            <li class="px-4 py-2 bg-[#4C62B7] text-white rounded">USA</li>
            <li class="px-4 py-2 bg-[#4C62B7] text-white rounded">UK</li>
            <li class="px-4 py-2 bg-[#4C62B7] text-white rounded">China</li>
            <li class="px-4 py-2 bg-[#4C62B7] text-white rounded">Japan</li>
            <li class="px-4 py-2 bg-[#4C62B7] text-white rounded">Germany</li>
            <li class="px-4 py-2 bg-[#4C62B7] text-white rounded">Singapore</li>
            <li class="px-4 py-2 bg-[#4C62B7] text-white rounded">Taiwan</li>
            <li class="px-4 py-2 bg-[#4C62B7] text-white rounded">Thailand</li>
            <li class="px-4 py-2 bg-[#4C62B7] text-white rounded">Malaysia</li>
        </ul>

    </div>

    <div>
        <h1 class="text-[#4C62B7] font-bold text-center mt-20 text-xl sm:text-2xl  md:text-3xl lg:text-4xl">
            FAQ
        </h1>
        <h2 class="text-[#4C62B7] text-md text-center mt-2 sm:text-xl ">Frequently Asked Questions</h2>
        <div class="container mx-auto px-4 py-16">
            <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
                <h2 class="text-2xl font-semibold text-[#4C62B7]">Who is TitipinAja.com?</h2>
                <p class="mt-2 text-gray-600">TitipinAja.com is a trusted shopping assistant service that helps you
                    purchase items from international online stores. We make it easy for you to get products from
                    around the world, even if the store doesn't ship to your location.</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
                <h2 class="text-2xl font-semibold text-[#4C62B7]">What are the benefits of using TitipinAja.com?
                </h2>
                <p class="mt-2 text-gray-600">By using TitipinAja.com, you get access to a wider range of products
                    from international stores, competitive shipping rates, and a seamless purchasing process. We
                    handle everything from buying the item to shipping it to your doorstep.</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
                <h2 class="text-2xl font-semibold text-[#4C62B7]">Where can I buy items using TitipinAja.com?</h2>
                <p class="mt-2 text-gray-600">You can buy items from a variety of international online stores
                    including the USA, UK, China, Japan, Germany, and many more. If the store doesn't ship to your
                    country, we can help get the item to you.</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
                <h2 class="text-2xl font-semibold text-[#4C62B7]">What if my item doesn't arrive?</h2>
                <p class="mt-2 text-gray-600">If your item doesn't arrive, please contact our customer support team.
                    We will track the shipment and provide assistance. In cases of lost or damaged items, we have a
                    resolution process to ensure you're satisfied with our service.</p>
            </div>
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

</body>
<script>
    tailwind.config = {
        theme: {
            extend: {
                animation: {
                    'infinite-scroll': 'infinite-scroll 25s linear infinite',
                },
                keyframes: {
                    'infinite-scroll': {
                        from: {
                            transform: 'translateX(0)'
                        },
                        to: {
                            transform: 'translateX(-100%)'
                        },
                    }
                }
            },
        },
    }

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