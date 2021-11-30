"use strict";
class MapaKML {

    constructor() {

        this.apiKey = "pk.eyJ1IjoidW8yNzEwMzMiLCJhIjoiY2t3am10Y3dzMWpvcjJ4bnN3ODkyM2k0ZiJ9._wVhm3gU5B2IxCcoQkGFcQ";
        this.estilo = "mapbox://styles/uo271033/ckwjmxgyj4aru14nssf5dlh45";

    }

    verMapa() {
        L.mapbox.accessToken = this.apiKey;
        var mapa = L.mapbox.map('mapa').addLayer(L.mapbox.styleLayer(this.estilo));

        var kml = omnivore.kml('personas.kml')
        .on('ready', function () {
            mapa.fitBounds(kml.getBounds());
        })
        .addTo(mapa);
    }

}

var mapaKML = new MapaKML();