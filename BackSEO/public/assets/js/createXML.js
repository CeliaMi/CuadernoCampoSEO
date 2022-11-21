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
            var descripcion = document.getElementById('Descripcion').innerHTML;
            var nivel = document.getElementById('Nivel').innerHTML;
            var tipo = document.getElementById('Tipo').innerHTML;
            console.log(descripcion);
        return {
            descripcion,
            nivel,
            tipo,    
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

    //Genera un objeto Blob con los datos en un archivo TXT
    function generarTexto(datos) {
        var texto = [];
        texto.push('Alerta:\n');
        texto.push('Descripcion: ');
        texto.push(datos.descripcion);
        texto.push('\n');
        texto.push('Nivel: ');
        texto.push(datos.nivel);
        texto.push('\n');
        texto.push('Tipo: ');
        texto.push(datos.tipo);
        texto.push('\n');
        console.log(datos.tipo);
        //El contructor de Blob requiere un Array en el primer parámetro
        //así que no es necesario usar toString. el segundo parámetro
        //es el tipo MIME del archivo
        return new Blob(texto, {
            type: 'text/plain'
        });

        
    };


    //Genera un objeto Blob con los datos en un archivo XML
    function generarXml(datos) {
        var texto = [];
        texto.push('<?xml version="1.0" encoding="UTF-8" ?>\n');
        texto.push('<datos>\n');
        texto.push('\t<descripcion>');
        texto.push(escaparXML(datos.descripcion));
        texto.push('</descripcion>\n');
        texto.push('\t<nivel>');
        texto.push(escaparXML(datos.nivel));
        texto.push('</nivel>\n');
        texto.push('\t<tipo>');
        texto.push(escaparXML(datos.tipo));
        texto.push('</tipo>\n');
        texto.push('</datos>');
        //No olvidemos especificar el tipo MIME correcto :)
        return new Blob(texto, {
            type: 'application/xml'
        });
    };

    document.getElementById('boton-xml').addEventListener('click', function () {
        var datos = obtenerDatos();
        descargarArchivo(generarXml(datos), 'archivo.xml');
    }, false);

    document.getElementById('boton-txt').addEventListener('click', function () {
        var datos = obtenerDatos();
        descargarArchivo(generarTexto(datos), 'archivo.txt');
    }, false);