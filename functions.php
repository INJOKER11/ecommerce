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

function getCartSum($connect, $cart){

    $ids_array = getCartProductIds($cart);
    if(count($ids_array) < 1){
        return 0;
    }
    $in  = str_repeat('?,', count($ids_array) - 1) . '?';


//$result = mysqli_query($connect, "SELECT id, product_cost FROM `goods` where id IN ($ids_string)") ;
    $sql = "SELECT id, product_cost FROM goods where id = ($in)";
    $statement = $connect->prepare($sql);
    $statement->execute($ids_array  );
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    $sum = 0;

    if($result !== false){

        foreach ($result as $product){
            $quantity = getCartProductById($product['id'], $cart)['count'];
            $sum += $product['product_cost'] * $quantity;
        }
    }
    return $sum;
}

