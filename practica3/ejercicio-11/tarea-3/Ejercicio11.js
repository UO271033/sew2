"use strict";
class MapaEstatico {
    constructor (){
        navigator.geolocation.getCurrentPosition(this.getPosicion.bind(this), this.verErrores.bind(this));
    }
    getPosicion(posicion){
        this.mensaje = "Se ha realizado correctamente la petición de geolocalización";
        this.longitud         = posicion.coords.longitude; 
        this.latitud          = posicion.coords.latitude;  
        this.precision        = posicion.coords.accuracy;
        this.altitud          = posicion.coords.altitude;
        this.precisionAltitud = posicion.coords.altitudeAccuracy;
        this.rumbo            = posicion.coords.heading;
        this.velocidad        = posicion.coords.speed;    
        this.zoom = 11;
        this.rotacion = 0;    
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
    getLongitud(){
        return this.longitud;
    }
    getLatitud(){
        return this.latitud;
    }
    getAltitud(){
        return this.altitud;
    }
    verTodo(){
        var datos='<section>'; 
        datos+='<h2>Tu posición</h2>';
        datos+='<p>'+ this.mensaje + '</p>'; 
        datos+='<p>Longitud: '+this.longitud +' grados</p>'; 
        datos+='<p>Latitud: '+this.latitud +' grados</p>';
        datos+='<p>Precisión de la latitud y longitud: '+ this.precision +' metros</p>';
        datos+='<p>Altitud: '+ this.altitude +' metros</p>';
        datos+='<p>Precisión de la altitud: '+ this.precisionAltitud +' metros</p>'; 
        datos+='<p>Rumbo: '+ this.rumbo +' grados</p>'; 
        datos+='<p>Velocidad: '+ this.velocidad +' metros/segundo</p>';
        datos+='</section>';

        $("section").remove();
        $("body").append(datos);
    }
    getMapaEstatico(){
        
        var apiKey = "?access_token=pk.eyJ1IjoidW8yNzEwMzMiLCJhIjoiY2t3am45cGllMGI4MjJvcGR2a2g1dHp5NCJ9.vd2ZIjLFCGeTVZWipS1z3w";
        var url = "https://api.mapbox.com/styles/v1/mapbox/streets-v11/static/";
        var centro = this.longitud + "," + this.latitud + "," + this.zoom + "," + this.rotacion;
        var tamaño= "/800x600";
        var marcador = "pin-s+000000(" + this.longitud + "," + this.latitud + ")/";
        
        this.imagenMapa = url + marcador + centro + tamaño + apiKey;
        $("main").html("<img src='"+this.imagenMapa+"' alt='mapa estático' />");
    }
}
var miMapa = new MapaEstatico();
