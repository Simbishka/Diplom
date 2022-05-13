<?php

session_start();
require '../vendor/connect.php';
if (!$_SESSION['user']) {
    header('Location: /');
}
$id = $_GET['id'];
$uid = $_SESSION['user']['id'];
$id_article = $_POST ['id_article'];

if ($_POST['like']){
  $q = mysqli_query($connect, "SELECT * FROM likes WHERE id_user='$uid' AND id_article = '$id_article'");
  $r = mysqli_fetch_array($q);
  if($r['id'] == 0 OR $q==false){
    $q2 = mysqli_query($connect, "INSERT INTO likes SET id_user='$uid',id_article='$id_article'");
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
  else {
    print "Неуспешно";
  }
}

if ($_POST['dislike']){
  $q1 = mysqli_query($connect, "SELECT * FROM likes WHERE id_user='$uid' AND id_article = '$id_article'");
  $r1 = mysqli_fetch_array($q1);
  if($r['id'] == 1 OR $q1==true){
    $q3 = mysqli_query($connect, "DELETE FROM likes WHERE id_user='$uid' AND id_article='$id_article'");
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    
  }
  else {
    print "Не удалено";
  }
}


?>

