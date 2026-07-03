<?php

require 'db.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}


$sql = "SELECT * FROM users WHERE role != 'admin'";
$result = mysqli_query($conn, $sql);

$users = [];
while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
}

echo json_encode($users);


?>