<?php
session_start();

if($_SESSION['admin']){
    header('Location: ');
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрацияё</title>
    <link rel="stylesheet" href="../styles/css/reg.css">
</head>
<body>


        <form action="controller/signinAdminController.php" method="post">
            <label >Логин</label>
            <input type="text" name="admin_login" placeholder="Введите логин">
            <label >Пароль</label>
            <input type="password" name="admin_password" placeholder="Введите пароль">
            <button type="submit">Войти</button>


            <?php
            if($_SESSION['message']){
                echo '<p class="msg">'. $_SESSION['message']  .'  </p>';
            }
            unset ($_SESSION['message']);
            ?>

        </form>



</body>
</html>