            
            //bibliografía (https://leafletjs.com/reference.html).

            var map = L.map('map').locate({setView: true, maxZoom:200});
            L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            // para elegir el aspecto del mapa (http://leaflet-extras.github.io/leaflet-providers/preview/)
                attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
            }).addTo(map);
            
    
            function buscarLocalizacion(e) {
                moveMarker(e.latlng);
            };

            function errorLocalizacion(e) {
            alert("No es posible encontrar su ubicación. Es posible que tenga que activar la geolocalización.");
            }
            map.on('locationerror', errorLocalizacion);
            map.on('locationfound', buscarLocalizacion);

             //  moveMarker actualiza latlng en funcion de donde se posicione el marcador.

            function moveMarker(a){
                var mimarker = L.marker(a,{draggable:true}).addTo(map);               
                mimarker.on("dragend", function(e) {
                var position = mimarker.getLatLng();
                // pintar en HTML latlng
                var inputUbicacion = document.getElementById('alerta_ubicacion');
                var visualizacion = document.getElementById('visualizacionUbicacion')
                inputUbicacion.value = `${position.lat},${position.lng}`;
                visualizacion.innerHTML = `${position.lat},${position.lng}`;
                // mapa centrado en función del marcador
                window.addEventListener("load", map.flyToBounds([
                [ mimarker.getLatLng().lat, mimarker.getLatLng().lng]
                ]));

                });



            };
