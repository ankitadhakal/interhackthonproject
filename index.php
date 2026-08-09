<?php
require_once 'config/db.php';

// Fetch Quest Spots / Hidden Gems from database
$sql = "SELECT * FROM hidden_gems ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Relative CSS Links (No leading slashes for XAMPP compatibility) -->
    <link rel="stylesheet" href="assets/css/universal.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>TripNep - Explore Nepal</title>
</head>

<body>

    <header>
        <nav class="nav-bar">
            <div class="logo-container">
                <a href="index.php">
                    <div class="logo-crop">
                        <img src="img/logo.jpeg" alt="TripNep Logo" class="logo-img">
                    </div>
                </a>
            </div>
            <ul class="nav-list">
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="explore.php">Explore</a></li>
                <li><a href="fair_prices.php">Fair Price Index</a></li>
                <li><a href="etiquette.php">Culture & Etiquette</a></li>
                <li><a href="emergency.php">Emergency SOS</a></li>
                <li><a href="about.php">About Us</a></li>
            </ul>
            <a href="map.php" class="nav-cta">Interactive Map</a>
        </nav>
    </header>

    <main>
        <section class="hero-section">
            <div class="container">
                <div class="hero-content">
                    <div class="slogan">
                        <span>Explore. Respect. Stay Safe.</span> <span class="slogan-flag">🇳🇵</span>
                    </div>

                    <h1 class="header">
                        Welcome to<br><span class="brand-highlight">TripNep</span>
                    </h1>

                    <p class="moto">
                        Your go-to guide for exploring Nepal with<br>
                        <span class="text-yellow">confidence</span>,
                        <span class="text-green">culture</span>, and
                        <span class="text-red">care</span>.
                    </p>

                    <div class="hero-actions">
                        <a href="explore.php" class="primary-btn">Start Exploring</a>
                        <a href="map.php" class="secondary-btn">View Map</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="mid-section">
            <div class="mid">
                <div class="mountain-badge">
                    <img class="mountain" src="img/mountain.png" alt="Mountain Icon">
                </div>
                <h2 class="heading">Everything You Need for a Better <span class="text-red">Traveling</span> Experience</h2>
                <p class="sub-heading">Smart tools and local guidance for a smooth, safe and meaningful journey.</p>
                <div class="divider"></div>
            </div>
        </section>

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

        <!-- Quest Map Locations (MySQL Database Loop) -->
        <section id="quest-map" style="max-width: 1200px; margin: 40px auto 80px auto; padding: 0 20px;">
            <h2 style="font-size: 2.2rem; color: #0f172a; font-weight: 800; margin-bottom: 20px; text-align: center;">🗺️ Cultural Quest Map Locations</h2>

            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div style="background: white; border: 1px solid #e2e8f0; border-left: 6px solid #dc2626; border-radius: 16px; padding: 25px; margin-bottom: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.04);">
                        <h3 style="font-size: 1.3rem; color: #0f172a; font-weight: 700; margin-bottom: 8px;"><?php echo htmlspecialchars($row['spot_name']); ?></h3>
                        <p style="color: #64748b; font-size: 0.9rem; margin-bottom: 10px;">📍 <strong>Region:</strong> <?php echo htmlspecialchars($row['region']); ?></p>
                        <p style="color: #334155; font-size: 0.95rem; margin-bottom: 15px; line-height: 1.6;"><?php echo htmlspecialchars($row['description']); ?></p>
                        <span style="background: #fef3c7; color: #d97706; padding: 4px 14px; border-radius: 20px; font-weight: 700; font-size: 0.8rem; text-transform: uppercase;"><?php echo htmlspecialchars($row['category']); ?></span>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </section>
    </main>

    <footer style="background: #0f172a; color: #94a3b8; text-align: center; padding: 30px 20px; font-size: 0.9rem;">
        <p>TripNep 🇳🇵 - Travel Safe, Respect Culture, Travel Responsibly</p>
    </footer>

</body>

</html>