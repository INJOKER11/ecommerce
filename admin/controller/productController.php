<?php
    session_start();
    include 'C:\OpenServer\domains\auth\vendor\connect.php';


    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    $currency = $_POST['currency'];
    $id = NULL;

    $path_img = 'img_admin/' . time() . $_FILES['product_img']['name'];

         if(move_uploaded_file($_FILES['product_img']['tmp_name'], '../../' . $path_img)){

             $_SESSION['message'] = 'Ошибка в загрузке фото';

         }else {
             $_SESSION['message'] = 'Успешно загрузили';

         }

    if(isset($_POST['product_name'], $_POST['product_description'], $_POST['product_price'], $_POST['currency']))
    {
        $sql = 'INSERT INTO goods(id, product_img, product_name, product_description, product_cost, currency )
                VALUES(?,?,?,?,?,?)';

        $connect->prepare($sql)->execute([$id, $path_img, $product_name,$product_description,$product_price,$currency]);


    }






    $sql_all = 'SELECT * FROM goods';
    $statement = $connect->query($sql_all);
    $result = $statement->fetchALL(PDO::FETCH_ASSOC);



//    $js_id = $result['id'];
//    $js_img =$result['product_img'];
//    $js_name = $result['product_name'];
//    $js_description = $result['product_description'];
//    $js_price = $result['product_cost'];
//    $js_currency = $result['currency'];


//    $js_result = [
//        'js_id' => $js_id,
//        'js_img' => $js_img,
//        'js_name' => $js_name,
//        'js_description' => $js_description,
//        'js_price' => $js_price,
//        'js_currency' => $js_currency,
//    ];

//echo json_encode($js_result);