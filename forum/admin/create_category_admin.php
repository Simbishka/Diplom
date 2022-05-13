<?php
session_start();
require '../../vendor/connect.php';



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
      <li><a href=../../index.html>Главная</a></li>
      <li><a href=../../grammar.html>Грамматика</a></li>
      <li><a href=../../trainer.html>Квизы</a></li>
      <li><a href=admin.php>Форум</a></li>
    </ul>
  </header>

    <!-- Профиль -->
<div class="wrapper">
   <?php
      echo "<p class='authed_as'>Вы вошли как ".$_SESSION['user']['full_name']." &bull; <a href='../../vendor/logout.php'>Выйти</a>";
   ?>
    <div id="content">
        <form action="create_category_admin_parse.php" method="post">
          <p> Название категории </p>
          <input type="text" name="category_title" size="98" maxlength="150" />
          <p> Содержание категории </p>
          <textarea name="category_content" rows="5" cols="75">
          </textarea>
          <br /><br />
          <input type="hidden" name="cid" value="<?php echo $cid; ?>" />
          <input type="submit" name="category_submit" value="Создайте вашу категорию" />
        </form>
        <a href="admin.php">Назад</a>
    </div>

</div>

<footer class="footer">
  Панфилов Б, 2022г.
</footer>

</body>
</html>