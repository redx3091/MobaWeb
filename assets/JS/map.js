const tilesProvider = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'

const myMap = L.map('mapid').setView([7.904079, -72.500206], 13)

L.tileLayer(tilesProvider, {
    maxZoom: 18,

}).addTo(myMap)

const marker = L.marker([7.904079, -72.500206]).addTo(myMap)