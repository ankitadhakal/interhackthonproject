<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TripNep - Explore Nepal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <!-- Header Navigation -->
    <header class="navbar">
        <div class="branding">
            <i class="fa-solid fa-vihara logo-icon"></i>
            <p class="logo-text">Trip<span>Nep</span></p>
            <img class="flag-icon" src="https://flagcdn.com/w40/np.png" alt="Nepal Flag">
        </div>

        <nav class="nav-menu">
            <ul class="nav-list">
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="#features">Explore</a></li>
                <li><a href="map.php">Map</a></li>
                <li><a href="fair_prices.php">Fair Price Index</a></li>
                <li><a href="etiquette.php">Culture & Etiquette</a></li>
                <li><a href="emergency.php">Emergency SOS</a></li>
                <li><a href="about.php">About Us</a></li>
            </ul>
        </nav>

        <a href="emergency.php"><button class="cta-button">Plan Your Trip</button></a>
    </header>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <div class="safety-badge">
                Explore. Respect. Stay Safe. <img src="https://flagcdn.com/w20/np.png" alt="NP Flag">
            </div>

            <h1 class="hero-title">Welcome to<br>TripNep</h1>

            <p class="hero-subtitle">
                Your go-to guide for exploring Nepal with
                <span class="text-yellow">confidence</span>,
                <span class="text-yellow">culture</span>, and
                <span class="text-red">care</span>.
            </p>

            <div class="button-group">
                <a href="#quest-map"><button class="btn btn-primary"><i class="fa-solid fa-location-arrow"></i> Explore the Map</button></a>
                <a href="fair_prices.php"><button class="btn btn-outline"><i class="fa-regular fa-map"></i> Explore Places</button></a>
                <a href="etiquette.php"><button class="btn btn-outline"><i class="fa-solid fa-circle-info"></i> Learn More</button></a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section" id="features">
        <div class="section-header">
            <i class="fa-solid fa-mountain mountain-icon"></i>
            <h2>Everything You Need for a Better <span class="text-red">Nepal</span> Experience</h2>
            <p>Smart tools and local guidance for a smooth, safe and meaningful journey.</p>
        </div>

        <div class="cards-grid">
            <div class="feature-card card-green">
                <h3>Cultural Quest Map</h3>
                <p>Interactive map to discover hidden gems and cultural spots across Nepal.</p>
                <a href="#quest-map" class="card-btn">Explore Map →</a>
            </div>

            <div class="feature-card card-yellow">
                <h3>Fair Price Index</h3>
                <p>Know the fair price range for taxis, food, SIMs and more. Avoid scams.</p>
                <a href="fair_prices.php" class="card-btn">Check Prices →</a>
            </div>

            <div class="feature-card card-blue">
                <h3>Culture & Etiquette</h3>
                <p>Learn essential do's & don'ts and everyday Nepali phrases.</p>
                <a href="etiquette.php" class="card-btn">Learn More →</a>
            </div>

            <div class="feature-card card-red">
                <h3>Emergency SOS Hub</h3>
                <p>Quick access to helplines and emergency contacts.</p>
                <a href="emergency.php" class="card-btn">Get Help →</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>TripNep 🇳🇵 - Travel Safe, Respect Culture, Travel Responsibly</p>
    </footer>

</body>
</html>