<?php
##Parametros de conexion a la base de datos del aplicativo
$host="localhost";
$port=3306;
$socket="";
$user="root";
$password="";
$dbname="normaliza";

if(!($con = new mysqli($host, $user, $password, $dbname,$port, $socket))){
    die ('No se puede conectar a la Base de Datos.' . mysqli_connect_error());
}else{
   /*echo "Conectado a la Base de Datos exitosamente <h2>Bienvenido</h2>";*/
}
?>