<?php

//CONEXION A WEB APP EN AZURE

//Información de conexión
$connectionInfo = array(
    "UID" => "HakuMolarAdmon",
    "pwd" => "{H4kuM0l4r#4dm1n}", 
    "Database" => "hakumolardb", 
    "LoginTimeout" => 30, 
    "Encrypt" => 1, 
    "TrustServerCertificate" => 0);

//Nombre del servidor
$serverName = "tcp:hakumolarserver.database.windows.net,1433";

//Conexión y revisión de conexión
try{
    $conexion = sqlsrv_connect($serverName, $connectionInfo);
    if ($conexion) {
        echo "Conexión exitosa :D";
    }
}catch(Exception $e){
    echo "Error de conexión".$e;
    die(print_r(sqlsrv_errors(), true));
}   

?>