<?php

include '../crud.php';

$id = $_GET['id'];

$result = $get->delete('users', $id);

echo json_encode($result);
