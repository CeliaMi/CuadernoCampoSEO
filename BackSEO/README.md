Back AlertSeo

  <Proyecto.>
Proyecto para SEO BirdLife con el objetivo de crear una aplicación de alertas de amenazas en el medio ambiente que resulte accesible y usable para el usuario.No es necesario el login en los usuarios pero existe el perfil del adiministrador para gestionar los datos mediante un crud.

Este proyecto ha sido realizado por las siguientes programadoras: 
    -Celia Millán.
    -Oliris Fernandez.
    -Florangel Ramirez.
    -Alicia Gárgoles.
    -Cristal Lightbourn.
 <Stack>
El proyecto se ha levantado untilizando PHP con el framework de Symfony versión 5.4, la instalación de composer y Xampp (en Windows, en el caso de otras marcas es necesaria la utulización de otro paquete) y la utilización de Javascrip, HTML y CSS para el Front. 




1. Ya tenemos enlazada la Base de Datos en el archivo .env

tenemos que  crear una base de datos local con el mismo nombre en este caso : alertseo
abajo te dejo el enlace para que puedas verlo.
DATABASE_URL="mysql://root@127.0.0.1:3306/alertseo"

2. Introducir los comandos
composer require symfony/runtime
composer require symfony/asset
composer require symfony/security-bundle
<!-- composer require symfony/filesystem -->
composer require symfony/serializer
composer require --dev symfony/test-pack
composer require --dev doctrine/doctrine-fixtures-bundle


3. Migra las entidades a tu base de datos

php bin/console make:migration
php bin/console doctrine:migrations:migrate
