<?php

include '../crud.php';

$result = $get->read('users');

echo json_encode($result);
