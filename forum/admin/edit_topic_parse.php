<?php
 session_start();
 if($_SESSION['user'] == ""){
   header("Location: /");
   exit();
 }
 if (isset($_POST['topic_edit_submit'])) {
   if(($_POST['topic_title'] == "") && ($_POST['topic_content'] == "")) {
     echo "Вы не заполнили оба поля. Пожалуйста, вернитесь на предыдущую страницу";
     exit();
   }

   else{
     require '../../vendor/connect.php';
     
     $cid = $_POST['cid'];
     $tid = $_POST['tid'];
     $title = $_POST['topic_title'];
     $content = $_POST['topic_content'];
     

     $sql = "UPDATE topics SET topic_title = '".$title."', topic_date = now(), topic_reply_date = now() WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1";

     $res = mysqli_query($connect, $sql) or die(mysqli_error($connect));
     

     $sql2 = "UPDATE posts SET post_content = '".$content."', post_date = now() WHERE category_id='".$cid."' AND topic_id='".$tid."' LIMIT 1 ";

     $res2 = mysqli_query($connect, $sql2) or die (mysqli_error($connect));

     $sql3 = "UPDATE categories SET last_post_date = now() WHERE id = '".$cid."' LIMIT 1";

     $res3 = mysqli_query($connect, $sql3) or die (mysqli_error($connect));


     if(($res) && ($res2) && ($res3)) {
       header("Location: view_topic_admin.php?cid=".$cid."&tid=".$tid."");
       
     }

    

     else {
       echo "Возникла проблема с созданием вашей темы. Пожалуйста, попробуйте снова";
     }

     
   }
 }
?>
