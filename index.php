<?php
session_start();

require 'C:\OpenServer\domains\auth\vendor\connect.php';
require 'C:\OpenServer\domains\auth\functions.php';

$sql = 'SELECT * FROM goods';
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
            <a href="" class="h_menu">О нас</a>
            <a href="" class="h_menu">Доставка</a>
            <a href="" class="h_menu">Оплата</a>
        </nav>
        <nav class="header_reg">
            <a href="" class="h_menu">Вход</a>
            <a href="" class="h_menu">Регистрация</a>
        </nav>
        <nav class="cart">
            <a href="cartPage.php" class="cart_link">CART</a>
        </nav>
    </div>
</header>


<div class="main_wrapper">
    <div class="main_content">


        <div class="products_wrapper">

            <?php




                    foreach($result as $products){


                ?>
                <form action="index.php" method="POST"  enctype="multipart/form-data" class="card_form js_form">
                    <input class="js_id" type="hidden" name="product_id" value="<?= $products['id'] ?>">

                    <div class="img_wrapper">
                        <img src="<?= $products['product_img']?>" alt="" height="200px" class="card_img">
                    </div>


                    <div class="card_name_wrapper">
                        <p class="card_name"><?= $products['product_name'] ?></p>
                    </div>


                    <div class="card_description_wrapper">
                        <p class="card_description">
                            <?=    $products['product_description']    ?>
                        </p>
                    </div>


                    <div class="card_price_wrapper">
                        <p class="card_price">
                            <?=    $products['product_cost'] ?>
                        </p>
                        <p class="cart_currency">
                            <?=  $products['currency']  ?>
                        </p>
                    </div>


                    <div class="cart_btn_wrapper">

                        <input type="submit" value="Добавить в корзину" class="add js_add" name="add">
                        <input type="submit" style="display:<?= (hasIdInCart($products['id'], $_SESSION['cart']))?'block' : 'none' ?>" value="Убрать в корзину" class="remove js_remove" name="remove">

                        <p class="msg js_count">

                            <?php

                            if(hasIdInCart($products['id'], $_SESSION['cart'])) {
                                $index = getCartProductIndex($products['id'], $_SESSION['cart']);
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


        <script src="js/main.js"></script>


</body>
</html>
