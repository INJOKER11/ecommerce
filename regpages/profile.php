<?php
session_start();

if(!$_SESSION['user']){
    header('Location: /');
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


        <form >

            <img src="<?= $_SESSION['user']['avatar'] ?>" width="200px" alt="">

            <h2 style="margin:10px 0px;"><?= $_SESSION['user']['full_name'] ?></h2>

            <a href="#"><?= $_SESSION['user']['email'] ?></a>
            <a href="../vendor/logout.php" class="logout">Выход</a>
        </form>



</body>
</html>