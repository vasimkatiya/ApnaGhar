<?php
        session_start();
    if(isset($_SESSION['user_id']))
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
    <title>ApnaGhar-signup</title>
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/authform.css">
</head>
<body>
<header>
        <h4 class="admin-title"><a href="admin.php">Apna<span>Ghar</span></a></h4>
        <div class="menu-icon">
            <img src="./assets/wmenu.png" alt="Menu Icon">
        </div>
        <nav>
            <ul class="nav1">
               <li><a href="signup.php">Signup</a></li>
               <li><a href="login.php">Login</a></li>
            </ul>
            <ul class="nav2">
                <li><a href="signup.php">Signup</a></li>
               <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="con">
            <div class="part1">
                <div class="over"></div>
                <h3>welcome</h3>
                <h2>sign-up</h2>
                <p>enter your details and create your account.</p>
            </div>
            <div class="part2">
                <form action="" method='post'>
                    <input type="text" required name="name" placeholder='Enter Name' id="">
                    <input type="email" required name='email' placeholder='enter email' >
                    <input type="tel" name="phone" required maxlength='12' minlength='10' placeholder='88492XXXXX' id="">
                    <input type="password" required name='password' placeholder='create password'minlength='6' >
                    <button type="submit">sign up</button>
                </form>
            </div>
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
                <li><a href="signup.php">Signup</a></li>
                <li><a href="login.php">Login</a></li>
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
    require 'db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];


        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        $result = mysqli_query($conn,"INSERT INTO users (name,email,phone,password,cpassword) VALUES ('$name','$email','$phone','$hashPassword','$password');");

       if(!$result)
        {
            echo '<script>alert("registration failed !!!")</script>';
            header('Location:signup.php');
            exit();
        }
        echo '<script>alert("user register successfully. !!!")</script>';
        header('Location:login.php');

    }

    ?>
</body>
<script src="./js/nav.js"></script>
</html>