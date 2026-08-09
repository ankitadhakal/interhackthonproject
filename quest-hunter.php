<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Leaflet CSS for Map functionality -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!-- Relative CSS Links (No leading slashes for XAMPP compatibility) -->
    <link rel="stylesheet" href="assets/css/universal.css">
    <link rel="stylesheet" href="assets/css/quest-hunter.css">
    <title>Trip Nep - Quest Hunter</title>
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
                <!-- Keeping Explore active as this game is part of the Explore Hub -->
                <li><a href="explore.php" class="active">Explore</a></li>
                <li><a href="fair_prices.php">Fair Price Index</a></li>
                <li><a href="etiquette.php">Culture & Etiquette</a></li>
                <li><a href="emergency.php">Emergency SOS</a></li>
                <li><a href="about.php">About Us</a></li>
            </ul>
            <a href="map.php" class="nav-cta">Interactive Map</a>
        </nav>
    </header>

    <main class="game-layout">
        <div class="game-panel">
            <div>
                <h2>Quest Hunter</h2>
                <p class="instruction-text">Select a country or random mode, explore the map using city and town labels
                    to find the target, click to place your guess, and submit!</p>

                <div class="quest-box">
                    <label class="quest-label" for="country-select">Select Country / Region</label>
                    <select id="country-select" class="country-dropdown">
                        <option value="RANDOM">🎲 Random World</option>
                        <option value="NP">🇳🇵 Nepal</option>
                        <option value="JP">🇯🇵 Japan</option>
                        <option value="CH">🇨🇭 Switzerland</option>
                        <option value="US">🇺🇸 United States</option>
                        <option value="FR">🇫🇷 France</option>
                        <option value="IT">🇮🇹 Italy</option>
                        <option value="IN">🇮🇳 India</option>
                        <option value="GB">🇬🇧 United Kingdom</option>
                        <option value="DE">🇩🇪 Germany</option>
                        <option value="AU">🇦🇺 Australia</option>
                        <option value="CA">🇨🇦 Canada</option>
                        <option value="BR">🇧🇷 Brazil</option>
                    </select>

                    <span class="quest-label" style="margin-top: 15px;">Current Quest</span>
                    <h4 id="quest-title">Loading Quest...</h4>
                    <p id="quest-desc">Fetching dynamic quest data...</p>
                </div>

                <div class="stats-grid">
                    <div class="stat-card">
                        <span>Score</span>
                        <strong id="score-val">0</strong>
                    </div>
                    <div class="stat-card">
                        <span>Multiplier</span>
                        <strong id="multiplier-val">1.0x</strong>
                    </div>
                </div>
            </div>
            <div class="button-group">
                <button class="action-btn" id="submit-guess-btn">Submit Guess</button>
                <button class="action-btn secondary-btn" id="next-quest-btn" style="display:none;">Next Quest</button>
            </div>
        </div>
        <div id="map"></div>
    </main>

    <!-- Standardized Footer -->
    <footer style="background: #0f172a; color: #94a3b8; text-align: center; padding: 30px 20px; font-size: 0.9rem;">
        <p>TripNep 🇳🇵 - Travel Safe, Respect Culture, Travel Responsibly</p>
    </footer>

    <!-- Leaflet JS & Custom Script -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="assets/js/quest-hunter.js"></script>

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