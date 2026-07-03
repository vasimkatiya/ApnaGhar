<?php

    require 'db.php';

    $id = $_GET['id'];


    $result = mysqli_query($conn,"SELECT
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
ON p.location_id = l.id WHERE p.id = '$id'
");

$property = mysqli_fetch_assoc($result);


echo json_encode($property);



?>