Back AlertSeo

1.enlazamos la Base de Datos en el archivo .env

en nuestro caso creamos una local de prueba
DATABASE_URL="mysql://root@127.0.0.1:3306/alertseo"

2.Migra las entidades a tu base de datos

php bin/console make:migration
php bin/console doctrine:migrations:migrate

