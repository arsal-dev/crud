<?php

include '../crud.php';

$allUsers = $get->read('users');

echo json_encode($allUsers);
