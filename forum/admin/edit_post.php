<?php
session_start();
require '../../vendor/connect.php';
$id = $_POST['id'];
$content = $_POST['reply_content_admin'];
$creator = $_SESSION['user']['full_name'];
$avatar = $_SESSION['user']['avatar'];
$cid = $_POST['cid'];
$tid = $_POST['tid'];
$title = $_POST['topic_title'];



$sql = "INSERT INTO posts (category_id, topic_id, post_creator, post_content, post_date, avatar) VALUES ('".$cid."', '".$tid."', '".$creator."', '".$content."', now(), '".$avatar."')"; 
$res = mysqli_query($connect, $sql) or die (mysqli_error($connect));

$sql2 = "UPDATE topics SET topic_last_user = '".$creator."' WHERE category_id = '".$cid."' AND id = '".$tid."'";
$res2 = mysqli_query($connect, $sql2) or die (mysqli_error($connect));

if (($res) && ($res2)) {
    mysqli_close($connect);
    header('Location: admin.php'); 
    exit;
} else {
    echo "Error editing record";
}
?>
