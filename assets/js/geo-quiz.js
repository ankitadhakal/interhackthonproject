const targets = [
    { name: "Pokhara", lat: 28.2096, lng: 83.9856 },
    { name: "Kathmandu", lat: 27.7172, lng: 85.3240 },
    { name: "Biratnagar", lat: 26.4525, lng: 87.2718 },
    { name: "Dharan", lat: 26.8140, lng: 87.2830 },
    { name: "Butwal", lat: 27.7005, lng: 83.4484 }
];

let currentIdx = 0;
let score = 0;
let round = 1;
let activeMarker = null;

const map = L.map('map').setView([28.3949, 84.1240], 7);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', { maxZoom: 19 }).addTo(map);

const targetNameEl = document.getElementById('target-name');
const scoreEl = document.getElementById('quiz-score');
const roundEl = document.getElementById('quiz-round');
const nextBtn = document.getElementById('next-round-btn');

function loadTarget() {
    targetNameEl.textContent = targets[currentIdx].name;
    if (activeMarker) map.removeLayer(activeMarker);
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
    const t = targets[currentIdx];
    if (activeMarker) map.removeLayer(activeMarker);

    activeMarker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map).bindPopup("Your Drop").openPopup();
    const dist = calculateDistance(e.latlng.lat, e.latlng.lng, t.lat, t.lng);

    if (dist <= 25) {
        score += 200;
        scoreEl.textContent = score;
        alert(`Great job! Only ${dist.toFixed(1)} km away.`);
    } else {
        alert(`Too far! You were ${dist.toFixed(1)} km away from ${t.name}.`);
    }
});

nextBtn.addEventListener('click', () => {
    currentIdx++;
    if (currentIdx >= targets.length) {
        alert(`Game finished! Final Score: ${score}`);
        currentIdx = 0;
        score = 0;
        round = 1;
    } else {
        round++;
    }
    roundEl.textContent = `${round} / ${targets.length}`;
    scoreEl.textContent = score;
    loadTarget();
    map.setView([28.3949, 84.1240], 7);
});

loadTarget();