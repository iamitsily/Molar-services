<?php 

include '../conexion.php';

$id=$_POST['id'];
$dia=$_POST['dia']; 
$hora=$_POST['hora'];
$motivo=$_POST['motivo'];
$estado=$_POST['estado'];
$status=$_POST['status'];
$idUsuario=$_POST['idUsuario'];
$idMedico=$_POST['idMedico'];
$descripcion=$_POST['descripcion'];




$consulta = "INSERT INTO cita (id, dia, hora, motivo, estado, status, idUsuario,idMedico,descripcion) values (?,?,?,?,?,?,?,?,?)"; 
$params = array($id,$dia,$hora,$motivo,$estado,$status,$idUsuario,$idMedico, $descripcion);
$stmt = sqlsrv_prepare($conexion, $consulta, $params);

if (sqlsrv_execute($stmt) === false) {
    die(print_r(sqlsrv_errors(), true));
    echo "Registro fallido";
}else{
    echo "Registro exitoso";
}

sqlsrv_close($conexion);

?>