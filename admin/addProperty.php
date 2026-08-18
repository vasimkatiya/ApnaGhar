<?php

require 'db.php';

session_start();


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit();
}


mysqli_query($conn, "CREATE TABLE IF NOT EXISTS locations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);");

$qry = "INSERT INTO locations (name) VALUES
('Ahmedabad'),
('Surat'),
('Vadodara'),
('Rajkot'),
('Bhavnagar'),
('Jamnagar'),
('Junagadh'),
('Gandhinagar'),
('Anand'),
('Nadiad'),
('Surendranagar'),
('Morbi'),
('Mehsana'),
('Patan'),
('Palanpur'),
('Bharuch'),
('Navsari'),
('Valsad'),
('Vapi'),
('Godhra'),
('Dahod'),
('Porbandar'),
('Veraval'),
('Amreli'),
('Botad'),
('Bhuj'),
('Gandhidham'),
('Mundra'),
('Anjar'),
('Keshod'),
('Jetpur'),
('Kalol'),
('Himmatnagar'),
('Modasa'),
('Deesa'),
('Dholka'),
('Sanand'),
('Mahuva'),
('Una'),
('Vyara'),
('Bardoli'),
('Wankaner'),
('Halol'),
('Mansa'),
('Visnagar'),
('Kadi'),
('Mandvi'),
('Dwarka'),
('Somnath'),
('Khambhat'),
('Lunawada'),
('Rajpipla'),
('Chhota Udepur');";

$result = mysqli_query($conn, $qry);

mysqli_query($conn, "CREATE TABLE IF NOT EXISTS properties (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    location_id INT NOT NULL,
    type ENUM('rent', 'sale') NOT NULL,
    address TEXT NOT NULL,
    owner_name VARCHAR(255) NOT NULL,
    owner_email VARCHAR(255) NOT NULL,
    owner_phone VARCHAR(20) NOT NULL,
    img_url VARCHAR(500) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_property_location
        FOREIGN KEY (location_id)
        REFERENCES locations(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/addpro.css">
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
    <div class="form-con">

        <h1>Add Property</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div>
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" required>
            </div>
            <!-- description -->
            <div>
                <label for="description">Description:</label>
                <textarea name="description" id="description" required></textarea>
            </div>
            
            <!-- img_url -->
            <div>
                <label for="img_url">Image URL:</label>
                <input type="file" name="img" id="img_url" required>
            </div>
            
            <!-- price -->
            <div>
                <label for="price">Price:</label>
                <input type="tel" name="price" id="price" step="0.01" required>
            </div>
            
            <!-- location -->
            <div>
                <label for="location">Location:</label>
            <select name="location" id="location" required>
                <option value="">Select Location</option>
                <?php
                $location_query = "SELECT * FROM locations";
                $location_result = mysqli_query($conn, $location_query);
                while ($location = mysqli_fetch_assoc($location_result)) {
                    echo "<option value='" . $location['id'] . "'>" . $location['name'] . "</option>";
                    }
                    ?>
            </select>
        </div>
        
        <!-- type of property -->
        
        <div>
            <label for="type">type</label>
            <select name="type" id="">
                <option value="rent">rent</option>
                <option value="sale">sale</option>
            </select>
        </div>
        
        <div>
            <label for="address">Address:</label>
            <textarea name="address" id="address" required></textarea>
        </div>
        <div>
            <label for="owner_name">Owner Name:</label>
            <input type="text" name="owner_name" id="owner_name" required>
        </div>
        <div>
            <label for="owner_email">Owner Email:</label>
            <input type="email" name="owner_email" id="owner_email" required>
        </div>
        <div>
            <label for="owner_phone">Owner Phone:</label>
            <input type="tel" name="owner_phone" id="owner_phone" required>
        </div>
        <button type="submit">Add Property</button>
    </form>
</div>
    
    <!-- INSERT INTO properties ( title, description, price, location_id, address, owner_name, owner_email, owner_phone, img_url ) VALUES ( 'Boys PG Near University', 'Fully furnished PG with WiFi', 7000.00, 1, 'Navrangpura, Ahmedabad', 'John Doe', 'john@example.com', '9876543210', 'https://example.com/uploads/pg1.jpg' ); -->
    
    <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $location_id = $_POST['location'];
    $address = $_POST['address'];
    $proType = $_POST['type'];
    $owner_name = $_POST['owner_name'];
    $owner_email = $_POST['owner_email'];
    $owner_phone = $_POST['owner_phone'];
    
    
    // Create uploads directory if it doesn't exist
    $uploadDir = "../uploads/";
    
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    
    if (isset($_FILES['img']) && $_FILES['img']['error'] === 0) {
        
        $fileName = $_FILES['img']['name'];
        $tmpName  = $_FILES['img']['tmp_name'];
        $fileSize = $_FILES['img']['size'];

        // Get file extension
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Allowed image types
        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        
        if (!in_array($fileExt, $allowed)) {
            die("Only JPG, JPEG, PNG, GIF and WEBP files are allowed.");
            }
            
            // Generate unique filename
            $newFileName = time() . "_" . uniqid() . "." . $fileExt;

        $targetFile = $uploadDir . $newFileName;

        if (move_uploaded_file($tmpName, $targetFile)) {
            $img_url = $targetFile; // Save path in database
        } else {
            die("Failed to upload image.");
        }

    } else {
        die("Please select an image.");
    }

    // Insert property into database
    $insert_query = "INSERT INTO properties (title, description, price, location_id,type, address, owner_name, owner_email, owner_phone, img_url) VALUES ('$title', '$description', '$price', '$location_id','$proType', '$address', '$owner_name', '$owner_email', '$owner_phone', '$img_url')";
    
    if (mysqli_query($conn, $insert_query)) {
        echo "<script>alert('Property added successfully!');
                window.location.href='viewProperties.php';
        </script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
            }
            }

?>
</body>
<script src='./js/nav.js' ></script>
</html>