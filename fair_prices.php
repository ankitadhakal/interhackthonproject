<?php
require_once 'config/db.php';

// Fetch fair prices from database
$sql = "SELECT * FROM fair_prices ORDER BY id ASC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/universal.css">
    <style>
        .price-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .price-hero {
            text-align: center;
            margin-bottom: 40px;
        }

        .price-hero h1 {
            font-size: 2.8rem;
            color: #0f172a;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .price-hero p {
            font-size: 1.1rem;
            color: #64748b;
            max-width: 650px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .price-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .price-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
        }

        .price-card h3 {
            font-size: 1.3rem;
            color: #0f172a;
            margin-bottom: 15px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .price-item {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #f1f5f9;
            font-size: 0.95rem;
        }

        .price-item:last-child {
            border-bottom: none;
        }

        .item-name {
            color: #64748b;
            font-weight: 500;
        }

        .item-cost {
            color: #0f172a;
            font-weight: 700;
        }
    </style>
    <title>TripNep - Fair Price Index</title>
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
                <li><a href="fair_prices.php" class="active">Fair Price Index</a></li>
                <li><a href="etiquette.php">Culture & Etiquette</a></li>
                <li><a href="emergency.php">Emergency SOS</a></li>
                <li><a href="about.php">About Us</a></li>
            </ul>
            <a href="map.php" class="nav-cta">Interactive Map</a>
        </nav>
    </header>

    <main class="price-container">
        <section class="price-hero">
            <h1>Fair Price Index</h1>
            <p>Know standard local cost ranges for transport, food, and daily essentials across Nepal to travel smart and avoid overpaying.</p>
        </section>

        <!-- Dynamic MySQL Price Cards Grid -->
        <section class="price-grid">
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="price-card">
                        <h3>
                            <span>🏷️ <?php echo htmlspecialchars($row['item_name']); ?></span>
                            <span style="font-size:0.75rem; background:#fef3c7; color:#d97706; padding:3px 10px; border-radius:12px;"><?php echo htmlspecialchars($row['category']); ?></span>
                        </h3>
                        <div class="price-item">
                            <span class="item-name">Fair Rate (NPR)</span>
                            <span class="item-cost" style="color:#059669;"><?php echo htmlspecialchars($row['price_npr']); ?></span>
                        </div>
                        <div class="price-item">
                            <span class="item-name">Approx. USD ($)</span>
                            <span class="item-cost"><?php echo htmlspecialchars($row['price_usd']); ?></span>
                        </div>
                        <div class="price-item" style="flex-direction: column; gap: 4px; border-bottom: none;">
                            <span class="item-name" style="color: #0f172a; font-weight: 600;">💡 Local Advice:</span>
                            <span style="color: #64748b; font-size: 0.88rem; line-height: 1.5;"><?php echo htmlspecialchars($row['tips']); ?></span>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </section>
    </main>

    <footer style="background: #0f172a; color: #94a3b8; text-align: center; padding: 30px 20px; font-size: 0.9rem;">
        <p>TripNep 🇳🇵 - Travel Smart & Avoid Scams</p>
    </footer>

</body>

</html>