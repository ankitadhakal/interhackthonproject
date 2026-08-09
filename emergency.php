<?php
require_once 'config/db.php';

// Fetch emergency contacts from database
$sql = "SELECT * FROM emergency_contacts ORDER BY id ASC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/universal.css">
    <style>
        .sos-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .sos-hero {
            text-align: center;
            margin-bottom: 40px;
        }

        .sos-hero h1 {
            font-size: 2.8rem;
            color: #0f172a;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .sos-hero p {
            font-size: 1.1rem;
            color: #64748b;
            max-width: 650px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .sos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .sos-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border-top: 5px solid #dc2626;
        }

        .sos-card h3 {
            font-size: 1.3rem;
            color: #0f172a;
            margin-bottom: 10px;
            font-weight: 700;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .sos-card p {
            font-size: 0.95rem;
            color: #64748b;
            margin-bottom: 25px;
            line-height: 1.5;
        }

        .sos-number {
            display: inline-block;
            background-color: #fef2f2;
            color: #dc2626;
            font-size: 1.4rem;
            font-weight: 800;
            padding: 12px 20px;
            border-radius: 10px;
            text-decoration: none;
            text-align: center;
            transition: background 0.2s;
        }

        .sos-number:hover {
            background-color: #dc2626;
            color: #ffffff;
        }
    </style>
    <title>TripNep - Emergency SOS</title>
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
                <li><a href="emergency.php" class="active">Emergency SOS</a></li>
                <li><a href="about.php">About Us</a></li>
            </ul>
            <a href="map.php" class="nav-cta">Interactive Map</a>
        </nav>
    </header>

    <main class="sos-container">
        <section class="sos-hero">
            <h1>Emergency Assistance Hub</h1>
            <p>Immediate access to verified helpline numbers, rescue coordination, and tourist safety support across Nepal.</p>
        </section>

        <!-- Dynamic SOS Grid from MySQL -->
        <section class="sos-grid">
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="sos-card">
                        <div>
                            <h3>
                                <span><?php echo htmlspecialchars($row['service_name']); ?></span>
                                <span style="font-size:0.75rem; background:#fee2e2; color:#dc2626; padding:2px 8px; border-radius:10px;"><?php echo htmlspecialchars($row['category']); ?></span>
                            </h3>
                            <p style="font-size: 0.85rem; color: #1e3a8a; margin-bottom: 6px;">📍 Location: <?php echo htmlspecialchars($row['location']); ?></p>
                            <p><?php echo htmlspecialchars($row['description']); ?></p>
                        </div>
                        <a href="tel:<?php echo htmlspecialchars($row['phone_number']); ?>" class="sos-number">
                            📞 <?php echo htmlspecialchars($row['phone_number']); ?>
                        </a>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </section>
    </main>

    <footer style="background: #0f172a; color: #94a3b8; text-align: center; padding: 30px 20px; font-size: 0.9rem;">
        <p>TripNep 🇳🇵 - Stay Calm & Safe. Help is just one call away.</p>
    </footer>
</body>

</html>