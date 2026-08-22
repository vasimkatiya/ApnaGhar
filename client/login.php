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
    <title>ApnaGhar-login</title>
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
                <li><a href="index.php">Home</a></li>
               <li><a href="signup.php">Signup</a></li>
               <li><a href="login.php">Login</a></li>
            </ul>
            <ul class="nav2">
                <li><a href="index.php">Home</a></li>
                <li><a href="signup.php">Signup</a></li>
               <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>
    <!-- form login -->

     <main>
        <div class="con">
            <div class="part1">
                <div class="over"></div>
                <h3>welcome agin !</h3>
                <h2>login</h2>
                <p>enter registered email and password.</p>
                <p>and start exploring.</p>
            </div>
            <div class="part2">
                <form action="" method='post'>
                    <input type="email" required name='email' placeholder='email' >
                    <input type="password" required name='password' placeholder='password'minlength='6' >
                    <button type="submit">login</button>
                </form>
            </div>
        </div>
    </main>

   <?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query(
        $conn,
        "SELECT * FROM users WHERE email = '$email' AND role != 'admin'"
    );

    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['phone'] = $user['phone'];
        $_SESSION['email'] = $user['email'];

        echo '<script>
                alert("Login successful!");
                window.location.href = "home.php";
              </script>';
        exit();

    } else {

        echo '<script>
                alert("Email or password is incorrect!");
                window.location.href = "login.php";
              </script>';
        exit();
    }
}
?>

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

</body>
<script src="./js/nav.js"></script>
</html>