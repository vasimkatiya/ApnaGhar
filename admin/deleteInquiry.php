<?php

require 'db.php';

session_start();

if(!isset($_SESSION['user_id'])){
    echo "<script>alert('unauthorized')</script>"
    exit();
}

mysqli_query($conn,"DELETE FROM inquiries WHERE id = " . $_GET['id']);

header('Location:viewInquires.php');
exit();

?>