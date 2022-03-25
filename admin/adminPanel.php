<?php
session_start();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Администрационная панель</title>
    <link rel="stylesheet" href="../styles/css/admin.css">
</head>
<body>


<div class="main_wrapper">
    <div class="nav_admin_panel">


        <div class="first_item">

            <input type="checkbox" class="product_check" >
            <label for="product_check">Products</label>






        </div>
        <div class="second_item">

        </div>
        <div class="third_item">

        </div>
    </div>


    <div class="admin_form_wrapper">
        <form action="controller/productController.php" method="post" enctype="multipart/form-data"  class="admin_form" >
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
        </form>
    </div>

</div>



</body>


<script src="../js/admin.js"></script>




</html>