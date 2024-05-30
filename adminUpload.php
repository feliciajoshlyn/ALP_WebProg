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
        <a href="viewItems.php">View All Products</a> | <a href="adminUpload.php">Add New Product</a><br><br>
    </header>
    <form method="POST" action="uploadItemsBehind.php" enctype="multipart/form-data">
        Product Name: <input type="text" name="product_name"><br>
        Description: <input type="text" name="product_description"><br>
        Photo: <input type="file" name="image" id="image" required><br>
        Price: <input type="number" name="price"><br>
        Category: <input type="text" name="category"><br>
        Country : <input type="text" name="country"><br>
        <input type="submit" name="submit">
    </form>
</body>

</html>