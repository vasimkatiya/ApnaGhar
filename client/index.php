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
    <title>ApnaGhar</title>
    <link rel="stylesheet" href="./css/navbar.css">

    <style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

main{
    background:#f5f5f5;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    min-height:50vh;
}

main > .about-con{
    margin-top: 6rem;
}

.carousel{
    width:100%;
    max-width:100vw;
    background: #eeeeee;
    position:relative;
    overflow:hidden;
    border-radius:12px;
    box-shadow:0 10px 20px rgba(0,0,0,.2);
}



.slides{
    display:flex;
    transition:transform .5s ease-in-out;
}

.slides img{
    width:100%;
    flex-shrink:0;
    height:500px;
    object-fit:cover;
}

body{
    background-color:#eeeeee;
}


button{
    position:absolute;
    top:50%;
    transform:translateY(-50%);
    background:rgba(0,0,0,.5);
    color:white;
    border:none;
    width:45px;
    height:45px;
    border-radius:50%;
    cursor:pointer;
    font-size:24px;
}

button:hover{
    background:black;
}

.prev{
    left:15px;
}

.next{
    right:15px;
}


.dots{
    position:absolute;
    bottom:20px;
    width:100%;
    display:flex;
    justify-content:center;
    gap:10px;
}

.dot{
    width:12px;
    height:12px;
    border-radius:50%;
    background:#bbb;
    cursor:pointer;
}

.dot.active{
    background:white;
}



@media(max-width:768px){

    .slides img{
        height:300px;
    }

}


.footer{
    background:#1f2937;
    color:#fff;
    margin-top:60px;
}

.footer-container{
    width:90%;
    max-width:1200px;
    margin:auto;
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:35px;
    padding:50px 0;
}

.footer-box h3{
    margin-bottom:18px;
    color:#eeeeee;
    font-size:22px;
}

.footer-box p{
    color:#d1d5db;
    line-height:1.8;
    font-size:15px;
}

.footer-box ul{
    list-style:none;
    padding:0;
}

.footer-box ul li{
    margin-bottom:12px;
}

.footer-box ul li a{
    text-decoration:none;
    color:#d1d5db;
    transition:.3s;
}

.footer-box ul li a:hover{
    color:#facc15;
    padding-left:6px;
}

.footer-bottom{
    border-top:1px solid rgba(255,255,255,.15);
    text-align:center;
    padding:18px;
    color:#d1d5db;
    font-size:14px;
}


@media(max-width:768px){

    .footer-container{
        text-align:center;
    }

    .footer-box ul li a:hover{
        padding-left:0;
    }

}

</style>

<link rel="stylesheet" href="./css/index.css">
<link rel="stylesheet" href="./css/slide.css">
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


    <main>

        
        <div class="carousel">
            
            <div class="slides">
                
                <img src="./assets/img.jpeg" alt="">
                <img src="./assets/img2.jpeg" alt="">
                <img src="./assets/img3.jpeg" alt="">
                <img src="./assets/img4.jpeg" alt="">
                <img src="./assets/img5.jpeg" alt="">
                <img src="./assets/img6.jpeg" alt="">
                
            </div>
            
            <button class="prev">&#10094;</button>
            <button class="next">&#10095;</button>
            
            <div class="dots"></div>
            
        </div>

        <!-- tagline -->

        <div class="line">
            <h2>Apna<span>Ghar</span></h2>
            <p>
                
                Your Trusted Property Partner.
               
            </p>
        </div>

        <div class="about-con">
            <h3>about us</h3>
            <p>
                <span>ApnaGhar</span> is your trusted platform for finding comfortable and affordable places to stay. We help users discover PG accommodations, hostels, rental rooms, apartments, flats, and houses in their preferred locations.
            </p>

            <p>
                Our goal is to make property searching simple by providing detailed listings, easy search options, and a convenient way to connect with property owners. Whether you're a student, working professional, or family, ApnaGhar helps you find the right place that suits your needs and budget.
            </p>

        </div>
        <div class="serv">
            <h2>Services</h2>
            <div class="con"></div>
        </div>

        <section class="feedback-section">
    <h2>What Our Users Say</h2>

    <div class="slider">
        <div class="slide">

            <div class="card">
                <h3>Rahul Sharma</h3>
                <p>
                    ApnaGhar made finding a PG incredibly easy. I found a clean
                    and affordable place within a day. Highly recommended!
                </p>
            </div>

            <div class="card">
                <h3>Priya Patel</h3>
                <p>
                    The property listings were genuine and easy to browse.
                    I quickly found a rental room near my workplace.
                </p>
            </div>

            <div class="card">
                <h3>Amit Verma</h3>
                <p>
                    I loved how simple the platform is. Contacting property
                    owners was fast and hassle-free.
                </p>
            </div>

            <div class="card">
                <h3>Neha Joshi</h3>
                <p>
                    Thanks to ApnaGhar, I found a comfortable apartment that
                    perfectly fits my budget. Great experience!
                </p>
            </div>

        </div>
    </div>
</section>

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
</body>
<script src="./js/slide.js"></script>
<script>

const slides = document.querySelector(".slides");
const images = document.querySelectorAll(".slides img");
const prev = document.querySelector(".prev");
const next = document.querySelector(".next");
const dotsContainer = document.querySelector(".dots");

let index = 0;

// Create dots
images.forEach((_, i) => {

    const dot = document.createElement("div");
    dot.classList.add("dot");

    if(i === 0){
        dot.classList.add("active");
    }

    dot.addEventListener("click", () => {
        index = i;
        updateCarousel();
    });

    dotsContainer.appendChild(dot);

});

const dots = document.querySelectorAll(".dot");

function updateCarousel(){

    slides.style.transform = `translateX(-${index * 100}%)`;

    dots.forEach(dot => dot.classList.remove("active"));
    dots[index].classList.add("active");

}

next.addEventListener("click", () => {

    index++;

    if(index >= images.length){
        index = 0;
    }

    updateCarousel();

});

prev.addEventListener("click", () => {

    index--;

    if(index < 0){
        index = images.length - 1;
    }

    updateCarousel();

});

// Auto Slide

setInterval(() => {

    index++;

    if(index >= images.length){
        index = 0;
    }

    updateCarousel();

}, 3000);

</script>

<script>
    
</script>
<script src="./js/index.js"></script>
<script src="./js/nav.js"></script>
</html>