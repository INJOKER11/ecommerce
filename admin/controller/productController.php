<?php
    session_start();
    require_once '../../vendor/connect.php';


    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];


    $path_img = '../../img_admin/' . time() . $_FILES['product_img']['name'];
    if(move_uploaded_file($_FILES['product_img']['tmp_name'],  $path_img)){

        $_SESSION['message'] = 'Ошибка в загрузке фото';
        header('Location: ../adminProfile.php');
    }else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../adminProfile.php');
    }

    mysqli_query($connect, "INSERT INTO `goods` (`id`, `product_img`, `product_name`, `product_description`, `product_cost`) 
                        VALUES (NULL, '$path_img', '$product_name', '$product_description', '$product_price')");
