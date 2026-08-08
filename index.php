<?php
require_once 'config/db.php';

// Fetch Quest Spots / Hidden Gems from MySQL
$sql = "SELECT * FROM hidden_gems ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TripNep - Explore Nepal</title>
    <!-- Link both universal.css and style.css -->
    <link rel="stylesheet" href="assets/css/universal.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!-- Aarosh's Header Navbar -->
    <header>
        <nav class="nav-bar">

            <div class="logo-container">
                <span class="logo-icon">🏯</span>
                <p class="name">Trip<span class="red-text">Nep</span> <span class="flag">🇳🇵</span></p>
            </div>

            <ul class="nav-list">
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="#quest-map">Explore</a></li>
                <li><a href="map.php">Map</a></li>
                <li><a href="fair_prices.php">Fair Price Index</a></li>
                <li><a href="etiquette.php">Culture & Etiquette</a></li>
                <li><a href="emergency.php">Emergency SOS</a></li>
                <li><a href="about.php">About Us</a></li>
            </ul>

            <a href="emergency.php" class="nav-cta">Plan Your Trip</a>
        </nav>
    </header>

    <main>
        <!-- Hero Section -->
        <div class="container">
            <div class="hero-content">
                <div class="slogan">
                    <span>Explore. Respect. Stay Safe.</span> <span class="slogan-flag">🇳🇵</span>
                </div>

                <h1 class="header">
                    Welcome to<br>TripNep
                </h1>

                <p class="moto">
                    Your go-to guide for exploring Nepal with<br>
                    <span class="text-yellow">confidence</span>,
                    <span class="text-green">culture</span>, and
                    <span class="text-red">care</span>.
                </p>

            </div>
        </div>

        <!-- Mid Section -->
        <div class="mid">
            <img class="mountain" src="img/mountain.png" alt="Mountain Icon">
            <h2 class="heading">Everything You Need for a Better <span class="text-red">Nepal</span> Experience</h2>
            <p class="sub-heading">Smart tools and local guidance for a smooth, safe and meaningful journey.</p>
            <div class="divider"></div>
        </div>

        <!-- Bottom Info Strip -->
        <section class="bottom-features-bar">
            <div class="feature-item">
                <div class="feature-icon">🗺️</div>
                <div class="feature-text">
                    <h4>100+</h4>
                    <p>Hidden Places</p>
                </div>
            </div>

            <div class="feature-item">
                <div class="feature-icon">👥</div>
                <div class="feature-text">
                    <h4>Fair Prices</h4>
                    <p>For Every Traveler</p>
                </div>
            </div>

            <div class="feature-item">
                <div class="feature-icon">🛡️</div>
                <div class="feature-text">
                    <h4>Travel Safe</h4>
                    <p>Information & Support</p>
                </div>
            </div>

            <div class="feature-item">
                <div class="feature-icon">❤️</div>
                <div class="feature-text">
                    <h4>Respect Culture</h4>
                    <p>Travel Responsibly</p>
                </div>
            </div>
        </section>


    </main>

    <footer style="background: #0f172a; color: #94a3b8; text-align: center; padding: 30px 20px; font-size: 0.9rem;">
        <p>TripNep 🇳🇵 - Travel Safe, Respect Culture, Travel Responsibly</p>
    </footer>

</body>

</html>