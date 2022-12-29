<?php

$connect = new mysqli('localhost','root','','simple_ecommerce');

$id = $_POST['id'] ?? null;

if (!$id){
    header('Location: ProductSubCategory.php');
    exit();
}

$connect->query("DELETE FROM sub_category WHERE id = $id");
header("location: ProductSubCategory.php");


?>