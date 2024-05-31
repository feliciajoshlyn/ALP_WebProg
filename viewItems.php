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
    <header>

    </header>
    <?php
    session_start();
    include('controller.php');
    $conn = my_connectDB();

    $sql = "";
    if (isset($_GET['country'])) {
        $sql = "SELECT * FROM products WHERE country =" . $_GET['country'];
    } else {
        $sql = "SELECT * FROM products";
    }
    $result = mysqli_query($conn, $sql);

    while ($data = $result->fetch_assoc()) {
        echo "Product Name: " . $data['name'] . "<br>";
        echo "Description: " . $data['description'] . "<br>";
    ?> <img src="<?= $data['photo'] ?>" style="width:200px"><br>
        <?php
        echo "Price: " . $data['price'] . "<br>";
        echo "Category: " . $data['category'] . "<br>";
        echo "Country: " . $data['country'] . "<br>";
        echo "<a href='viewItemDetail.php?product_id=".$data['product_id']."'>View Details</a><br>";
    }
    my_closeDB($conn);
    ?>
</body>

</html>