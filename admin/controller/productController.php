<?php
    session_start();
    include 'C:\OpenServer\domains\auth\vendor\connect.php';


    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    $currency = $_POST['currency'];


    $path_img = 'img_admin/' . time() . $_FILES['product_img']['name'];

    if(move_uploaded_file($_FILES['product_img']['tmp_name'], '../../' . $path_img)){

        $_SESSION['message'] = 'Ошибка в загрузке фото';
        header('Location: ../adminPanel.php');
    }else {
        $_SESSION['message'] = 'Успешно загрузили';
        header('Location: ../adminPanel.php');
    }



mysqli_query($connect, "INSERT INTO `goods` (`id`, `product_img`, `product_name`, `product_description`, `product_cost`, `currency` )
                              VALUES (NULL, '$path_img', '$product_name', '$product_description', '$product_price', '$currency')");


