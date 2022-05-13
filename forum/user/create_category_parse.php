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

   else{
     require '../../vendor/connect.php';
     $cid = $_POST['cid'];
     $title = $_POST['category_title'];
     $description = $_POST['category_content'];
     $creator = $_SESSION['user']['full_name'];

     $sql = "INSERT INTO categories (category_title, category_description, last_post_date, last_user_posted) VALUES ('".$title."', '".$description."', now(), '".$creator."' )";

     $res = mysqli_query($connect, $sql) or die(mysqli_error($connect));
     

     if($res){
       header("Location: profile.php");
     }

     else {
       echo "Возникла проблема с созданием вашего раздела. Пожалуйста, попробуйте снова";
     }

     
   }
 }
?>