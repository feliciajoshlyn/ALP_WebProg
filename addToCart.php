<?php 
session_start();
include('controller.php');
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];

if(isset($_POST['update_cart'])){
    //if alr in cart and wants to update the quantity
    cartUpdate($product_id, $quantity);
}else if(isset($_POST['add_to_cart'])){
    //if not yet in cart
    addToCart($product_id, $quantity);
}


header("Location:viewItems.php");
?>