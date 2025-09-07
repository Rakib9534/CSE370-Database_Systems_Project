<?php
require_once("DBConnect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home - Travel Management System</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            min-height: 100vh;
            background-color: black;
            color: white;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.6);
        }

        /* 🔹 Transparent Bar */
        .button-bar {
            position: absolute;
            top: 20px;
            left: 20px;
            right: 20px;
            background: rgba(0, 0, 0, 0.4);
            padding: 12px 20px;
            border-radius: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0px 4px 8px rgba(0,0,0,0.4);
            z-index: 10;
        }

        .site-name {
            font-size: 22px;
            font-weight: bold;
            letter-spacing: 1px;
            color: #fff;
        }

        .button-group {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .button-group .dropdown-btn, 
        .button-group a {
            padding: 10px 18px;
            background: rgba(0, 0, 0, 0.55);
            color: #fff;
            font-weight: bold;
            text-decoration: none;
            border-radius: 25px;
            box-shadow: 0px 3px 6px rgba(0,0,0,0.3);
            transition: 0.3s;
            position: relative;
        }

        .button-group .dropdown-btn:hover, 
        .button-group a:hover {
            background: rgba(0, 0, 0, 0.7);
            transform: scale(1.05);
        }

        .dropdown-content {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background: rgba(0,0,0,0.55);
            min-width: 160px;
            border-radius: 10px;
            flex-direction: column;
            padding: 5px 0;
            box-shadow: 0px 3px 6px rgba(0,0,0,0.3);
            z-index: 100;
        }

        .dropdown-content a {
            padding: 10px 15px;
            display: block;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: normal;
        }

        .dropdown-content a:hover {
            background: rgba(0,0,0,0.7);
            transform: scale(1.02);
        }

        .dropdown-btn:hover .dropdown-content {
            display: flex;
        }

        /* 🔹 Video Section */
        .video-section {
            width: 100%;
            height: 600px;
            position: relative;
            overflow: hidden;
        }

        .video-section video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* 🔹 Centered Welcome */
        .video-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            font-size: 60px;
            font-weight: bold;
            text-align: center;
            text-shadow: 3px 3px 10px rgba(0,0,0,0.8);
        }

        /* 🔹 Image Slider (bottom of page) */
        .slider {
            width: 100%;
            max-width: 1000px;
            margin: 40px auto;
            overflow: hidden;
            position: relative;
        }

        .slide-track {
            display: flex;
            gap: 20px; /* 🔹 Gap between images */
            transition: transform 1s ease-in-out;
        }

        .slide {
            min-width: 300px;
            height: 200px;
            border-radius: 10px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        footer {
            width: 100%;
            background: rgba(0,0,0,0.55);
            color: #fff;
            padding: 15px 0;
            text-align: center;
            font-size: 14px;
        }

    </style>
</head>
<body>

<!-- 🔹 Transparent Black Bar -->
<div class="button-bar">
    <div class="site-name">Travelant</div>
    <div class="button-group">
        <div class="dropdown-btn">
            Booking
            <div class="dropdown-content">
                <a href="accomodation.php">Accomodation</a>
                <a href="Trip.php">Trip</a>
            </div>
        </div>

		<a href="payment.php">Payment</a>
        <a href="create_group.php">Group</a>
        <a href="offer.php">Offer</a>
        <a href="rewards.php">Reward</a>

        <div class="dropdown-btn">
            My Profile
            <div class="dropdown-content">
                <a href="user_dashboard.php">Dashboard</a>
                <a href="SignOut.php">Sign Out</a>
            </div>
        </div>
    </div>
</div>

<!-- 🔹 Video Section -->
<div class="video-section">
    <video autoplay muted loop>
        <source src="travel.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="video-overlay">Welcome</div>
</div>

<!-- 🔹 Image Slider -->
<div class="slider">
    <div class="slide-track" id="slideTrack">
        <div class="slide"><img src="pic1.jpg" alt="Slide 1"></div>
        <div class="slide"><img src="pic2.jpg" alt="Slide 2"></div>
        <div class="slide"><img src="pic3.jpg" alt="Slide 3"></div>
    </div>
</div>

<!-- 🔹 Footer -->
<footer>
    <p>Contact us: support@travelant.com | +880-12345678</p>
    <small>© 2025 Travelant. All Rights Reserved.</small>
</footer>

<!-- 🔹 JS for Sliding -->
<script>
    const slideTrack = document.getElementById('slideTrack');
    const slides = document.querySelectorAll('.slide');
    let index = 0;

    function showSlide() {
        index++;
        if (index >= slides.length) {
            index = 0;
        }
        slideTrack.style.transform = `translateX(-${index * (slides[0].offsetWidth + 20)}px)`;
    }

    setInterval(showSlide, 10000); // 🔹 Slide every 10 sec
</script>

</body>
</html>
