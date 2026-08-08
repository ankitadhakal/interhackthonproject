document.addEventListener("DOMContentLoaded", () => {
    const greenMarkerIcon = L.icon({
        iconUrl: "/img/Gpin.png",
        iconSize: [38, 40],
        iconAnchor: [19, 40],
        popupAnchor: [0, -40]
    });

    const redMarkerIcon = L.icon({
        iconUrl: "/img/Rpin.png",
        iconSize: [38, 40],
        iconAnchor: [19, 40],
        popupAnchor: [0, -40]
    });

    const map = L.map('map').setView([27.7172, 85.3240], 12);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    function onMapClick(e) {
        const marker = L.marker(e.latlng, { icon: greenMarkerIcon }).addTo(map);
        marker.bindPopup(`Selected location<br>Lat: ${e.latlng.lat.toFixed(4)}, Lng: ${e.latlng.lng.toFixed(4)}`).openPopup();
    }
    map.on('click', onMapClick);

    async function handleSearch(inputId, pinIcon) {
        const inputField = document.getElementById(inputId);
        if (!inputField) return;

        const query = inputField.value.trim();
        if (!query) return;

        const url = `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(query)}`;

        try {
            const response = await fetch(url, {
                headers: { 'User-Agent': 'TripNep-App' }
            });
            const data = await response.json();

            if (data.length > 0) {
                const { lat, lon, display_name } = data[0];

                map.flyTo([lat, lon], 14);
                L.marker([lat, lon], { icon: pinIcon })
                    .addTo(map)
                    .bindPopup(`<b>${display_name}</b>`)
                    .openPopup();
            } else {
                alert('Location not found. Try searching for another place!');
            }
        } catch (err) {
            console.error('Search error:', err);
        }
    }

    const startInput = document.getElementById('custom-search');
    if (startInput) {
        startInput.addEventListener('keydown', (event) => {
            if (event.key === 'Enter') {
                event.preventDefault();
                handleSearch('custom-search', greenMarkerIcon);
            }
        });
    }

    const destInput = document.getElementById('destination-search');
    if (destInput) {
        destInput.addEventListener('keydown', (event) => {
            if (event.key === 'Enter') {
                event.preventDefault();
                handleSearch('destination-search', redMarkerIcon);
            }
        });
    }
});