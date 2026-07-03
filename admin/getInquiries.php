<?php

require 'db.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$result = mysqli_query($conn, "select i.message , i.id,i.created_at as date ,u.name , u.email , p.title as property_title from inquiries i join users u on i.user_id = u.id join properties p on i.property_id = p.id");

$inquiries = [];

while ($row = mysqli_fetch_assoc($result)) {
    $inquiries[] = $row;
}

echo json_encode($inquiries);

?>