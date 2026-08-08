let gems = [];
let targetGem = null;
let attempts = 5;
let gameOver = false;

const map = L.map('map', {
    dragging: false,
    zoomControl: false,
    scrollWheelZoom: false,
    doubleClickZoom: false,
    boxZoom: false,
    keyboard: false
}).setView([27.85, 84.50], 8);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', { maxZoom: 19 }).addTo(map);

// Fix map rendering bug inside CSS Grid layouts
setTimeout(() => {
    map.invalidateSize();
}, 200);

const statusEl = document.getElementById('radar-status');
const hintEl = document.getElementById('radar-hint');
const attemptsEl = document.getElementById('attempts-val');
const resetBtn = document.getElementById('reset-radar-btn');

async function fetchGems() {
    try {
        const response = await fetch('../json/gems.json');
        gems = await response.json();
        initGame();
    } catch (error) {
        gems = [
            { name: "Bandipur Hill Town", lat: 27.9392, lng: 84.4168 },
            { name: "Kopan Monastery", lat: 27.7285, lng: 85.3622 },
            { name: "Tansen Bazaar", lat: 27.8673, lng: 83.5469 },
            { name: "Khopra Ridge", lat: 28.4350, lng: 83.6820 }
        ];
        initGame();
    }
}

function initGame() {
    targetGem = gems[Math.floor(Math.random() * gems.length)];
    attempts = 5;
    gameOver = false;
    attemptsEl.textContent = attempts;
    statusEl.textContent = "Radar Active";
    hintEl.textContent = "Click anywhere on the map to triangulate.";
}

function calculateDistance(lat1, lon1, lat2, lon2) {
    const R = 6371;
    const dLat = (lat2 - lat1) * Math.PI / 180;
    const dLon = (lon2 - lon1) * Math.PI / 180;
    const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
        Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
        Math.sin(dLon / 2) * Math.sin(dLon / 2);
    return R * 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
}

map.on('click', (e) => {
    if (gameOver || attempts <= 0 || !targetGem) return;

    const pulseIcon = L.divIcon({
        html: '<div style="font-size: 24px; text-align: center;">📍</div>',
        className: 'custom-emoji-marker',
        iconSize: [28, 28],
        iconAnchor: [14, 14]
    });
    L.marker([e.latlng.lat, e.latlng.lng], { icon: pulseIcon }).addTo(map);

    const dist = calculateDistance(e.latlng.lat, e.latlng.lng, targetGem.lat, targetGem.lng);

    if (dist <= 25) {
        statusEl.textContent = "SUCCESS!";
        hintEl.textContent = `You found ${targetGem.name}!`;
        const successIcon = L.divIcon({
            html: '<div style="font-size: 32px; text-align: center;">🏆</div>',
            className: 'custom-emoji-marker',
            iconSize: [32, 32],
            iconAnchor: [16, 16]
        });
        L.marker([targetGem.lat, targetGem.lng], { icon: successIcon }).addTo(map).bindPopup(`Found: ${targetGem.name}`).openPopup();
        gameOver = true;
    } else {
        attempts--;
        attemptsEl.textContent = attempts;
        if (dist < 50) {
            statusEl.textContent = "Hot! 🔥";
            hintEl.textContent = "You are very close to the hidden location.";
        } else if (dist < 150) {
            statusEl.textContent = "Warm ☀️";
            hintEl.textContent = "Getting closer, keep scanning.";
        } else {
            statusEl.textContent = "Cold ❄️";
            hintEl.textContent = "Far away from the hidden spot.";
        }

        if (attempts === 0) {
            statusEl.textContent = "Game Over ❌";
            hintEl.textContent = `The gem was at ${targetGem.name}.`;
            const failIcon = L.divIcon({
                html: '<div style="font-size: 32px; text-align: center;">💎</div>',
                className: 'custom-emoji-marker',
                iconSize: [32, 32],
                iconAnchor: [16, 16]
            });
            L.marker([targetGem.lat, targetGem.lng], { icon: failIcon }).addTo(map).bindPopup(`Secret: ${targetGem.name}`).openPopup();
            gameOver = true;
        }
    }
});

resetBtn.addEventListener('click', () => {
    location.reload();
});

fetchGems();