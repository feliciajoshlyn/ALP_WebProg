<?php
session_start();
include("controller.php");

//dapetnya dari viewItemDetail.php
deleteItem($_GET['delete_id']);

//arahin kemana
header('Location: viewItems.php');
?>