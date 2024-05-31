<?php
include ("controller.php");

$productRow = getItemDetails($_GET['update_id'])->fetch_assoc();

?>

<form method="POST" action="uploadItemsBehind.php" enctype="multipart/form-data">
    Product Name: <input type="text" value="<?= $productRow['name']?>" name="product_name"><br>
    Description: <input type="text" name="product_description"><br>
    Photo: <input type="file" name="image" id="image"><br>
    Price: <input type="number" name="price"><br>
    Category: <input type="text" name="category"><br>
    Country : <input type="text" name="country"><br>
    <input type="submit" name="submit">
</form>