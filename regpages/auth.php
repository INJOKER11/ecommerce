<?php
session_start();

if($_SESSION['user']){
    header('Location: profile.php');
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


        <form action="../vendor/signin.php" method="post">
            <label >Логин</label>
            <input type="text" name="login" placeholder="Введите логин">
            <label >Пароль</label>
            <input type="password" name="password" placeholder="Введите пароль">
            <button type="submit">Войти</button>
            <p>
                Ссылка на регистрацию <a href="register.php">CLICK</a>
            </p>

            <?php
            if($_SESSION['message']){
                echo '<p class="msg">'. $_SESSION['message']  .'  </p>';
            }
            unset ($_SESSION['message']);
            ?>

        </form>



</body>
</html>