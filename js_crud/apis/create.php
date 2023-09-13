<?php

include '../crud.php';

$json_data = file_get_contents('php://input');

$data = json_decode($json_data, true);

$result = $get->create('users', $data);

if ($result != false) {
    echo json_encode($result);
} else {
    echo json_encode(['status' => 400, 'result' => 'Something Went Wrong!']);
}
