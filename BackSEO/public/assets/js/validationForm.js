
     var nameUser = document.getElementById("userName");
     const Saludar = document.getElementById("buttonSaludar");
     const saludoPersona = document.getElementById("saludoPersonal");
     const despedir = document.getElementById("despedida");
     
     Saludar.addEventListener("click", function () {
         const nameUser = userName.value;
         if (nameUser==="") {
             saludoPersona.innerHTML = '<h1>'+'💔'+'</h1>'+'Ok..no me quieres decir tu nombre...' + '<br>'+'te doy la bienvenida igualmente,' + '<br>'+' espero que te diviertas mucho' + '<br>'+ '<h2>'+'¿Comenzamos?'+'</h2>';
             despedir.innerHTML = 'Persona sin nombre Gracias por llegar hasta aquí'
         } else {
             saludoPersona.innerHTML = '<h1>'+'👋🏾'+'</h1>'+`¡Encanta de conocerte, ${nameUser}!` + '<br>'+' te doy la bienvenida a mi formulario,' + '<br>'+' espero que te diviertas mucho' + '<h2>'+'¿Comenzamos?'+'</h2>';
             despedir.innerHTML = '<h1>'+'❤'+'</h1>'+`¡${nameUser} Gracias por llegar hasta aquí!`;
         }
             
     });
        var emailField = document.getElementById("emailField");
        const Validar = document.getElementById("buttonValidar");

        function validateEmail(email) {
            const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }

        Validar.addEventListener("click", function () {
            const email = emailField.value;
            if (validateEmail(email)) {
                alert( 'Enhorabuena tu email es correcto🙌');
            } else {
                alert( '"' + emailField.value + '"' +' es un email incorrecto💩');
            }
        });