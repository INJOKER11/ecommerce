<?php
session_start();
include 'C:\OpenServer\domains\auth\vendor\connect.php';
include 'C:\OpenServer\domains\auth\functions.php';


$sql = "SELECT * FROM goods";
$statement = $connect->query($sql);
$result = $statement->fetchAll(PDO::FETCH_ASSOC);





?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/css/style.css">
    <title>MiGom</title>
</head>
<body>
<header class="header_main">
    <div class="header_wrap_menu">
        <nav class="header_menu">
            <a href="/" class="h_menu">Главная</a>
            <a href="" class="h_menu">Главная</a>
            <a href="" class="h_menu">Главная</a>
            <a href="" class="h_menu">Главная</a>
            <a href="" class="h_menu">Главная</a>
        </nav>
    </div>



</header>






<div class="main_wrapper">
    <div class="cart">
        <div class="product_in_cart_wrapper">

            <div class="products_wrapper">

                <?php


                foreach($result as $products_in_cart)
                {
                if(!hasIdInCart($products_in_cart['id'], $_SESSION['cart'])){
                    continue;
                }

                    ?>
                    <form action="index.php" id="p<?= $products_in_cart['id'] ?>" method="POST"  enctype="multipart/form-data" class="card_form js_form">
                        <input class="js_id" type="hidden" name="product_id" value="<?= $products_in_cart['id'] ?>">

                        <div class="img_wrapper">
                            <img src="   <?= $products_in_cart['product_img']?>" height="200px" alt="" class="card_img">
                        </div>


                        <div class="card_name_wrapper">
                            <p class="card_name"><?= $products_in_cart['product_name'] ?></p>
                        </div>


                        <div class="card_description_wrapper">
                            <p class="card_description">
                                <?=    $products_in_cart['product_description']    ?>
                            </p>
                        </div>


                        <div class="card_price_wrapper">
                            <p class="card_price">
                                <?=    $products_in_cart['product_cost'] ?>
                            </p>

                            <p class="cart_currency">
                                <?=  $products_in_cart['currency']  ?>
                            </p>
                        </div>


                        <div class="cart_btn_wrapper">

                            <input type="submit" value="Добавить в корзину" class="add js_add" name="add">
                            <input type="submit" style="display:<?= (hasIdInCart($products_in_cart['id'], $_SESSION['cart'])?'block' : 'none') ?>" value="Убрать c корзину" class="remove js_remove" name="remove">

                            <p class="msg js_count">

                                <?php

                                if(hasIdInCart($products_in_cart['id'], $_SESSION['cart'])) {
                                    $index = getCartProductIndex($products_in_cart['id'], $_SESSION['cart']);
                                    echo $_SESSION['cart'][$index]['count'];

                                }

                                ?>
                            </p>




                        </div>

                    </form>


                    <?php
                }


                ?>

            </div>

        </div>

        <p class="msg js_sum">
        <?=  getCartSum($connect, $_SESSION['cart'])  ?>
        </p>


    </div>


</div>


<script src="js/main.js"></script>
</body>
</html>
