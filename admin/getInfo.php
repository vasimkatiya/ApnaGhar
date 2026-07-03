<?php

session_start();

if(!isset($_SESSION['user_id'])){
    echo "<script>alert('Unauthorized !.');</script> ";
}

require 'db.php';

$users = mysqli_query($conn,"SELECT COUNT(*) FROM users WHERE role='user' ;");

$properties = mysqli_query($conn,"SELECT COUNT(*) FROM properties ;");

$inquiry = mysqli_query($conn,"SELECT COUNT(*) FROM inquiries ;");

echo json_encode([
    'users' => mysqli_fetch_assoc($users),
    'properties' => mysqli_fetch_assoc($properties),
    'inquiries' => mysqli_fetch_assoc($inquiry),
]);

?>