<?php
session_start();
include ("controller.php");
$product_id = $_POST['product_id'];
$name = $_POST["product_name"];
$desc = $_POST["product_description"];
$img = $_FILE["image"];
$price = $_POST["price"];
$category = $_POST["category"];
$country = $_POST["country"];

updateItem($product_id, $name, $desc, $img, $price, $category, $country);

header("Location: viewItemDetail.php?product_id=$product_id");


?>