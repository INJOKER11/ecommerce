<?php
    session_start();
    require_once '../../vendor/connect.php';


    $admin_login = $_POST['admin_login'];
    $admin_password = $_POST['admin_password'];

    $check_admin = mysqli_query($connect, "SELECT * FROM `admin` WHERE `admin_login` = '$admin_login' AND `admin_password` = '$admin_password'");
    if(mysqli_num_rows($check_admin) > 0) {


        $admin = mysqli_fetch_assoc($check_admin);

        $_SESSION['admin'] = [
            "id" => $admin['id'],
            "admin_login" => $admin['admin_login'],
            "admin_password" => $admin['admin_password']

        ];

        header('Location: ../adminProfile.php');

    }else {
        $_SESSION['message'] = 'ТЫ НЕ АДМИН ПИДРИЛА ЕБАННАЯ';
        header('Location: ../admin.php');
    }