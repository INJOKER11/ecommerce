<?php


    $connect = new mysqli( 'localhost','root', '', 'auth');

    if(!$connect){
        die('Error connect to database');
    }