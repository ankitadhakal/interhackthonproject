var map = L.map('map').setView([51.55, -0.09], 13);



L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);


function onMapClick(e) {
    var marker = L.marker(e.latlng,{icon: greenMarker}).addTo(map);
    marker.bindPopup("hello");
}

var greenMarker = L.icon({
    iconUrl: "/img/Gpin.png",
    iconSize: [38, 40],
    iconAnchor: [22, 94],
    popupAnchor: [-3, -76]
});
var redMarker = L.icon({
    iconUrl: "/img/Rpin.png",
    iconSize: [38, 40],
    iconAnchor: [22, 94],
    popupAnchor: [-3, -76]
});

map.on('click', onMapClick);