<?php
session_start();
include ("controller.php");

$product_id = $_POST['product_id'];
$name = $_POST["product_name"];
$desc = $_POST["product_description"];
$img = $_FILES["image"];
$price = $_POST["price"];
$category = $_POST["category"];
$country = $_POST["country"];

// ambil old file for the pic
$before = getItemDetails($product_id)->fetch_assoc();
$keptimage = $before['photo'];

if ($img["error"] === UPLOAD_ERR_OK) {
    // Ensure the target exists
    $target_dir = "img/";
    if (!is_dir($target_dir) || !is_writable($target_dir)) {
        die("Directory is not writable or does not exist: " . $target_dir);
    }

    $target_file = $target_dir . basename($img["name"]);
    if (move_uploaded_file($img["tmp_name"], $target_file)) {
        $new_photo = $target_file; // Use the new photo
    } else {
        die("Error moving uploaded file.");
    }
} else {
    // Use foto yg sudah
    $new_photo = $keptimage;
}

updateItem($product_id, $name, $desc, $new_photo, $price, $category, $country);

header("Location: viewItemDetail.php?product_id=$product_id");
?>
