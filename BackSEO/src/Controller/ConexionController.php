<?php

if (!defined('DB_HOST')) define('DB_HOST','localhost');
if (!defined('DB_USER')) define('DB_USER','root');
if (!defined('DB_PASS')) define('DB_PASS','');
if (!defined('DB_NAME')) define('DB_NAME','alertseo');

$con=mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
mysqli_set_charset($con, 'utf8');

if(!$con){
    die("mensaje de error".mysqli_error($con));
}
if (@mysqli_connect_errno()){
    die("fallo de conexion".mysqli_connect_errno().":". mysqli_connect_errno);
}
