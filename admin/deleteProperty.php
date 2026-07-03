<?php

require 'db.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

mysqli_query($conn, "DELETE FROM properties WHERE id = " . $_GET['id']);

header("Location: viewProperties.php");
exit();
?>