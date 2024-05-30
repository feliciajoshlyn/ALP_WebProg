<?php 
include('controller.php');
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];

addToCart($product_id, $quantity);

header("Location:viewItems.php");
?>