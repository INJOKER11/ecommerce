<?php
include 'C:\OpenServer\domains\auth\vendor\connect.php';
session_start();

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

$data = [
    'product_img' => $path_img,
    'product_name' => $product_name,
    'product_description' => $product_description,
    'product_cost' => $product_price,
    'currency' => $product_currency,
    'id' => $product_id
];

    if(!empty($product_name & $product_description & $product_price & $product_currency & $path_img)){
        $sql = "UPDATE `goods` SET `product_img` = :product_img,`product_name` = :product_name,`product_description` = :product_description,`product_cost` = :product_cost,`currency` = :currency WHERE `goods`. `id` = :id";

        $connect->prepare($sql)->execute($data);
        header('Location: ../adminPanel.php');
    }else{
        $_SESSION['error_msg'] = 'Не все поля заполнены';
        header("Location: ../updateProduct.php?id=$product_id");
    }




