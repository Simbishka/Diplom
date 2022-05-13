<?php
session_start();
require '../../vendor/connect.php';
if ((!isset($_SESSION['user'])) || ($_GET['cid'] == "")) {
    header('Location: /');
    exit();
}
$cid = $_GET['cid'];
$tid = $_GET['tid'];

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
      <form class='post_reply_user_form'action="edit_post.php" method="post">
      <p>Содержание ответа</p>
      <textarea name="reply_content_admin" rows="5" cols="75"></textarea>
      <br /> <br />
      <input type="hidden" name="cid" value="<?php echo $id;?>" />
      <input type="hidden" name="cid" value="<?php echo $cid;?>" />
      <input type="hidden" name="tid" value="<?php echo $tid;?>" />
      <input type="submit" name="reply_submit" value="Оставьте свой ответ"/>
      </form>
      <a href="view_topic_admin.php?cid=<?php echo $cid;?>&tid=<?php echo $tid;?>">Назад</a>
    </div>

</div>

<footer class="footer">
  Панфилов Б, 2022г.
</footer>

</body>
</html>