<?php

function getCartProductIds($cart){
    $cart_ids = [];
    foreach ($cart as $cart_product){
        $cart_ids[] = $cart_product['id'];
    }
    return $cart_ids;
}


function getCartProductIndex($id, $cart){

    foreach ($cart as $index => $cart_product){
        if($id == $cart_product['id']){
            return $index;
        }

    }
    return false;
}


function hasIdInCart($id, $cart){

    foreach ($cart as $cart_product){
        if($id == $cart_product['id']){
            return true;
        }

    }
    return false;

}

function getCartProductById($id, $cart){
    $index = getCartProductIndex($id, $cart);
    if($index === false){
        return null;
    }
   return $cart[$index];

}


