<?php

require 'db.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/manageuser.css">
</head>
<body>
    <header>
        <h4 class="admin-title"><a href="admin.php"><span>ApnaGhar</span><span> Admin Panel</span></a></h4>
        <div class="menu-icon">
            <img src="./assets/menu.png" alt="Menu Icon">
        </div>
        <nav>
            <ul class="nav1">
                <li><a href="addProperty.php">Add Property</a></li>
                <li><a href="viewProperties.php">View Properties</a></li>
                <li><a href="manageUsers.php">Manage Users</a></li>
                <li><a href="viewInquires.php">View Inquiries</a></li>
                <li><a href="viewFeed.php">View Feedbacks</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
            <ul class="nav2">
                <li><a href="addProperty.php">Add Property</a></li>
                <li><a href="viewProperties.php">View Properties</a></li>
                <li><a href="manageUsers.php">Manage Users</a></li>
                <li><a href="viewInquires.php">View Inquiries</a></li>
                <li><a href="viewFeed.php">View Feedbacks</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Manage Users</h1>
        <div class="con">
        </div>
    </main>
</body>
<script src='./js/nav.js' ></script>
<script src="./js/getUsers.js"></script>
</html>