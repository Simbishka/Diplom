<?php
session_start();
require '../../vendor/connect.php';
if (!$_SESSION['user']) {
    header('Location: /');
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
      <li><a href=../../index.html>Главная</a></li>
      <li><a href=../../grammar.html>Грамматика</a></li>
      <li><a href=../../trainer.html>Квизы</a></li>
      <li><a href=../../auth.php>Форум</a></li>
    </ul>
  </header>

    <!-- Профиль -->
<div class="wrapper">
<?php
      echo "<form><p>Вы вошли как ".$_SESSION['user']['full_name']." &bull; <a href='../../vendor/logout.php'>Выйти</a></form>";
   ?>

    <div id="content">
        <?php
          $cid = $_GET['cid'];
          if(isset($_SESSION['user'])) {
            $logged = " | <a href='create_topic.php?cid=".$cid."'> Нажмите здесь чтобы создать тему </a>";
          }
          else{
            $logged = " | Пожалуйста, авторизуйтесь чтобы создавать темы на этом форуме";
          }
          $sql = "SELECT id FROM categories WHERE id = '".$cid."' LIMIT 1";
          $res = mysqli_query($connect, $sql) or die(mysqli_error());
          if(mysqli_num_rows($res) ==1){
            $sql2 = "SELECT * FROM topics WHERE category_id='".$cid."' ORDER BY topic_reply_date DESC";
            $res2 = mysqli_query($connect, $sql2) or die(mysqli_error());
            if (mysqli_num_rows($res2) > 0){
              $topics .= "<table width='100%' style='border-collapse: collapse;'>";
              $topics .= "<tr><td colspan='3'><a href='profile.php'>Вернуться на главную форума</a>".$logged."<hr /></td></tr>";
              $topics .= "<tr style='background-color: #dddddd;'><td>Название темы</td><td width='65' align='center'>Ответы</td><td width='65' align='center'>Просмотры</td></tr>";
              $topic .= "<tr><td colspan='3'><hr /></td><tr>";
              while ($row = mysqli_fetch_assoc($res2)) {

                $tid = $row['id'];
                $result_c = mysqli_query ($connect, "SELECT COUNT(*) FROM posts WHERE topic_id = '".$tid."'");
                $comm_sum = mysqli_fetch_array($result_c);

                $title = $row['topic_title'];
                $views = $row['topic_views'];
                $date = $row['topic_date'];
                $creator = $row['topic_creator'];
                $last_user = $row['topic_last_user'];
                $topics .= "<tr><td><a href='view_topic.php?cid=".$cid."&tid=".$tid."'>".$title."</a><br />
                <span class='post_info'>Опубликовано: ".$creator." в ".$date." 
                
                <p> Последний ответ от: ".$last_user." </p>
                </span></td><td align='center'>".--$comm_sum[0]."</td><td align='center'>".$views."</td></tr>";
                $topics .= "<tr><td colspan='3'><hr /></td></tr>";

               
              }
              $topics .= "</table>";
              echo $topics;
            }

            else{
              echo "<a href='profile.php'>Вернуться на главную форума</a><hr />";
              echo "<p> В этой категории ещё нет разделов".$logged."</p>";
            }


          }
          else {
            echo "<a href='profile.php'>Вернуться на главную форума</a><hr />";
            echo "<p> Вы пытаетесь посмотреть категорию, которая ещё не существует";
          }
        ?>
    </div>

</div>

<footer style="bottom: 0;" class="footer">
  Панфилов Б, 2022г.
</footer>

</body>
</html>