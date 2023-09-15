<?php

include '../crud.php';

$id = $_GET['id'];
$name = $_GET['name'];
$email = $_GET['email'];
$password = $_GET['password'];

$assoc_arr = ['name' => $name, 'email' => $email, 'password' => $password];

$result = $get->update('users', $assoc_arr, $id);

echo json_encode($result);
