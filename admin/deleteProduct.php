<?php


require_once 'C:\OpenServer\domains\auth\vendor\connect.php';

$product_id = $_GET['id'];

mysqli_query($connect, "DELETE FROM `goods` WHERE `goods`.`id` = '$product_id'");

    header("Location: adminPanel.php");


