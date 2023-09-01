<?php 

    $host = 'localhost';
    $username = 'root';
    $password = "";
    $db_name = "login";


    $conn = new mysqli($host, $username, $password, $db_name);

    if($conn->connect_error){
        echo "Error could not connect to the database";
    }

?>