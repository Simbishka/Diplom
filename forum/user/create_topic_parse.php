<?php
 session_start();
 if($_SESSION['user'] == ""){
   header("Location: /");
   exit();
 }
 if (isset($_POST['topic_submit'])) {
   if(($_POST['topic_title'] == "") && ($_POST['topic_content'] == "")) {
     echo "Вы не заполнили оба поля. Пожалуйста, вернитесь на предыдущую страницу";
     exit();
   }

   else{
     require '../../vendor/connect.php';
     $cid = $_POST['cid'];
     $title = $_POST['topic_title'];
     $content = $_POST['topic_content'];
     $creator = $_SESSION['user']['full_name'];
     $avatar = $_SESSION['user']['avatar'];
   
     $sql = "INSERT INTO topics (category_id, topic_title, topic_creator, topic_date, topic_reply_date) VALUES ('".$cid."', '".$title."', '".$creator."', now(), now())";

     $res = mysqli_query($connect, $sql) or die(mysqli_error($connect));
     $new_topic_id = mysqli_insert_id($connect);

     $sql2 = "INSERT INTO posts (category_id, topic_id, post_creator, post_content, post_date, avatar) VALUES ('".$cid."', '".$new_topic_id."', '".$creator."', '".$content."', now(), '".$avatar."')";

     $res2 = mysqli_query($connect, $sql2) or die (mysqli_error($connect));

     $sql3 = "UPDATE categories SET last_post_date = now(), last_user_posted = '".$creator."' WHERE id = '".$cid."' LIMIT 1";

     $res3 = mysqli_query($connect, $sql3) or die (mysqli_error($connect));


     if(($res) && ($res2) && ($res3)) {
       header("Location: view_topic.php?cid=".$cid."&tid=".$new_topic_id);
       
     }

     else {
       echo "Возникла проблема с созданием вашей темы. Пожалуйста, попробуйте снова";
     }

     
   }
 }
?>