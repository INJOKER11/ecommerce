<?php
session_start();

include 'C:\OpenServer\domains\auth\vendor\connect.php';
include 'C:\OpenServer\domains\auth\functions.php';

$result = mysqli_query($connect, "SELECT * FROM `goods`");
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

    <!--
        <div class="admin_form_wrapper">
            <button type="submit" class="admin_add_product">
                Добавить продукт
            </button>

            <form action="controller/productController.php" method="post" enctype="multipart/form-data"  class="admin_form" >
                <label >Фото продукта</label>
                <input type="file" name="product_img">
                <label >Название продукта</label>
                <input type="text" name="product_name" placeholder="Введи название продукта">
                <label >Описание продукта</label>
                <textarea type="text" name="product_description" placeholder="Введи описание продукта" ></textarea>
                <label >Стоимость продукта</label>
                <input type="number" name="product_price" placeholder="Введи стоимость продукта">
                <label>Веддите валюту</label>
                <input  type="text" name="currency" placeholder="Введите валюту">
                <button type="submit">Добавить продукт</button>
            </form>

        </div>
    -->



    <div class="product_in_admin_wrapper">



    <table>

        <tr>
            <th>id</th>
            <th>Изображение</th>
            <th>Название</th>
            <th>Описание</th>
            <th>Цена</th>
            <th>Валюта</th>
            <th>Редактировать</th>
        </tr>
        <?php  foreach($result as $admin_products){     ?>
        <tr>
            <td><?=  $admin_products['id']  ?></td>
            <td>
                <img src="../<?=  $admin_products['product_img']  ?>" alt="" style="height: 100px" class="img_in_admin">
            </td>
            <td><?=  $admin_products['product_name']  ?></td>
            <td><?=  $admin_products['product_description']  ?></td>
            <td><?=  $admin_products['product_cost']  ?></td>
            <td><?=  $admin_products['currency']  ?></td>
            <td><a href="" class="">Редактировать</a></td>

        </tr>

        <?php     } ?>
    </table>

</div>
</div>



</body>


<script src="../js/admin.js"></script>




</html>