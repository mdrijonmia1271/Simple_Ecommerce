<?php

$connect = new mysqli('localhost','root','','simple_ecommerce');

$id = $_POST['id'] ?? null;

if (!$id){
    header('Location: productSize.php');
    exit();
}

$connect->query("DELETE FROM sizes WHERE id = $id");
header("location: productSize.php");


?>