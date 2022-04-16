<?php

    $connect = NULL;

    function getConnection() {
        global $connect;
        if(!$connect){
            $connect = new mysqli( 'localhost','root', '', 'auth');
        }

        if(!$connect){
            die('Error connect to database');
        }
        return $connect;
    }

    getConnection();

