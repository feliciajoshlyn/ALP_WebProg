<?php
include_once('controller.php');

$data_to_be_deleted = $_GET["deleteID"];
$resultDelete = deleteUser($data_to_be_deleted);
echo $resultDelete

?>