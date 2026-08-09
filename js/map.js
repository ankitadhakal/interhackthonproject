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

    let startMarker = null;
    let destMarker = null;
    let startCoords = null;
    let destCoords = null;
    let routeLine = null;

    async function drawRoute() {
        if (!startCoords || !destCoords) return;

        if (routeLine) {
            map.removeLayer(routeLine);
        }

        const url = `https://router.project-osrm.org/route/v1/driving/${startCoords.lng},${startCoords.lat};${destCoords.lng},${destCoords.lat}?overview=full&geometries=geojson`;

        try {
            const response = await fetch(url);
            const data = await response.json();

            if (data.routes && data.routes.length > 0) {
                const routeCoordinates = data.routes[0].geometry.coordinates.map(coord => [coord[1], coord[0]]);
                routeLine = L.polyline(routeCoordinates, {
                    color: '#2563eb',
                    weight: 5,
                    opacity: 0.8
                }).addTo(map);

                const bounds = L.latLngBounds([startCoords, destCoords]);
                map.fitBounds(bounds, { padding: [60, 60] });
            }
        } catch (err) {
            console.error('Routing error:', err);
        }
    }

    async function handleSearch(inputId, pinIcon, isStart) {
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
                const lat = parseFloat(data[0].lat);
                const lon = parseFloat(data[0].lon);
                const displayName = data[0].display_name;
                const latlng = { lat, lng: lon };

                if (isStart) {
                    if (startMarker) map.removeLayer(startMarker);
                    startCoords = latlng;
                    startMarker = L.marker(latlng, { icon: pinIcon })
                        .addTo(map)
                        .bindPopup(`<b>Start:</b> ${displayName}`);
                    startMarker.openPopup();
                } else {
                    if (destMarker) map.removeLayer(destMarker);
                    destCoords = latlng;
                    destMarker = L.marker(latlng, { icon: pinIcon })
                        .addTo(map)
                        .bindPopup(`<b>Destination:</b> ${displayName}`);
                    destMarker.openPopup();
                }

                if (startCoords && destCoords) {
                    drawRoute();
                } else {
                    map.flyTo(latlng, 14);
                }
            } else {
                alert('Location not found.');
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
                handleSearch('custom-search', greenMarkerIcon, true);
            }
        });
    }

    const destInput = document.getElementById('destination-search');
    if (destInput) {
        destInput.addEventListener('keydown', (event) => {
            if (event.key === 'Enter') {
                event.preventDefault();
                handleSearch('destination-search', redMarkerIcon, false);
            }
        });
    }
});