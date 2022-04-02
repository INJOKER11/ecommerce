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




    <div class="product_in_admin_wrapper">

        <div class="admin_product_form_wrapper">
            <button  class="admin_add_product">
                Добавить продукт
            </button>




            <div class="modal_window_wrapper" style="visibility: hidden; opacity: 0;">
                <div class="modal_window">
                    <button onclick="close()" class="close_modal"></button>
                    <form   method="POST" action="controller/productController.php" enctype="multipart/form-data" class="admin_form" >
                        <label >Фото продукта
                            <img src="" alt="" height="100px" class="js-preview">
                            <img src="" alt="" height="100px" class="js-preview">
                        </label>
                        <input type="file" class="product_img" name="product_img">
                        <label >Название продукта</label>
                        <input type="text" name="product_name" placeholder="Введи название продукта">
                        <label >Описание продукта</label>
                        <textarea type="text" name="product_description" placeholder="Введи описание продукта" ></textarea>
                        <label >Стоимость продукта</label>
                        <input type="number" name="product_price" placeholder="Введи стоимость продукта">
                        <label>Веддите валюту</label>
                        <input  type="text" name="currency" placeholder="Введите валюту">
                        <button type="submit"  class="admin_add">Добавить продукт</button>
                    </form>
                <p class="msg"><?= $_SESSION['message']    ?></p>
                </div>
            </div>



        </div>

    <table id="table_products" class="table_products">

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
            <td class="js_id"><?=  $admin_products['id']  ?></td>
            <td class="js_img">
                <img src="../<?=  $admin_products['product_img']  ?>" alt="" style="height: 100px" class="img_in_admin">
            </td>
            <td class="js_name"><?=  $admin_products['product_name']  ?></td>
            <td class="js_description"><?=  $admin_products['product_description']  ?></td>
            <td class="js_price"><?=  $admin_products['product_cost']  ?></td>
            <td class="js_currency"><?=  $admin_products['currency']  ?></td>
            <td><a href="" class="">Редактировать</a></td>

        </tr>

        <?php     } ?>
    </table>

</div>
</div>


<script src="../assets/jquery/jquery-3.6.0.min.js"></script>
<script src="../js/admin.js">

</script>


</body>







</html>