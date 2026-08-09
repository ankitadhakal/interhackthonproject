<?php
require_once 'config/db.php';

// Fetch phrases from database
$sql = "SELECT * FROM phrases ORDER BY id ASC";
$phrases_result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/universal.css">
    <link rel="stylesheet" href="assets/css/culture.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>TripNep - Culture & Etiquette</title>
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
                <li><a href="etiquette.php" class="active">Culture & Etiquette</a></li>
                <li><a href="emergency.php">Emergency SOS</a></li>
                <li><a href="about.php">About Us</a></li>
            </ul>
            <a href="map.php" class="nav-cta">Interactive Map</a>
        </nav>
    </header>

    <main>
        <section class="culture-hero">
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <h1>Culture & Etiquette</h1>
                <p>Respect the culture, connect with hearts.</p>
            </div>
        </section>

        <section class="culture-container">
            <div class="tabs-nav">
                <button class="tab-btn active" onclick="switchTab('dos-donts')">Cultural Do's & Don'ts</button>
                <button class="tab-btn" onclick="switchTab('phrases')">Everyday Nepali Phrases</button>
            </div>

            <!-- Tab 1: Do's and Don'ts -->
            <div id="dos-donts" class="tab-content active">
                <div class="rules-grid">

                    <div class="rule-card dos-card">
                        <h3 class="card-title dos-title">
                            Do's <i class="fa-solid fa-circle-check"></i>
                        </h3>
                        <ul class="rule-list">
                            <li>
                                <i class="fa-solid fa-hands-praying icon-do"></i>
                                <span>Do greet people with a smile and "Namaste".</span>
                            </li>
                            <li>
                                <i class="fa-solid fa-shirt icon-do"></i>
                                <span>Do dress modestly, especially at religious sites.</span>
                            </li>
                            <li>
                                <i class="fa-solid fa-camera icon-do"></i>
                                <span>Do ask for permission before taking photos of people.</span>
                            </li>
                            <li>
                                <i class="fa-solid fa-shoe-prints icon-do"></i>
                                <span>Do remove your shoes before entering homes and temples.</span>
                            </li>
                            <li>
                                <i class="fa-solid fa-shield-heart icon-do"></i>
                                <span>Do respect local customs, traditions and beliefs.</span>
                            </li>
                        </ul>
                    </div>

                    <div class="rule-card donts-card">
                        <h3 class="card-title donts-title">
                            Don'ts <i class="fa-solid fa-circle-xmark"></i>
                        </h3>
                        <ul class="rule-list">
                            <li>
                                <i class="fa-solid fa-hand icon-dont"></i>
                                <span>Don't touch people's heads.</span>
                            </li>
                            <li>
                                <i class="fa-solid fa-shoe-prints icon-dont" style="transform: rotate(180deg);"></i>
                                <span>Don't point your feet towards people or deities.</span>
                            </li>
                            <li>
                                <i class="fa-solid fa-camera icon-dont"></i>
                                <span>Don't take photos inside temples.</span>
                            </li>
                            <li>
                                <i class="fa-solid fa-heart-crack icon-dont"></i>
                                <span>Don't engage in public displays of affection.</span>
                            </li>
                            <li>
                                <i class="fa-solid fa-trash-can icon-dont"></i>
                                <span>Don't litter. Keep Nepal clean and beautiful.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="reminder-banner">
                    <i class="fa-solid fa-map-location-dot"></i>
                    <p><strong>Remember:</strong> When in doubt, observe and follow the locals. Your respect makes your journey more meaningful.</p>
                </div>
            </div>

            <!-- Tab 2: Dynamic Phrases from MySQL -->
            <div id="phrases" class="tab-content" style="display: none;">
                <div class="phrases-grid">
                    <?php if (mysqli_num_rows($phrases_result) > 0): ?>
                        <?php while ($phrase = mysqli_fetch_assoc($phrases_result)): ?>
                            <div class="phrase-card">
                                <h4><?php echo htmlspecialchars($phrase['english_phrase']); ?> (<?php echo htmlspecialchars($phrase['nepali_phrase']); ?>)</h4>
                                <p>🗣️ Phonetic: <em><?php echo htmlspecialchars($phrase['phonetic']); ?></em></p>
                                <span style="font-size:0.75rem; background:#e0f2fe; color:#0369a1; padding:2px 8px; border-radius:10px; margin-top:8px; display:inline-block;"><?php echo htmlspecialchars($phrase['category']); ?></span>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </main>

    <footer style="background: #0f172a; color: #94a3b8; text-align: center; padding: 30px 20px; font-size: 0.9rem;">
        <p>TripNep 🇳🇵 - Respect Culture, Travel Responsibly</p>
    </footer>

    <!-- Aarosh's Tab Switching JS -->
    <script>
        function switchTab(tabId) {
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.style.display = 'none';
            });
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('active');
            });

            document.getElementById(tabId).style.display = 'block';
            event.currentTarget.classList.add('active');
        }
    </script>
</body>

</html>