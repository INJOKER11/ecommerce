<?php
include 'C:\OpenServer\domains\auth\vendor\connect.php';

$product_id = $_POST['id'];
$product_name = $_POST['product_name'];
$product_description = $_POST['product_description'];
$product_price = $_POST['product_price'];
$product_currency = $_POST['product_currency'];

$path_img = 'img_admin/' . time() . $_FILES['product_img']['name'];

if(move_uploaded_file($_FILES['product_img']['tmp_name'], '../../' . $path_img)){

    $_SESSION['message'] = 'Ошибка в загрузке фото';

}else {
    $_SESSION['message'] = 'Успешно загрузили';

}


    mysqli_query($connect,
        "UPDATE `goods` SET `product_img` = '$path_img', `product_name` = '$product_name', `product_description` = '$product_description', `product_cost` = '$product_price', `currency` = '$product_currency' WHERE `goods`.`id` = '$product_id';" );


    header('Location: ../adminPanel.php');