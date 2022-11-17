<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'nombre de la base de datos');

$con=mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
mysqli_set_charset($con, 'utf8');

if(!$con){
    die("mensaje de error".mysqli_error($con));
}
if (@mysqli_connect_errno()){
    die("fallo de conexion".mysqli_connect_errno().":". mysqli_connect_errno)
}
