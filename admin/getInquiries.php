<?php

require 'db.php';

session_start();

header("Content-Type: application/json");

if (!isset($_SESSION['admin_id'])) {
    http_response_code(401);

    echo json_encode([
        "error" => "Unauthorized"
    ]);

    exit();
}

$sql = "
    SELECT 
        i.message,
        i.id,
        i.created_at AS date,
        u.name,
        u.phone,
        u.email,
        p.title AS property_title,
        p.owner_phone AS ophone,
        l.name AS location
    FROM inquiries i
    JOIN users u ON i.user_id = u.id
    JOIN properties p ON i.property_id = p.id
    JOIN locations l ON l.id = p.location_id
";

$result = mysqli_query($conn, $sql);

if ($result === false) {
    http_response_code(500);

    echo json_encode([
        "error" => mysqli_error($conn)
    ]);

    exit();
}

$inquiries = [];

while ($row = mysqli_fetch_assoc($result)) {
    $inquiries[] = $row;
}

echo json_encode($inquiries);

exit();
?>