<?php 

include '../conexion.php';

//$consulta = "SELECT * FROM dbo.usuario";
$matricula = $_POST['matricula'];

$consulta = "SELECT * from cita WHERE idUsuario = $matricula AND status=1";
$stmt = sqlsrv_query($conexion, $consulta);

//guarda la consulta 
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

$usuarios = array();
$usuarios['datos'] =array();
while ($row = sqlsrv_fetch_array($stmt)) {
    $index['id'] =$row['0'];
    $index['dia'] =$row['1']; 
    $index['hora'] =$row['2'];
    $index['motivo'] = $row['3'];
    $index['estado'] = $row['4'];
    //rol
    array_push($usuarios['datos'], $index);
}
$usuarios["exito"]="1";
echo json_encode($usuarios);

sqlsrv_free_stmt($stmt); //libera la memoria asociada con el resultado de la consulta SQL
sqlsrv_close($conexion);


?>