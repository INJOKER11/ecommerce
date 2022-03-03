<?php
session_start();
include 'C:\OpenServer\domains\auth\vendor\connect.php';
include 'C:\OpenServer\domains\auth\functions.php';


$string = implode(",",getCartProductIds($_SESSION['cart']));

$cart_products = mysqli_query($connect, "SELECT * FROM `goods` WHERE id IN($string) ");



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
            <a href="" class="h_menu">Главная</a>
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

                <?php while($cart_output = mysqli_fetch_assoc($cart_products))
                { ?>
                    <form action="admin/controller/cartController.php" method="POST"  enctype="multipart/form-data" class="product_in_cart">
                <div class="img_wrapper">
                    <img src="<?=  $cart_output['product_img'] ?>" alt="" class="img_in_cart">
                </div>

                <div class="name_in_cart_wrapper">
                    <p class="name_in_cart">
                        <?=  $cart_output['product_name'] ?>
                    </p>
                </div>

                <div class="price_in_cart_wrapper">
                    <p class="price_in_cart">
                        <?=  $cart_output['product_cost'] ?>
                    </p>
                </div>
                <input type="button" value="add" class="add" name="add">
                <input type="button" value="remove" class="remove" name="remove">



            </form>
            <?php } ?>
        </div>



    </div>


</div>






</body>
</html>
