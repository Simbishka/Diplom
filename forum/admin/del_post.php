<?php
session_start();
require '../../vendor/connect.php';
$id = $_GET['id'];




// sql to delete a record
$sql = "DELETE FROM posts WHERE id = $id"; 

if (mysqli_query($connect, $sql)) {
    mysqli_close($connect);
    header('Location: admin.php'); 
    exit;
} else {
    echo "Error deleting record";
}
?>