class MapaDinamico {

    constructor (){
        navigator.geolocation.getCurrentPosition(this.getPosicion.bind(this), this.verErrores.bind(this));
    }
    getPosicion(posicion){
        this.apiKey = "pk.eyJ1IjoidW8yNzEwMzMiLCJhIjoiY2t3am10Y3dzMWpvcjJ4bnN3ODkyM2k0ZiJ9._wVhm3gU5B2IxCcoQkGFcQ";
        this.zoom = 10;
        this.centro = [posicion.coords.longitude, posicion.coords.latitude];
        this.estilo = "mapbox://styles/uo271033/ckwjmxgyj4aru14nssf5dlh45";
        this.contenedor = "mapa";
    }
    verErrores(error){
        switch(error.code) {
        case error.PERMISSION_DENIED:
            this.mensaje = "El usuario no permite la petición de geolocalización"
            break;
        case error.POSITION_UNAVAILABLE:
            this.mensaje = "Información de geolocalización no disponible"
            break;
        case error.TIMEOUT:
            this.mensaje = "La petición de geolocalización ha caducado"
            break;
        case error.UNKNOWN_ERROR:
            this.mensaje = "Se ha producido un error desconocido"
            break;
        }
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

    cambiarEstiloSatelite() {
        this.estilo = "mapbox://styles/uo271033/ckwkwyqjh4me815p26o3tpu1l";
        this.verMapa();
    }

}

var miMapa = new MapaDinamico();

