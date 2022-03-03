<?php
session_start();
include 'C:\OpenServer\domains\auth\functions.php';


    if(!isset($_POST['add']) && !isset($_POST['remove'])){
        return;
    }

        $id = $_POST['product_id'];

        if(!isset($_SESSION['cart'])){
             $_SESSION['cart'] = [];
        }

    if(isset($_POST['add'])){
        if(!hasIdInCart($id, $_SESSION['cart']))
        {
            $_SESSION['cart'][] = [
                'id' => $id,
                'count' => 1,
            ];
        }else{

            $index = getCartProductIndex($id, $_SESSION['cart']);
            $_SESSION['cart'][$index]['count']++;


        }
    }

    if(isset($_POST['remove'])) {
        if(hasIdInCart($id, $_SESSION['cart']))
        {



            $index = getCartProductIndex($id, $_SESSION['cart']);
            $_SESSION['cart'][$index]['count']--;

            if($_SESSION['cart'][$index]['count'] == 0 ){
                unset($_SESSION['cart'][$index]);

            }

        }

    }
    $cart_product = getCartProductById($id, $_SESSION['cart']);


    $response = [
        'cart' => $_SESSION['cart'],
        'count' => $cart_product['count'],
    ];

    echo json_encode($response);



















