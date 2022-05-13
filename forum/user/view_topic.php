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
          echo "<a href='view_category.php?cid=".$cid."'>Назад</a>";
          $tid = $_GET['tid'];
          $sql = "SELECT * FROM topics WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1";
          $res = mysqli_query($connect, $sql) or die (mysqli_error($connect));
          if (mysqli_num_rows($res) == 1) {
            echo "<table width='100%'>";
            if ($_SESSION['user']) {
              echo "<tr><td colspan='2'><input type='submit' value='Добавить ответ' onClick=\"window.location = 'post_reply.php?cid=".$cid."&tid=".$tid."'\" />";
            }

            else {
              echo "<tr><td colspan='2'><p>Пожалуйста, войдите чтобы оставить свой ответ.</p></td></tr>";
            }

            while ($row = mysqli_fetch_assoc($res)){
              $sql2 = "SELECT * FROM posts WHERE category_id = '".$cid."' AND topic_id='".$tid."'";
             
              
              $res2 = mysqli_query($connect, $sql2) or die (mysqli_error($connect));

              
            
              while($row2 = mysqli_fetch_assoc($res2)) {

                  $aid = $row2['id'];
                 
                  $q4 = mysqli_query($connect, "SELECT * FROM likes WHERE id_article='$aid'");
                  $counter = 0;
                  while ($res4 = mysqli_fetch_array($q4)){
                      $counter++;
                  }

                echo "<tr><td valign='top' style='border: 1px solid #000000;'><div style='min-height: 125px;'>".$row['topic_title']."<br /> от <br />".$row2['post_creator']." - ".$row2['post_date']."<br/><br/>".$row2['post_content']. ""."</div></td> <td width='500' valign='top' align='center' style= 'border: 1px solid #000000;'>"."<img src='../../{$row2['avatar']}' width='10%' style=' display:flex; margin-bottom: 30px;'"."<br/>".$row2['post_creator']."</td></tr><tr><td colspan='2'>
                
                <div class='likes'> Понравилось: " .$counter."</div>

                <form class='likes_form' action='../../action/like.php' method = 'post'>
                <input type='hidden' name='id_article' value=".$row2['id']." />
                <p>Оценить</p>
                <input class='like_button' type='submit' value='♥' name='like'>
                <p>Не оценивать</p>
                <input class='dislike_button' type='submit' value='♥' name='dislike'>
              </form>
                
                ";
                
              }

             
              
           


              $old_views = $row['topic_views'];
              $new_views = $old_views + 1;
              $sql3 = "UPDATE topics SET topic_views='".$new_views."' WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1";
              $res3 = mysqli_query($connect, $sql3) or die (mysqli_error($connect));
            } echo "</table>";
          } 
          else {
            echo "<p>Эта тема ещё не существует.</p>";
          }
        ?>
    </div>
    <input type="hidden" name="cid" value="<?php echo $cid; ?>" />
    <input type="hidden" name="tid_likes" value="<?php echo $tid; ?>" />
</div>

<footer class="footer">
  Панфилов Б, 2022г.
</footer>


</body>
</html>