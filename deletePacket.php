<?php

$connect = new mysqli('localhost','root','','simple_ecommerce');

$id = $_POST['id'] ?? null;

if (!$id){
    header('Location: productPacket.php');
    exit();
}

$connect->query("DELETE FROM packets WHERE id = $id");
header("location: productPacket.php");


?>