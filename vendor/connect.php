<?php



$connect = new PDO('mysql:host=localhost;dbname=auth', 'root', '');


        if(!$connect){
            die('Error connect to database');
        }
        return $connect;




