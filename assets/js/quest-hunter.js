const quests = [
    { title: "Muktinath Temple", desc: "A sacred Vishnu temple perched high at altitude in Mustang.", lat: 28.8167, lng: 83.8667 },
    { title: "Rara Lake", desc: "The biggest freshwater lake in the Nepali Himalayas located in Mugu.", lat: 29.5397, lng: 82.1281 },
    { title: "Lumbini Maya Devi Temple", desc: "The birthplace of Siddhartha Gautama Buddha in the Terai plains.", lat: 27.4705, lng: 83.2752 },
    { title: "Pashupatinath Temple", desc: "The iconic sprawling Hindu temple complex on the banks of Bagmati.", lat: 27.7105, lng: 85.3487 },
    { title: "Janaki Mandir", desc: "A striking marble masterpiece located in Janakpur.", lat: 26.7290, lng: 85.9224 }
];

let currentQuestIndex = 0;
let score = 0;
let guessedMarker = null;
let targetMarker = null;

const map = L.map('map').setView([28.3949, 84.1240], 7);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', { maxZoom: 19 }).addTo(map);

const questTitleEl = document.getElementById('quest-title');
const questDescEl = document.getElementById('quest-desc');
const scoreValEl = document.getElementById('score-val');
const multiplierValEl = document.getElementById('multiplier-val');
const nextBtn = document.getElementById('next-quest-btn');

function loadQuest() {
    const q = quests[currentQuestIndex];
    questTitleEl.textContent = q.title;
    questDescEl.textContent = q.desc;
    if (guessedMarker) map.removeLayer(guessedMarker);
    if (targetMarker) map.removeLayer(targetMarker);
}

function calculateDistance(lat1, lon1, lat2, lon2) {
    const R = 6371;
    const dLat = (lat2 - lat1) * Math.PI / 180;
    const dLon = (lon2 - lon1) * Math.PI / 180;
    const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
        Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
        Math.sin(dLon / 2) * Math.sin(dLon / 2);
    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    return R * c;
}

map.on('click', (e) => {
    const q = quests[currentQuestIndex];
    if (guessedMarker) map.removeLayer(guessedMarker);
    if (targetMarker) map.removeLayer(targetMarker);

    guessedMarker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map).bindPopup("Your Guess").openPopup();
    targetMarker = L.marker([q.lat, q.lng], {
        icon: L.icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-green.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41], iconAnchor: [12, 41], popupAnchor: [1, -34], shadowSize: [41, 41]
        })
    }).addTo(map).bindPopup(`Target: ${q.title}`);

    const dist = calculateDistance(e.latlng.lat, e.latlng.lng, q.lat, q.lng);
    const multiplier = Math.max(1.0, (dist / 50).toFixed(1));
    const pointsEarned = Math.max(10, Math.round(1000 / (dist + 10) * multiplier * 10));

    score += pointsEarned;
    scoreValEl.textContent = score;
    multiplierValEl.textContent = multiplier + 'x';

    const bounds = L.latLngBounds([[e.latlng.lat, e.latlng.lng], [q.lat, q.lng]]);
    map.fitBounds(bounds, { padding: [80, 80] });
});

nextBtn.addEventListener('click', () => {
    currentQuestIndex = (currentQuestIndex + 1) % quests.length;
    loadQuest();
    map.setView([28.3949, 84.1240], 7);
});

loadQuest();