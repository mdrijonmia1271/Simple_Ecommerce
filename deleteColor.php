<?php

$connect = new mysqli('localhost','root','','simple_ecommerce');

$id = $_POST['id'] ?? null;

if (!$id){
    header('Location: productColor.php');
    exit();
}

$connect->query("DELETE FROM colors WHERE id = $id");
header("location: productColor.php");


?>