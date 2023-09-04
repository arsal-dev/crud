<?php 
include "db_connect.php";
session_start();

if (isset($_POST["submit"]) && !empty($_POST["submit"])) {

$todo=$_POST["todo"];
$user_id=$_SESSION["user_id"];
    
$sql="INSERT INTO `todos`(`todo`, `user_id`) VALUES ('{$todo}','{$user_id}')";

$result= $conn->query($sql);

if ($result) {
    echo "<script> 
    alert('data has been inserted')
    </script>";

    header("Refresh:0,url=index.php");
}
else{
    echo "Error In Insertion";

    header("Refresh:0,url=index.php");
    
}


}




?>


