<?php

require 'db.php';

session_start();
if (isset($_SESSION['admin_id'])) {
    header("Location: admin.php");
    exit();
}


mysqli_query($conn, "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(20) UNIQUE,
    password VARCHAR(255) NOT NULL,
    cpassword VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
    <h1>Admin Panel Login</h1>
    <main>
        <div class="form-con">
           <form action="" method="post">
             <div class="email">
                <label for="email">Email:</label>
                <input type="email" required name="email" id="email" placeholder="Enter your email">
            </div>
            <div class="password">
                <label for="password">Password:</label>
                <input type="password" minlength="6" maxlength="10" required name="password" id="password" placeholder="Enter your password">
            </div>
            <button type="submit">login</button>
           </form>
        </div>
    </main>
</body>
<script src="./js/index.js"></script>
</script>
<?php

// session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users
            WHERE email='$email'
            AND password=SHA2('$password',256) and role='admin'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){

        $user = mysqli_fetch_assoc($result);

        $_SESSION['admin_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_role'] = $user['role'];

        header("Location: admin.php");
        exit();

    }else{

        echo "<script>alert('Invalid email or password');</script>";

    }
}
?>
</html>