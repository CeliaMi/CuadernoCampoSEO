Back AlertSeo

1.Ya tenemos enlazada la Base de Datos en el archivo .env

tenemos que  crear una base de datos local con el mismo nombre en este caso : alertseo
abajo te dejo el enlace para que puedas verlo.
DATABASE_URL="mysql://root@127.0.0.1:3306/alertseo"

2.Migra las entidades a tu base de datos

php bin/console make:migration
php bin/console doctrine:migrations:migrate



