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
      <li><a href=admin.php>Форум</a></li>
    </ul>
  </header>
 

    <!-- Профиль -->
    <section class='profile'>
<div class="wrapper">

<?php
      echo "<form><p>Вы вошли как ".$_SESSION['user']['full_name']." &bull; <a href='../../vendor/logout.php'>Выйти</a></form>";
   ?>

    <div id="content">
        <?php
            
            $sql = "SELECT * FROM categories";
            $res = mysqli_query($connect, $sql) or die (mysqli_error());
            $categories = "";
            if (mysqli_num_rows($res) > 0){
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['category_title'];
                    $description = $row ['category_description'];
                    $categories .="<a href='view_category_admin.php?cid=".$id."' class='cat_links'>".$title." - <font size='-1'>".$description."</font></a><table class='categories_change'><tr><td><a href='edit_category.php?id=".$row['id']."'>Изменить</a></td></tr></table>
                    <table class='categories_del'><tr><td><a href='del_category.php?id=".$row['id']."'>Удалить</a></td></tr></table>
                    <p style='margin-top: -15px; padding-top: 5px; margin-bottom: 20px;'>Опубликовано: ".$row['last_user_posted']."</p>";
                }
                echo $categories;
                
            }

            else{
                echo "<p> Здесь пока нет доступных категорий </p>";
            }
        ?>
        <a href="create_category_admin.php">Создать новый раздел</a>
        <input type="hidden" name="cid" value="<?php echo $cid; ?>" />
    </div>

</div>

        </section>

<footer class="footer">
  Панфилов Б, 2022г.
</footer>

</body>
</html>