<?php
require_once 'C:\OpenServer\domains\auth\vendor\connect.php';

$product_id = $_GET['id'];
$product = mysqli_query($connect, "SELECT * FROM `goods` WHERE `id` = '$product_id'");
$products = mysqli_fetch_assoc($product);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../styles/css/admin.css">
    <title>Document</title>
</head>
<body>


<form   method="POST" action="controller/updateProductController.php" enctype="multipart/form-data" class="admin_form" >
    <input type="hidden" name="id" value="<?= $products['id'] ?> " >
    <label >Фото продукта
        <img src="" alt="" height="100px" class="js-preview">
    </label>
    <input type="file" class="product_img" name="product_img">
    <label >Название продукта</label>
    <input type="text" name="product_name" value="<?= $products['product_name'] ?>" placeholder="Введи название продукта">
    <label >Описание продукта</label>
    <textarea type="text" name="product_description" placeholder="Введи описание продукта" > <?= $products['product_description'] ?></textarea>
    <label >Стоимость продукта</label>
    <input type="number" name="product_price" value="<?= $products['product_cost'] ?>" placeholder="Введи стоимость продукта">
    <label>Веддите валюту</label>
    <input  type="text" name="product_currency" value="<?= $products['currency'] ?>" placeholder="Введите валюту">
    <button type="submit"  class="admin_add">Редактировать продукт</button>
</form>

</body>
</html>
