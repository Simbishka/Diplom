<?php
session_start();
require '../../vendor/connect.php';
if ($_SESSION['user']) {
  if(isset($_POST['reply_submit'])) {

    $creator = $_SESSION['user']['full_name'];
    $avatar = $_SESSION['user']['avatar'];
    $cid = $_POST['cid'];
    $tid = $_POST['tid'];
    $reply_content = $_POST['reply_content'];
    $sql = "INSERT INTO posts (category_id, topic_id, post_creator, post_content, post_date, avatar) VALUES ('".$cid."', '".$tid."', '".$creator."', '".$reply_content."', now(), '".$avatar."')";
    $res = mysqli_query($connect, $sql) or die (mysqli_error($connect));
    $sql2 = "UPDATE categories SET last_post_date=now(), last_user_posted='".$creator."' WHERE id='".$cid."' LIMIT 1";
    $res2 = mysqli_query($connect, $sql2) or die (mysqli_error($connect));
    $sql3 = "UPDATE topics SET topic_reply_date=now(), topic_last_user='".$creator."' WHERE id='".$tid."' LIMIT 1";
    $res3 = mysqli_query($connect, $sql3) or die (mysqli_error($connect));

    if(($res) && ($res2) && ($res3)) {
      echo "<p>Ваш ответ был успешно размещён. <a href='view_topic.php?cid=".$cid."&tid=".$tid."'>Нажмите здесь чтобы вернуться к теме.</a></p>";
    }
    else {
      echo "<p>Возникла проблема при размещении вашего ответа. Пожалуйста, попробуйте позже.</p>";
    }

  } else{
    exit();
  }
} 

    else {
    exit();
    }
?>