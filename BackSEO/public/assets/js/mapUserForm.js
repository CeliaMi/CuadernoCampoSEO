            
            //bibliografía (https://leafletjs.com/reference.html).

            var map = L.map('map').locate({setView: true, maxZoom:200});
            L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            // para elegir el aspecto del mapa (http://leaflet-extras.github.io/leaflet-providers/preview/)
                attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
            }).addTo(map);
            
            var myIcon = L.icon({

                iconUrl: 'https://www.svgrepo.com/show/32372/placeholder.svg',           
                iconSize:     [38, 95], // size of the icon
                shadowSize:   [50, 64], // size of the shadow
                iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
                shadowAnchor: [4, 62],  // the same for the shadow
                popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor

            });
    
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
                var mimarker = L.marker(a,{icon: myIcon, draggable:true}).addTo(map);               
                mimarker.on("dragend", function(e) {
                var position = mimarker.getLatLng();
                // pintar en HTML latlng
                var inputUbicacion = document.getElementById('alerta_ubicacion');
                var visualizacion = document.getElementById('visualizacionUbicacion');
                inputUbicacion.value = `${position.lat},${position.lng}`;
                visualizacion.innerHTML = `${position.lat},${position.lng}`;
                // mapa centrado en función del marcador
                window.addEventListener("load", map.flyToBounds([
                [ mimarker.getLatLng().lat, mimarker.getLatLng().lng]
                ]));

                });



            };
