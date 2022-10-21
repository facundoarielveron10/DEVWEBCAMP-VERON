(function() {
    if(document.querySelector('#mapa')) {
        // Junin, Provincia de Buenos Aires, Argentina
        const latitud = -34.594029;
        const longitud = -60.946334;
        const zoom = 16;

        const map = L.map('mapa').setView([latitud, longitud], zoom);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([latitud, longitud]).addTo(map)
            .bindPopup(`
                <h2 class="mapa__heading">DevWebCamp</h2>
                <p class="mapa__texto">Junin, Provincia de Buenos Aires, Argentina</p>
            `)
            .openPopup();
    }
})();