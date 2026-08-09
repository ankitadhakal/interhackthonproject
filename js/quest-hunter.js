let quests = [];
let currentQuestIndex = 0;
let score = 0;
let selectedLat = null;
let selectedLng = null;
let guessedMarker = null;
let targetMarker = null;
let isSubmitted = false;

const map = L.map('map', {
    dragging: true,
    zoomControl: true,
    scrollWheelZoom: true,
    doubleClickZoom: true,
    boxZoom: true,
    keyboard: true
}).setView([28.3949, 84.1240], 7);

L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
    attribution: 'Tiles &copy; Esri',
    maxZoom: 19
}).addTo(map);

L.tileLayer('https://services.arcgisonline.com/ArcGIS/rest/services/Reference/World_Boundaries_And_Places/MapServer/tile/{z}/{y}/{x}', {
    maxZoom: 19
}).addTo(map);

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
const countrySelect = document.getElementById('country-select');

const countryCenters = {
    NP: { center: [28.3949, 84.1240], zoom: 7 },
    JP: { center: [36.2048, 138.2529], zoom: 6 },
    CH: { center: [46.8182, 8.2275], zoom: 8 },
    US: { center: [37.0902, -95.7129], zoom: 4 },
    FR: { center: [46.6034, 1.8883], zoom: 6 },
    IT: { center: [41.8719, 12.5674], zoom: 6 },
    IN: { center: [20.5937, 78.9629], zoom: 5 },
    GB: { center: [55.3781, -3.4360], zoom: 6 },
    DE: { center: [51.1657, 10.4515], zoom: 6 },
    AU: { center: [-25.2744, 133.7751], zoom: 4 },
    CA: { center: [56.1304, -106.3468], zoom: 4 },
    BR: { center: [-14.2350, -51.9253], zoom: 4 }
};

