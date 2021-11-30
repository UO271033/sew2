"use strict";
class MapaDinamico {

    constructor() {

        this.apiKey = "pk.eyJ1IjoidW8yNzEwMzMiLCJhIjoiY2t3am10Y3dzMWpvcjJ4bnN3ODkyM2k0ZiJ9._wVhm3gU5B2IxCcoQkGFcQ";
        this.zoom = 10;
        this.centro = [-5.66152, 43.53573];
        this.estilo = "mapbox://styles/uo271033/ckwjmxgyj4aru14nssf5dlh45";
        this.contenedor = "mapa";

    }
        
    verMapa() {
        mapboxgl.accessToken = this.apiKey;
        let mapa = new mapboxgl.Map({
            container: this.contenedor,
            style: this.estilo,
            center: this.centro,
            zoom: this.zoom
        });
        let marcador = new mapboxgl.Marker().setLngLat(this.centro).addTo(mapa);
        
    }

}

var mapaDinamico = new MapaDinamico();