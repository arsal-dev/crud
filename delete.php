<?php 

    include('./db_connect.php');

    $id = $_GET['id'];
    
    $sql = "DELETE FROM users WHERE id = $id";
    $conn->query($sql);


    header("Location: index.php");
?>