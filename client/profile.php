<?php
    session_start();

    if(!isset($_SESSION['user_id']))
        {
            header('Location:home.php');
            exit();
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ApnaGhar-Home</title>
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/profile.css">
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
                <li><a href="myinquiries.php">inquiries</a></li>
                <li><a href="feedback.php">feedback</a></li>
                <li><a href="profile.php">profile</a></li>
            </ul>
        </nav>
    </header>
</div>
    <!-- main section -->

    <main>
        <div class="con">
            
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
                <li><a href="myinquiries.php">inquiries</a></li>
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

</body>
<script src="./js/profile.js"></script>
<script src="./js/search.js"></script>
<script src="./js/navbar.js"></script>
</html>