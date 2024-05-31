<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <h1>Logo</h1>
        <a href="adminViewItems.php">View All Products</a> | <a href="adminUpload.php">Add New Product</a><br><br>
    </header>
    <?php
    include('controller.php');
    $conn = my_connectDB();

    $sql = "SELECT * FROM products";
    $result = mysqli_query($conn, $sql);

    while ($data = $result->fetch_assoc()) {
        ?>
        <p>Product Name: <?= $data['name']?></p><br>
        <p>Description: <?= $data['description']?></p><br>
        <img src="<?= $data['photo'] ?>" style="width:200px"><br>
        <p>Price: <?= $data['price']?></p><br>
        <p>Category: <?= $data['category']?></p><br>
        <p>Country: <?= $data['country']?></p><br>
        <a href="updateItem.php?update_id=<?= $data['product_id']?>">edit</a> | <a href="deleteItem.php?delete_id=<?= $data['product_id']?>">delete</a><br>
    <?php
    }
    my_closeDB($conn);
    ?>
</body>

</html>