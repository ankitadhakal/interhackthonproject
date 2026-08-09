<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Relative CSS Links (No leading slashes for XAMPP compatibility) -->
    <link rel="stylesheet" href="assets/css/universal.css">
    <link rel="stylesheet" href="assets/css/explore.css">
    <title>Trip Nep - Explore Mini-Games</title>
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

    <main class="explore-container">
        <section class="explore-hero">
            <h1>Travel Adventure Hub</h1>
            <p>Transform your journey across Nepal into an interactive experience. Choose a map-based mini-game,
                complete travel quests, and earn score multipliers the further you explore!</p>
        </section>

        <section class="games-grid">
            <div class="game-card">
                <div class="game-badge">Distance Multiplier</div>
                <h3>Quest Hunter</h3>
                <p>Select a destination challenge and travel to heritage sites. The system calculates your distance from
                    the starting coordinate—the farther away the quest target, the higher your score reward!</p>
                <!-- Updated to .php assuming these will also be converted -->
                <a href="quest_hunter.php" class="game-btn">Play Quest Hunter</a>
            </div>

            <div class="game-card">
                <div class="game-badge">Geography Challenge</div>
                <h3>Province Pinpoint</h3>
                <p>Test your topographical knowledge of Nepal's districts and landmarks. Drop map markers accurately
                    within time limits to secure top spots on the leaderboard.</p>
                <!-- Updated to .php assuming these will also be converted -->
                <a href="geo_quiz.php" class="game-btn">Play Map Quiz</a>
            </div>
        </section>
    </main>

    <!-- Standardized Footer -->
    <footer style="background: #0f172a; color: #94a3b8; text-align: center; padding: 30px 20px; font-size: 0.9rem;">
        <p>TripNep 🇳🇵 - Travel Safe, Respect Culture, Travel Responsibly</p>
    </footer>

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