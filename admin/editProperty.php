<?php

require 'db.php';

session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit();
}

$result = mysqli_query($conn,"select * from properties where id = " . $_GET['id']);
$property = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ApnaGhar-Edit Property</title>
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/addpro.css">

    <style>
        .con{
            padding: 3rem;
            display: flex;
            justify-content: center;
            align-items:center;
        }

        h2{
            margin-top: 2rem;
            color:white;
            text-align:center;
        }

        form{
            width: 60vw;
            padding:2rem;
            border-radius:2rem;
            background-color:#fff;
            box-shadow: 0 10px 20px rgba(0,0,0,.1);
        }

        @media (max-width:800px) {
            form{
                width: 95vw;
            }
        }

    </style>

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
    <h2>Edit Property</h2>
    <div class="con">
            <form action="" method="post" enctype="multipart/form-data">
        <!-- title -->
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="<?php echo $property['title']; ?>" required>
        </div>
        <!-- description -->
        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description" required><?php echo $property['description']; ?></textarea>
        </div>

        <!-- img_url -->
        <div>
            <label for="img_url">Image URL:</label>
           <input type="file" value="<?php echo $property['img_url']; ?>" name="img" id="img_url" required>
        </div>

        <!-- price -->
        <div>
            <label for="price">Price:</label>
            <input type="number" value="<?php echo $property['price']; ?>" name="price" id="price" step="0.01" required>
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

        <div>
            <label for="type">type</label>
            <select name="type" id="">
                <option value="rent">rent</option>
                <option value="sale">sale</option>
            </select>
        </div>

        <div>
            <label for="address">Address:</label>
            <textarea name="address" id="address" required><?php echo $property['address']; ?></textarea>
        </div>
        <div>
            <label for="owner_name">Owner Name:</label>
            <input type="text" name="owner_name" id="owner_name" value="<?php echo $property['owner_name']; ?>" required>
        </div>
        <div>
            <label for="owner_email">Owner Email:</label>
            <input type="email" name="owner_email" id="owner_email" value="<?php echo $property['owner_email']; ?>" required>
        </div>
        <div>
            <label for="owner_phone">Owner Phone:</label>
            <input type="tel" name="owner_phone" id="owner_phone" value="<?php echo $property['owner_phone']; ?>" required>
        </div>
        <button type="submit">Edit Property</button>
    </form>
    </div>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $location_id = $_POST['location'];
        $address = $_POST['address'];
        $type = $_POST['type'];
        $owner_name = $_POST['owner_name'];
        $owner_email = $_POST['owner_email'];
        $owner_phone = $_POST['owner_phone'];
        $id = $_GET['id'];
        $img_url = $property['img_url'];

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

    mysqli_query($conn,"UPDATE properties SET
    title = '$title',
    description = '$description',
    img_url = '$img_url',
    price = '$price',
    location_id = '$location_id',
    type = '$type',
    address = '$address',
    owner_name = '$owner_name',
    owner_email = '$owner_email',
    owner_phone = '$owner_phone'
WHERE id = '$id'
");

        echo "<script>alert('Property updated successfully!'); window.location.href='viewProperties.php';</script>";


    }

    ?>
</body>
<script src='./js/nav.js' ></script>
</html>