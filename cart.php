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
        <!-- tailwind -->
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- jquery -->
        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
        <title>Document</title>
        <style>
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
        </style>
    </head>

    <body>
        <!-- cart -->
        <div>
            <p>View All Your Items</p>
            <?php
            while ($data = $result->fetch_assoc()) {
                echo $data['name'] . "<br>";
            ?>
                <div class="quantity-control">
                    <button class="minus-btn">-</button>
                    <input type="number" class="quantity-input" name="quantity" value="<?= $data['quantity'] ?>" min="1">
                    <button class="plus-btn">+</button>
                </div>
        <?php
            }
        }
        ?>
        </div>
    </body>
    <script>
        const quantityControl = document.querySelector('.quantity-control');
        const minusBtn = document.querySelector('.minus-btn');
        const plusBtn = document.querySelector('.plus-btn');
        const quantityInput = document.querySelector('.quantity-input');

        minusBtn.addEventListener('click', () => {
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