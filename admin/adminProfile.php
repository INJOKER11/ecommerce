<?php
session_start();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Администрационная панель</title>
    <link rel="stylesheet" href="../styles/css/reg.css">
</head>
<body>


<form action="controller/productController.php" method="post" enctype="multipart/form-data" >
    <label >Фото продукта</label>
    <input type="file" name="product_img">
    <label >Название продукта</label>
    <input type="text" name="product_name" placeholder="Введи название продукта">
    <label >Описание продукта</label>
    <textarea type="text" name="product_description" placeholder="Введи описание продукта" ></textarea>
    <label >Стоимость продукта</label>
    <input type="text" name="product_price" placeholder="Введи стоимость продукта">
    <label>Веддите валюту</label>
    <input  type="text" name="currency" placeholder="Введите валюту">
    <button type="submit">Добавить продукт</button>

    <?php
    if($_SESSION['message']){
        echo '<p class="msg">'. $_SESSION['message']  .'  </p>';
    }
    unset ($_SESSION['message']);
    ?>


</form>





</body>
</html>