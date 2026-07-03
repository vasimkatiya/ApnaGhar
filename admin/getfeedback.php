<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location:index.php');
    exit();
}

header('Content-Type: application/json');

require 'db.php';

$res = mysqli_query($conn, "SELECT * FROM feedback");

$data = [];

while ($row = mysqli_fetch_assoc($res)) {
    $data[] = $row;
}

echo json_encode($data);

?>