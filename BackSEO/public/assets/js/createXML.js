    function descargarArchivo(contenidoEnBlob, Alertas) {
    var reader = new FileReader();
    reader.onload = function (event) {
            var save = document.createElement('a');
            save.href = event.target.result;
            save.target = '_blank';
            save.download = Alertas || 'archivo.dat';
            var clicEvent = new MouseEvent('click', {
                'view': window,
                    'bubbles': true,
                    'cancelable': true
            });
            save.dispatchEvent(clicEvent);
            (window.URL || window.webkitURL).revokeObjectURL(save.href);
        };
        reader.readAsDataURL(contenidoEnBlob);
        console.log(contenidoEnBlob);
        console.log(Alertas);
    };

    //Función de ayuda: reúne los datos a exportar en un solo objeto
    function obtenerDatos() {
            var tipo = document.getElementById('Tipo').innerHTML;
            var ubicaciones = document.getElementById('Ubicacion').innerHTML;
            var descripcion = document.getElementById('Descripcion').innerHTML;
            var gravedad = document.getElementById('Gravedad').innerHTML;
            var superficie = document.getElementById('Superficie').innerHTML;
            var tiempo = document.getElementById('Tiempo').innerHTML;
            var impacto = document.getElementById('Impacto').innerHTML;
            var contacto = document.getElementById('Contacto').innerHTML;
            console.log(descripcion);

        return {
            tipo,
            ubicaciones,
            descripcion,
            gravedad,
            superficie,
            tiempo,
            impacto, 
            contacto,   
        };
    };



    //Función de ayuda: "escapa" las entidades XML necesarias
    //para los valores (y atributos) del archivo XML
    function escaparXML(cadena) {
        if (typeof cadena !== 'string') {
            return '';
        };
        cadena = cadena.replace('&', '&amp;')
            .replace('<', '&lt;')
            .replace('>', '&gt;')
            .replace('"', '&quot;');
        return cadena;
    };

    //Genera un objeto Blob con los datos en un archivo XML
    function generarXml(datos) {
        var texto = [];
        texto.push('<?xml version="1.0" encoding="UTF-8" ?>\n');
        texto.push('<datos>\n');
        texto.push('\t<tipo>');
        texto.push(escaparXML(datos.tipo));
        texto.push('</tipo>\n');
        texto.push('\t<ubicacion>');
        texto.push(escaparXML(datos.ubicaciones));
        texto.push('</ubicacion>\n');
        texto.push('\t<descripcion>');
        texto.push(escaparXML(datos.descripcion));
        texto.push('</descripcion>\n');
        texto.push('\t<gravedad>');
        texto.push(escaparXML(datos.gravedad));
        texto.push('</gravedad>\n');
        texto.push('\t<superficie>');
        texto.push(escaparXML(datos.superficie));
        texto.push('</superficie>\n');
        texto.push('\t<tiempo>');
        texto.push(escaparXML(datos.tiempo));
        texto.push('</tiempo>\n');
        texto.push('\t<impacto>');
        texto.push(escaparXML(datos.impacto));
        texto.push('</impacto>\n');
        texto.push('\t<contacto>');
        texto.push(escaparXML(datos.contacto));
        texto.push('</contacto>\n');
        texto.push('</datos>');
 
        return new Blob(texto, {
            type: 'application/xml'
        });
    };

    document.getElementById('boton-xml').addEventListener('click', function () {
        var datos = obtenerDatos();
        descargarArchivo(generarXml(datos), 'tablaAmenaza.xml');
    }, false);

