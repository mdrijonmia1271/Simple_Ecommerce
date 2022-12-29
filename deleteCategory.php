<?php

$connect = new mysqli('localhost','root','','simple_ecommerce');

$id = $_POST['id'] ?? null;

if (!$id){
    header('Location: productCategory.php');
    exit();
}

$connect->query("DELETE FROM category WHERE id = $id");
header("location: productCategory.php");


?>