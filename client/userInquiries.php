<?php

require 'db.php';
session_start();

$user_id = $_SESSION['user_id'];

$sql = "
    SELECT 
        i.id as id,
        i.message AS inquiry,
        p.title AS property_title,
        l.name AS location
    FROM inquiries i
    JOIN properties p ON i.property_id = p.id
    JOIN locations l ON p.location_id = l.id
    WHERE i.user_id = $user_id
";

$result = mysqli_query($conn, $sql);

$inquiries = [];

while ($row = mysqli_fetch_assoc($result)) {
    $inquiries[] = $row;
}

header("Content-Type: application/json");

echo json_encode($inquiries);

?>