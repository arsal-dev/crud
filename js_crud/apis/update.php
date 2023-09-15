<?php

include '../crud.php';

$id = $_GET['id'];
$name = $_GET['name'];
$email = $_GET['email'];
$password = $_GET['password'];

$myAssoc = ['name' => $name, 'email' => $email, 'password' => $password];

$result = $get->update('users', $myAssoc, $id);

echo json_encode($result);
