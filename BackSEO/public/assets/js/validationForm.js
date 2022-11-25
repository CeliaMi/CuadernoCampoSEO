
        var emailField = document.getElementById("alerta_emailContacto");
        const Validar = document.getElementByClass("btnalert");

        function validateEmail(email) {
            const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }

        emailField.addEventListener("change", function () {
            const email = emailField.value;
            if (validateEmail(email)) {
                innerHTML = 'Email correcto';
            } else {
                innerHTML = 'Email incorrecto';
            }
        });