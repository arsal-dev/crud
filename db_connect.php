<?php 
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'mydb';


    $conn = new mysqli($host, $username, $password, $database);

    if($conn->connect_error){
        echo $conn->connect_error;
    }
?>