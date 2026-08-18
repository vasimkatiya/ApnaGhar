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
                <li><a href="myinquiries.php">inquiries</a></li>
                <li><a href="feedback.php">feedback</a></li>
                <li><a href="profile.php">profile</a></li>
            </ul>
        </nav>
    </header>
</div>
    <!-- main section -->

    <main>
        
        <h2>edit profile</h2>
        <div class="form-con">
           <form class='form' action="" method='post' >
            <input type="text" required name="name" placeholder='update Name' id="">
            <input type="email" name="email" placeholder='example@email.com'  required id="">
            <input type="tel" name="phone" required placeholder='88492XXXXX' id="">
            <input type="password" name="password" required minlength='6' placeholder='update password' id="">
            <div class="btns">
                <button type="submit" class="edit">edit</button>
                <button onclick="close()" class="close">colse</button>
            </div>
           </form>
        </div>

    </main>

<?php

 require 'db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        $user_id = $_SESSION['user_id'];

        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        $result = mysqli_query($conn,"UPDATE users
              SET
                  name='$name',
                  email='$email',
                  phone='$phone',
                  password='$hashPassword',
                  cpassword='$password'
              WHERE id='$user_id'");

       if(!$result)
        {
            echo '<script>alert("profile edit failed !!!")</script>';
            header('Location:profile.php');
            exit();
        }
            $_SESSION['name'] = $name;
            $_SESSION['phone'] = $phone;
            $_SESSION['email'] = $email;
        echo '<script>alert("profile edit successfully. !!!")</script>';
        header('Location:profile.php');

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
<script src="./js/editProfile.js"></script>
<script src="./js/search.js"></script>
<script src="./js/navbar.js"></script>
</html>