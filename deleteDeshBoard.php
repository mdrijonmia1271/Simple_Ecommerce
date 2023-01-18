<?php

$connect = new mysqli('localhost','root','','simple_ecommerce');

$id = $_POST['id'] ?? null;

if (!$id){
    header('Location: deashBoard.php');
    exit();
}

$connect->query("DELETE FROM deash_board WHERE id = $id");
header("location: deashBoard.php");


?>