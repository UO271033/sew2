class Multimedia {

    constructor() {
        const image_drop_area = document.querySelector("body > main");
        // Event listener for dragging the image over the div
        image_drop_area.addEventListener('dragover', (event) => {
            event.stopPropagation();
            event.preventDefault();
            // Style the drag-and-drop as a "copy file" operation.
            event.dataTransfer.dropEffect = 'copy';
        });

        // Event listener for dropping the image inside the div
        image_drop_area.addEventListener('drop', (event) => {
            event.stopPropagation();
            event.preventDefault();
            this.fileList = event.dataTransfer.files;
  
            this.leerArchivo(this.fileList);
        });
    }

    leerArchivo(files) { 
        var archivo = files[0];
        var tipoVideo = 'video.*';
        var tipoImagen = 'image.*';

        if (archivo.type.match(tipoVideo)) {
            this.tipo = "video";
            document.querySelector("body > main").innerHTML = "<video controls><source src='" + archivo.name + "' type='video/mp4;' /></video>";
        }
        else if (archivo.type.match(tipoImagen)) {
            this.tipo = "imagen";
            document.querySelector("body > main").innerHTML = "<img src='" + archivo.name + "' alt='Foto' />";
        }
    }

    pantallaCompleta() {
        if (this.tipo == "imagen")
            var multimedia = document.querySelector("body > main > img");
        else   
            var multimedia = document.querySelector("body > main > video");

        if (!document.mozFullScreen && !document.webkitFullScreen) {
            if (multimedia.mozRequestFullScreen) {
                multimedia.mozRequestFullScreen();
            } else {
                multimedia.webkitRequestFullScreen();
            }
        } else {
            if (multimedia.mozCancelFullScreen) {
                multimedia.mozCancelFullScreen();
            } else {
                multimedia.webkitCancelFullScreen();
            }
        }
    }

}

var multimedia = new Multimedia();

