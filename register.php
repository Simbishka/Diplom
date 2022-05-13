<?php
    session_start();
    if ($_SESSION['user']) {
        header('Location: forum/user/profile.php');
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
</head>
<body>

<header class="header">
    <img src="../../assets/images/logo.svg" alt="">
    <p class="site_title">English Express</p>
    <ul>
      <li><a href=index.html>Главная</a></li>
      <li><a href=grammar.html>Грамматика</a></li>
      <li><a href=trainer.html>Квизы</a></li>
      <li><a href=auth.php>Форум</a></li>
    </ul>
  </header>

    <!-- Форма регистрации -->

    <form>
        <label>ФИО</label>
        <input type="text" name="full_name" placeholder="Введите свое полное имя">
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите свой логин">
        <label>Почта</label>
        <input type="email" name="email" placeholder="Введите адрес своей почты">
        <label>Изображение профиля</label>
        <input type="file" name="avatar">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <label>Подтверждение пароля</label>
        <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
        <button type="submit" class="register-btn">Зарегистрироваться</button>
        <p>
            У вас уже есть аккаунт? - <a href="auth.php">авторизируйтесь</a>!
        </p>
        <p class="msg none">Lorem ipsum.</p>
    </form>
    <footer class="footer">
  Панфилов Б, 2022г.
</footer>

    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>