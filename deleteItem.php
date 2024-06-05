<?php
session_start();
include("controller.php");

//dapetnya dari viewItemDetail.php
deleteItem($_GET['delete_id']);

//arahin ke view items
header('Location: viewItems.php');
?>