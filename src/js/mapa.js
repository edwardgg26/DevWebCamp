if(document.querySelector("#mapa")){
    const latitud = 3.444371;
    const longitud =  -76.505199;
    const zoom = 16;
    const map = L.map('mapa').setView([latitud, longitud], zoom);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    
    L.marker([latitud, longitud]).addTo(map)
        .bindPopup(`<h2>DevWebCamp</h2>
                    <p>Centro de conferencias y workshops</p>`)
        .openPopup();
}