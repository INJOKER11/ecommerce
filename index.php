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
    </div>
</header>


<div class="main_wrapper">
    <div class="main_content">


        <div class="products_wrapper">

            <?php

            while($products = mysqli_fetch_assoc($result))
            {


                ?>
                <form action="index.php" method="POST"  enctype="multipart/form-data" class="card_form js_form">
                    <input class="js_id" type="hidden" name="product_id" value="<?= $products['id'] ?>">

                    <div class="img_wrapper">
                        <img src="   <?= $products['product_img']?>" alt="" class="card_img">
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


        <script>

            var forms = document.querySelectorAll('.js_form');
            forms.forEach(form => {
                var removeBtn = form.querySelector('.js_remove');
                var addBtn = form.querySelector('.js_add');
                form.addEventListener("submit", function (ev){
                    ev.preventDefault();

                });


                addBtn.addEventListener("click", function (ev){
                    updateCart(form, 'add',removeBtn, addBtn);
                })


                removeBtn.addEventListener("click", function (ev){
                    updateCart(form, 'remove', removeBtn, addBtn);
                })

            } );
            function updateCart(form, type='add', removeBtn, addBtn){
                var count = form.querySelector('.js_count');
                var input_id = form.querySelector('.js_id');
                var product_id = input_id.value;
                var http = new XMLHttpRequest();
                var url = 'admin/controller/cartController.php';
                var params = `product_id=${product_id}&${type}=1`;
                http.open('POST', url, true);

                //Send the proper header information along with the request
                http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                http.onreadystatechange = function() {//Call a function when the state changes.
                    if(http.readyState == 4 && http.status == 200) {
                        var json = JSON.parse(http.responseText);
                        console.log(json);
                        if(json.count ==  null){
                            removeBtn.style.display = 'none'
                        }else{
                            removeBtn.style.display = 'inline-block'
                        }

                        count.innerHTML = json.count;
                    }
                }
                http.send(params);
            };
            </script>


</body>
</html>