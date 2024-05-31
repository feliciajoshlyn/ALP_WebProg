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
        </style>
    </head>

    <body>
        <!-- cart -->
        <div>
            <p>View All Your Items</p>
            <div>
                <?php
                while ($data = $result->fetch_assoc()) {
                    ?>
                    <p><?= $data['name']?></p>
                    <!-- just edit and delete button -->
                    <a href="deleteCartItem.php?product_id=<?= $data['product_id']?>">Delete From Cart</a><br>
                    <!-- <div class="quantity-control">
                        <button class="minus-btn">-</button>
                        <input type="number" class="quantity-input" name="quantity" value="<?= $data['quantity'] ?>" min="1">
                        <button class="plus-btn">+</button>
                    </div> -->
            <?php
                }
            }
            ?>
            </div>
        </div>
    </body>

    </html>