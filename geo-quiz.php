<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!-- Relative CSS Links (No leading slashes for XAMPP compatibility) -->
    <link rel="stylesheet" href="assets/css/universal.css">
    <link rel="stylesheet" href="assets/css/geo-quiz.css">
   
    <title>Trip Nep - Province Pinpoint</title>
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
                <h2>Province Pinpoint</h2>
                <p style="color: #64748b; font-size: 0.9rem;">Test your topological geography by correctly pinpointing
                    target districts and cities.</p>

                <div class="quiz-box">
                    <span
                        style="font-size: 0.75rem; font-weight: 700; color: #94a3b8; text-transform: uppercase;">Locate
                        Target</span>
                    <h4 id="target-name">Loading...</h4>
                </div>

                <div class="stats-grid">
                    <div class="stat-card">
                        <span>Score</span>
                        <strong id="quiz-score">0</strong>
                    </div>
                    <div class="stat-card">
                        <span>Round</span>
                        <strong id="quiz-round">1 / 5</strong>
                    </div>
                </div>
            </div>

            <button class="action-btn" id="next-round-btn">Next Target</button>
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
    <script src="assets/js/geo-quiz.js"></script>

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