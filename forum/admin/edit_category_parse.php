<?php
 session_start();
 if($_SESSION['user'] == ""){
   header("Location: /");
   exit();
 }
 if (isset($_POST['category_edit_submit'])) {
   if(($_POST['category_edit_title'] == "") && ($_POST['category_edit_content'] == "")) {
     echo "Вы не заполнили оба поля. Пожалуйста, вернитесь на предыдущую страницу";
     exit();
   }

   else{
     require '../../vendor/connect.php';
     $cid = $_POST['cid'];
     $id = $_POST['id'];
     $title = $_POST['category_edit_title'];
     $content = $_POST['category_edit_content'];
     $creator = $_SESSION['user']['full_name'];

     $sql = "UPDATE categories SET category_title = '".$title."', category_description = '".$content."', last_post_date= now() WHERE id = '".$cid."' LIMIT 1"; 

     $res = mysqli_query($connect, $sql) or die (mysqli_error($connect));


     if(($res)) {
       header("Location: admin.php");
       
     }

     else {
       echo "Возникла проблема с созданием вашей темы. Пожалуйста, попробуйте снова";
     }

     
   }
 }
?>