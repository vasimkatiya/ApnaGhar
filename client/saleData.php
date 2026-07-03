<?php

require './db.php';

$res = mysqli_query($conn,"
SELECT
    p.id,
    p.title,
    p.description,
    p.price,
    p.address,
    p.type,
    p.owner_name,
    p.owner_email,
    p.owner_phone,
    p.img_url,
    p.created_at,
    l.name AS location_name
FROM properties p
INNER JOIN locations l
ON p.location_id = l.id WHERE p.type = 'sale'
");

$data = [];

while ($row = mysqli_fetch_assoc($res)) {
    $data[] = $row;
}


echo json_encode($data);
?>