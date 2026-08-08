let quests = [];
let currentQuestIndex = 0;
let score = 0;
let selectedLat = null;
let selectedLng = null;
let guessedMarker = null;
let targetMarker = null;
let isSubmitted = false;

const map = L.map('map', {
    dragging: false,
    zoomControl: false,
    scrollWheelZoom: false,
    doubleClickZoom: false,
    boxZoom: false,
    keyboard: false
}).setView([28.3949, 84.1240], 7);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', { maxZoom: 19 }).addTo(map);

const starIcon = L.divIcon({
    html: '<div style="font-size: 30px; text-align: center; filter: drop-shadow(0 2px 5px rgba(0,0,0,0.4);">⭐</div>',
    className: 'custom-emoji-marker',
    iconSize: [32, 32],
    iconAnchor: [16, 16]
});

const flagIcon = L.divIcon({
    html: '<div style="font-size: 30px; text-align: center; filter: drop-shadow(0 2px 5px rgba(0,0,0,0.4);">📍</div>',
    className: 'custom-emoji-marker',
    iconSize: [32, 32],
    iconAnchor: [16, 16]
});

const questTitleEl = document.getElementById('quest-title');
const questDescEl = document.getElementById('quest-desc');
const scoreValEl = document.getElementById('score-val');
const multiplierValEl = document.getElementById('multiplier-val');
const submitBtn = document.getElementById('submit-guess-btn');
const nextBtn = document.getElementById('next-quest-btn');

async function fetchQuests() {
    try {
        const response = await fetch('../json/quests.json');
        const data = await response.json();
        // Randomize quest order dynamically upon fetch
        quests = data.sort(() => Math.random() - 0.5);
        loadQuest();
    } catch (error) {
        // Fallback array if local file protocol blocks direct fetching
        quests = [
            { title: "Muktinath Temple", desc: "A sacred Vishnu temple perched high at altitude in Mustang.", lat: 28.8167, lng: 83.8667 },
            { title: "Rara Lake", desc: "The biggest freshwater lake in the Nepali Himalayas located in Mugu.", lat: 29.5397, lng: 82.1281 },
            { title: "Lumbini Maya Devi Temple", desc: "The birthplace of Siddhartha Gautama Buddha in the Terai plains.", lat: 27.4705, lng: 83.2752 },
            { title: "Pashupatinath Temple", desc: "The iconic sprawling Hindu temple complex on the banks of Bagmati.", lat: 27.7105, lng: 85.3487 },
            { title: "Janaki Mandir", desc: "A striking marble masterpiece located in Janakpur.", lat: 26.7290, lng: 85.9224 }
        ].sort(() => Math.random() - 0.5);
        loadQuest();
    }
}

function loadQuest() {
    if (quests.length === 0) return;
    const q = quests[currentQuestIndex];
    questTitleEl.textContent = q.title;
    questDescEl.textContent = q.desc;
    selectedLat = null;
    selectedLng = null;
    isSubmitted = false;
    submitBtn.style.display = 'block';
    nextBtn.style.display = 'none';

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
    return R * 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
}

map.on('click', (e) => {
    if (isSubmitted) return;
    selectedLat = e.latlng.lat;
    selectedLng = e.latlng.lng;

    if (guessedMarker) map.removeLayer(guessedMarker);
    guessedMarker = L.marker([selectedLat, selectedLng], { icon: flagIcon }).addTo(map).bindPopup("Your Guess").openPopup();
});

submitBtn.addEventListener('click', () => {
    if (selectedLat === null || selectedLng === null) {
        alert("Please click on the map first to place your guess marker!");
        return;
    }
    if (isSubmitted) return;
    isSubmitted = true;

    const q = quests[currentQuestIndex];
    targetMarker = L.marker([q.lat, q.lng], { icon: starIcon }).addTo(map).bindPopup(`Target: ${q.title}`).openPopup();

    const dist = calculateDistance(selectedLat, selectedLng, q.lat, q.lng);
    // Closer guesses yield higher point multiplier rewards
    const multiplier = Math.max(1.0, (200 / (dist + 10)).toFixed(1));
    const pointsEarned = Math.max(20, Math.round(5000 / (dist + 5) * multiplier));

    score += pointsEarned;
    scoreValEl.textContent = score;
    multiplierValEl.textContent = multiplier + 'x';

    submitBtn.style.display = 'none';
    nextBtn.style.display = 'block';
});

nextBtn.addEventListener('click', () => {
    currentQuestIndex = (currentQuestIndex + 1) % quests.length;
    loadQuest();
});

fetchQuests();