const regionalDatasets = {
    NP: [
        { title: "Tilicho Lake", desc: "One of the highest freshwater lakes in the world, nestled in the Manang district.", lat: 28.6936, lng: 83.8522 },
        { title: "Lo Manthang", desc: "The ancient walled capital of the former medieval Kingdom of Mustang.", lat: 29.1843, lng: 83.9576 },
        { title: "Gosainkunda Lake", desc: "A sacred alpine oligotrophic lake in Langtang National Park.", lat: 28.0833, lng: 85.4000 },
        { title: "Bandipur Hill Town", desc: "A preserved Newari hilltop settlement offering stunning mountain vistas.", lat: 27.9392, lng: 84.4168 },
        { title: "Shey Phoksundo Lake", desc: "A deep-turquoise alpine lake framed by sheer cliffs in Dolpo.", lat: 29.1417, lng: 82.9533 },
        { title: "Namche Bazaar", desc: "The vibrant Sherpa trading hub and gateway to Mount Everest.", lat: 27.8069, lng: 86.7081 },
        { title: "Muktinath Temple", desc: "A sacred pilgrimage site featuring 108 waterspouts.", lat: 28.8167, lng: 83.8667 },
        { title: "Rara Lake", desc: "The biggest freshwater jewel in the Nepali Himalayas in Mugu.", lat: 29.5397, lng: 82.1281 },
        { title: "Lumbini Maya Devi Temple", desc: "The sacred UNESCO World Heritage birthplace of Buddha.", lat: 27.4705, lng: 83.2752 }
    ],
    JP: [
        { title: "Mount Fuji", desc: "Japan's highest peak and iconic symmetrical stratovolcano.", lat: 35.3606, lng: 138.7274 },
        { title: "Kyoto Kinkaku-ji", desc: "Famous Zen Buddhist temple covered in brilliant gold leaf.", lat: 35.0394, lng: 135.7292 },
        { title: "Hiroshima Peace Memorial", desc: "UNESCO World Heritage monument dedicated to peace.", lat: 34.3955, lng: 132.4536 },
        { title: "Himeji Castle", desc: "Finest surviving example of Japanese castle architecture.", lat: 34.8394, lng: 134.6939 },
        { title: "Tokyo Skytree", desc: "Massive broadcasting and observation tower in Tokyo.", lat: 35.7100, lng: 139.8107 }
    ],
    CH: [
        { title: "Matterhorn", desc: "Iconic pyramid-shaped peak of the Alps on the Swiss-Italian border.", lat: 45.9763, lng: 7.6585 },
        { title: "Jungfraujoch", desc: "Known as the Top of Europe amidst massive glaciers.", lat: 46.5475, lng: 7.9853 },
        { title: "Lake Geneva", desc: "One of Western Europe's largest lakes.", lat: 46.4572, lng: 6.5585 },
        { title: "Chillon Castle", desc: "Historic island castle on Lake Geneva.", lat: 46.4147, lng: 6.9272 }
    ],
    US: [
        { title: "Statue of Liberty", desc: "Colossal neoclassical sculpture on Liberty Island in New York.", lat: 40.6892, lng: -74.0445 },
        { title: "Grand Canyon", desc: "Steep-sided canyon carved by the Colorado River.", lat: 36.1069, lng: -112.1129 },
        { title: "Yellowstone Old Faithful", desc: "Famous predictable geothermal geyser cone.", lat: 44.4605, lng: -110.8281 },
        { title: "Golden Gate Bridge", desc: "Suspension bridge spanning the Golden Gate strait.", lat: 37.8199, lng: -122.4783 }
    ],
    FR: [
        { title: "Eiffel Tower", desc: "Wrought-iron lattice tower on the Champ de Mars in Paris.", lat: 48.8584, lng: 2.2945 },
        { title: "Louvre Museum", desc: "World's largest art museum and historic monument in Paris.", lat: 48.8606, lng: 2.3376 },
        { title: "Mont Saint-Michel", desc: "Tidal island and mainland commune in Normandy.", lat: 48.6360, lng: -1.5115 }
    ],
    IT: [
        { title: "Colosseum", desc: "Oval amphitheatre in the centre of the city of Rome.", lat: 41.8902, lng: 12.4922 },
        { title: "Leaning Tower of Pisa", desc: "Freestanding bell tower of the cathedral of the Italian city of Pisa.", lat: 43.7230, lng: 10.3966 },
        { title: "Venice Grand Canal", desc: "Major water-traffic corridor in Venice.", lat: 45.4340, lng: 12.3388 }
    ],
    IN: [
        { title: "Taj Mahal", desc: "Ivory-white marble mausoleum on the right bank of the river Yamuna.", lat: 27.1751, lng: 78.0421 },
        { title: "Gateway of India", desc: "Arch-monument built during the 20th century in Mumbai.", lat: 18.9220, lng: 72.8347 }
    ],
    GB: [
        { title: "Big Ben & Parliament", desc: "Palace of Westminster and Elizabeth Tower in London.", lat: 51.5007, lng: -0.1246 },
        { title: "Stonehenge", desc: "Prehistoric monument in Wiltshire, England.", lat: 51.1789, lng: -1.8262 }
    ],
    DE: [
        { title: "Brandenburg Gate", desc: "18th-century neoclassical monument in Berlin.", lat: 52.5163, lng: 13.3777 },
        { title: "Neuschwanstein Castle", desc: "19th-century historicist palace on a rugged hill in Bavaria.", lat: 47.5576, lng: 10.7498 }
    ],
    AU: [
        { title: "Sydney Opera House", desc: "Multi-venue performing arts centre in Sydney.", lat: -33.8568, lng: 151.2153 },
        { title: "Uluru", desc: "Large sandstone monolith in the heart of the Northern Territory.", lat: -25.3444, lng: 131.0369 }
    ],
    CA: [
        { title: "CN Tower", desc: "Concrete communications and observation tower in Toronto.", lat: 43.6426, lng: -79.3871 },
        { title: "Banff Lake Louise", desc: "Glacier-fed lake in Banff National Park, Alberta.", lat: 51.4254, lng: -116.1776 }
    ],
    BR: [
        { title: "Christ the Redeemer", desc: "Art Deco statue of Jesus Christ in Rio de Janeiro.", lat: -22.9519, lng: -43.2105 },
        { title: "Iguazu Falls", desc: "Waterfalls of the Iguazu River on the border of Brazil and Argentina.", lat: -25.6953, lng: -54.4367 }
    ]
};

function loadQuestsForSelectedCountry() {
    const code = countrySelect.value;
    let pool = [];

    if (code === 'RANDOM') {
        for (const countryKey in regionalDatasets) {
            regionalDatasets[countryKey].forEach(q => {
                pool.push({ ...q, countryCode: countryKey });
            });
        }
    } else {
        const sourcePool = regionalDatasets[code] || regionalDatasets.NP;
        pool = sourcePool.map(q => ({ ...q, countryCode: code }));
    }

    quests = [...pool].sort(() => Math.random() - 0.5);
    currentQuestIndex = 0;
    loadQuest();
}

countrySelect.addEventListener('change', () => {
    loadQuestsForSelectedCountry();
});

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

    const targetCountry = q.countryCode || countrySelect.value;
    const viewData = countryCenters[targetCountry] || { center: [28.3949, 84.1240], zoom: 7 };
    map.setView(viewData.center, viewData.zoom);
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

    questDescEl.innerHTML = `<strong>Target was: ${q.title}</strong><br>📍 Your guess was <strong>${dist.toFixed(1)} km</strong> away from the actual location!`;

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

loadQuestsForSelectedCountry();