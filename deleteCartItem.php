<?php
session_start();
include('controller.php');
$product_id = $_GET['product_id'];

cartItemDelete($product_id);
header("Location: cart.php");
?>