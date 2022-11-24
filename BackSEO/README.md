Alerta SEO Birdlife

<Proyecto>
  Proyecto para SEO BirdLife con el objetivo de crear una aplicación de alertas de amenazas en el medio ambiente que resulte accesible y usable para el usuario. No es necesario el login en los usuarios pero existe el perfil del adiministrador para gestionar los datos mediante un crud.

  Este proyecto ha sido realizado por las siguientes programadoras: 
      -Celia Millán.
      -Oliris Fernández.
      -Florangel Ramirez.
      -Alicia Gárgoles.
      -Cristal Lightbourn.
<Stack>
  El proyecto se ha levantado utilizando PHP versión 8.1.6 con el framework de Symfony versión 5.4, Javascript y la instalación de composer y Xampp para el Back, y HTML Twig, CSS, las librerías Bootstrap y Leaflet para el Front. 



1. Enlazada la Base de Datos en el archivo .env

Base de datos local creada con el nombre: alertseo
DATABASE_URL="mysql://root@127.0.0.1:3306/alertseo"

2. Introducir los comandos

composer require symfony/runtime
composer require symfony/asset
composer require symfony/security-bundle
composer require symfony/serializer
composer require --dev symfony/test-pack
composer require --dev doctrine/doctrine-fixtures-bundle


3. Migra las entidades a tu base de datos

php bin/console make:migration
php bin/console doctrine:migrations:migrate
