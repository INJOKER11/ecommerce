<?php


require_once 'C:\OpenServer\domains\auth\vendor\connect.php';

$product_id = $_GET['id'];
$data_id = [
  'product_id' => $product_id
];

//mysqli_query($connect, "DELETE FROM `goods` WHERE `goods`.`id` = '$product_id'");
$sql = "DELETE FROM goods WHERE goods . id = :product_id";
$statement = $connect->prepare($sql);
$statement->execute($data_id);

    header("Location: adminPanel.php");


