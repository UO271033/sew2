"use strict";
class MapaGeoJSON {

    verMapa() {  
        this.apiKey = "pk.eyJ1IjoidW8yNzEwMzMiLCJhIjoiY2t3am10Y3dzMWpvcjJ4bnN3ODkyM2k0ZiJ9._wVhm3gU5B2IxCcoQkGFcQ";
        this.estilo = "mapbox://styles/uo271033/ckwjmxgyj4aru14nssf5dlh45";
        this.centro = [-5.66152, 43.53573];
    }

    cargarArchivos(files) {
        var file = files[0];
        var fileReader = new FileReader();          
        fileReader.onload = function(evento) {
            var json = fileReader.result;
            var geojson = JSON.parse(json);
            L.mapbox.accessToken = this.apiKey;
            var mapa = L.mapbox.map('mapa').setView(this.centro, 8).addLayer(L.mapbox.styleLayer(this.estilo)).featureLayer.setGeoJSON(geojson);
        }
        fileReader.readAsText(file);  
    }


}

var mapaGeoJSON = new MapaGeoJSON();