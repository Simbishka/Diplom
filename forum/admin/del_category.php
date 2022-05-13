<?php
session_start();
require '../../vendor/connect.php';
$id = $_GET['id'];


// sql to delete a record
$sql = "DELETE FROM categories WHERE id = $id"; 

if (mysqli_query($connect, $sql)) {
    mysqli_close($connect);
    header('Location: admin.php'); //If book.php is your main page where you list your all records
    exit;
} else {
    echo "Error deleting record";
}
?>
