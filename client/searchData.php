<?php

require 'db.php';

$search = $_GET['search'];

$sql = "SELECT
            p.id,
            p.title,
            p.description,
            p.price,
            p.address,
            p.owner_name,
            p.owner_email,
            p.owner_phone,
            p.img_url,
            p.created_at,
            l.name AS location_name
        FROM properties p
        INNER JOIN locations l
        ON p.location_id = l.id
        WHERE l.name LIKE '%$search%'";

$result = mysqli_query($conn, $sql);

$properties = [];

while ($row = mysqli_fetch_assoc($result)) {
    $properties[] = $row;
}

echo json_encode($properties);

?>