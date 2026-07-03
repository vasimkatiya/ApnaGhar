<?php 

require 'db.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_query($conn, "DELETE FROM users WHERE id = " . $_GET['id']);

header("Location: manageUsers.php");
exit();

?>