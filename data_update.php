<?php 

    include './db_connect.php';

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $id = $_POST['id'];



        $sql = "UPDATE users SET name='$name',email='$email',phone='$phone',password='$password' WHERE id = $id";

        if($conn->query($sql)){
            header('Location: index.php');
        }
        else {
            echo "Could Not Update the records";
        }

    }


?>