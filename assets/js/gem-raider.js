const gems = [
    { name: "Bandipur Hill Town", lat: 27.9392, lng: 84.4168 },
    { name: "Kopan Monastery", lat: 27.7285, lng: 85.3622 },
    { name: "Tansen Bazaar", lat: 27.8673, lng: 83.5469 },
    { name: "Khopra Ridge", lat: 28.4350, lng: 83.6820 }
];

let targetGem = gems[Math.floor(Math.random() * gems.length)];
let attempts = 5;

const map = L.map('map').setView([27.85, 84.50], 8);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', { maxZoom: 19 }).addTo(map);

const statusEl = document.getElementById('radar-status');
const hintEl = document.getElementById('radar-hint');
const attemptsEl = document.getElementById('attempts-val');
const resetBtn = document.getElementById('reset-radar-btn');

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
    if (attempts <= 0) return;

    L.marker([e.latlng.lat, e.latlng.lng]).addTo(map);
    const dist = calculateDistance(e.latlng.lat, e.latlng.lng, targetGem.lat, targetGem.lng);

    if (dist <= 15) {
        statusEl.textContent = "SUCCESS!";
        hintEl.textContent = `You found ${targetGem.name}!`;
        L.marker([targetGem.lat, targetGem.lng], {
            icon: L.icon({
                iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-green.png',
                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                iconSize: [25, 41], iconAnchor: [12, 41], popupAnchor: [1, -34], shadowSize: [41, 41]
            })
        }).addTo(map).bindPopup(`Found: ${targetGem.name}`).openPopup();
        attempts = 0;
    } else {
        attempts--;
        attemptsEl.textContent = attempts;
        if (dist < 50) {
            statusEl.textContent = "Hot! 🔥";
            hintEl.textContent = "You are very close to the hidden location.";
        } else if (dist < 150) {
            statusEl.textContent = "Warm ☀️";
            hintEl.textContent = "Getting closer, keep searching.";
        } else {
            statusEl.textContent = "Cold ❄️";
            hintEl.textContent = "Far away from the hidden spot.";
        }

        if (attempts === 0) {
            statusEl.textContent = "Game Over ❌";
            hintEl.textContent = `The gem was at ${targetGem.name}.`;
            L.marker([targetGem.lat, targetGem.lng], {
                icon: L.icon({
                    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png',
                    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                    iconSize: [25, 41], iconAnchor: [12, 41], popupAnchor: [1, -34], shadowSize: [41, 41]
                })
            }).addTo(map).bindPopup(`Secret: ${targetGem.name}`).openPopup();
        }
    }
});

resetBtn.addEventListener('click', () => {
    targetGem = gems[Math.floor(Math.random() * gems.length)];
    attempts = 5;
    attemptsEl.textContent = attempts;
    statusEl.textContent = "Radar Active";
    hintEl.textContent = "Click anywhere on the map to triangulate.";
    location.reload();
});