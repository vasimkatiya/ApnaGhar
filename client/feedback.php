<?php

    session_start();
    if(!isset($_SESSION['user_id']))
        {
            header('Location:home.php');
            exit();
        }


require 'db.php';

mysqli_query($conn,"CREATE TABLE IF NOT EXISTS feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,

    name VARCHAR(100) NOT NULL,

    email VARCHAR(255) NOT NULL UNIQUE,

    message TEXT NOT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ApnaGhar-Home</title>
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/form.css">
</head>
<body>
    <div class="navbar">

        <header>
            <div class="logo">
            <h3><span>Apna</span><span>Ghar</span></h3>
        </div>
        <div class="search">
            <form action="" class='search-form' method="get">
                <input type="text" name='search' placeholder='search location...' class="search">
                <button type="submit"><img src="./assets/search.png" alt=""></button>
            </form>
        </div>
        <div class="menu">
            <img src="./assets/wmenu.png" alt="">
        </div>
        <nav>
            <ul>
                <li><a href="home.php">home</a></li>
                <li><a href="rent.php">rent</a></li>
                <li><a href="sale.php">sale</a></li>
                <li><a href="feedback.php">feedback</a></li>
                <li><a href="profile.php">profile</a></li>
            </ul>
        </nav>
    </header>
</div>
    <!-- main section -->

    <main>
        <h2>give feedback</h2>

        <div class="form-con">
            <form action="" method="post" >
                <input type="text" required placeholder='Full Name' name="name" class="name">
                <input type="email" name="email" placeHolder="example@email.com" required id="">
                <textarea name="message" required placeholder="feedback message.." id=""></textarea>
                <button type="submit">send</button>
            </form>
        </div>

    </main>
        <footer class="footer">
    <div class="footer-container">

        <div class="footer-box">
            <h3>ApnaGhar</h3>
            <p>
                Your trusted platform for finding PGs, hostels, flats,
                apartments, rental rooms, and houses at affordable prices.
            </p>
        </div>

        <div class="footer-box">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="rent.php">Rent</a></li>
                <li><a href="sale.php">sale</a></li>
                <li><a href="feedback.php">Feedback</a></li>
                <li><a href="profile.php">Profile</a></li>
            </ul>
        </div>

        <div class="footer-box">
            <h3>Services</h3>
            <ul>
                <li>PG</li>
                <li>Hostel</li>
                <li>Rental Rooms</li>
                <li>Flats & Apartments</li>
                <li>Houses</li>
            </ul>
        </div>

        <div class="footer-box">
            <h3>Contact</h3>
            <p>Email: vasimkatiya97@gmail.com</p>
            <p>Phone: +91 8849291780</p>
            <p>Surendranagar, Gujarat</p>
        </div>

    </div>

    <div class="footer-bottom">
        <p>&copy; <?php echo date("Y"); ?> ApnaGhar. All Rights Reserved.</p>
    </div>
</footer>
   <?php

     if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $name = $_POST['name'];
        $msg = $_POST['message'];

        $res = mysqli_query($conn, "INSERT INTO feedback (name,email,message) VALUES('$name','$email','$msg');");

        if($res){
           
            echo '<script>alert("feedback send successfully..")</script>';
                        header('Location:home.php');
        
        }else{
            echo '<script>alert("email are already exists or feedback failed.")</script>';
            header('Location:feedback.php');
            exit();
        }

}
   ?>

</body>
<script src="./js/search.js"></script>
<script src="./js/navbar.js"></script>
</html>