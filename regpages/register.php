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


        <form action="../vendor/signup.php" method="post" enctype="multipart/form-data">
            <label >ФИО</label>
            <input type="text" name="full_name" placeholder="Введите ФИО">
            <label >Логин</label>
            <input type="text" name="login" placeholder="Введите логин">
            <label >Почта</label>
            <input type="email" name="email" placeholder="Введите почту">
            <label >Аватарка</label>
            <input type="file" name="avatar">
            <label >Пароль</label>
            <input type="password" name="password" placeholder="Введите пароль">
            <label >Подтвердите пароль</label>
            <input type="password" name="password_confirm" placeholder="Введите повторно">
            <button type="submit">Зарегестрироваться</button>
            <p>
                Есть аккаунт?Войдите - <a href="auth.php">CLICK</a>
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