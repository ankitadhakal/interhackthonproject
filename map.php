<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Leaflet & Geocoder CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />

    <!-- Relative CSS Links (No leading slashes for XAMPP compatibility) -->
    <link rel="stylesheet" href="assets/css/universal.css">
    <link rel="stylesheet" href="assets/css/map.css">
    <title>Trip Nep - Map</title>
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
            <li><a href="index.php">Home</a></li>
            <li><a href="explore.php">Explore</a></li>
            <li><a href="fair_prices.php">Fair Price Index</a></li>
            <li><a href="etiquette.php">Culture & Etiquette</a></li>
            <li><a href="emergency.php">Emergency SOS</a></li>
            <li><a href="about.php">About Us</a></li>
        </ul>
        <!-- Nav CTA acts as the active page indicator here -->
        <a href="map.php" class="nav-cta" style="background-color: #dc2626;">Interactive Map</a>
    </nav>
</header>

    <main class="map-container">
        <div class="controls">
            <div class="input-group startLocation">
                <img src="img/Gpin.png" alt="Start Pin" class="pin-icon">
                <div class="search-box">
                    <input type="text" id="custom-search" placeholder="Start location (e.g., Pokhara)...">
                </div>
            </div>

            <div class="input-group destination">
                <img src="img/Rpin.png" alt="Destination Pin" class="pin-icon">
                <div class="search-box">
                    <input type="text" id="destination-search" placeholder="Destination location (e.g., Kathmandu)...">
                </div>
            </div>
        </div>

        <div id="map"></div>
    </main>

    <!-- Standardized Footer -->
    <footer style="background: #0f172a; color: #94a3b8; text-align: center; padding: 30px 20px; font-size: 0.9rem;">
        <p>TripNep 🇳🇵 - Travel Safe, Respect Culture, Travel Responsibly</p>
    </footer>

    <!-- Leaflet & Geocoder JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

    <!-- Custom Map JS (Relative Path) -->
    <script src="assets/js/map.js"></script>

    <!-- Header Scroll Script for Consistency -->
    <script>
        let lastScrollTop = 0;
        const header = document.querySelector('header');

        window.addEventListener('scroll', () => {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            if (scrollTop > lastScrollTop) {
                header.classList.add('header-hidden');
            } else {
                header.classList.remove('header-hidden');
            }
            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
        });
    </script>
</body>

</html>