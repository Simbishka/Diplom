<?php
session_start();

if($_SESSION['user'] == ""){
  header("Location: /");
  exit();
}
if (isset($_POST['category_submit'])) {
  if(($_POST['category_title'] == "")) {
    echo "Вы не заполнили поле";
    exit();
  }
}

$cid = $_GET['cid'];
$id = $_GET['id'];
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
        <form action="edit_category_parse.php" method="post">
          <p> Название категории </p>
          <input type="text" name="category_edit_title" size="98" maxlength="150" />
          <p> Содержание категории </p>
          <textarea name="category_edit_content" rows="5" cols="75">
          </textarea>
          <br /><br />
          <input type="hidden" name="cid" value="<?php echo $cid; ?>" />
          <input type="hidden" name="cid" value="<?php echo $id; ?>" />
          <input type="submit" name="category_edit_submit" value="Изменить" />
        </form>
        <a href="admin.php"> Назад </a>
    </div>

</div>

<footer class="footer">
  Панфилов Б, 2022г.
</footer>

</body>
</html>