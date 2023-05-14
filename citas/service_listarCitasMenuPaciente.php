<?php 

include '../conexion.php';

$matricula = $_POST['matricula'];

$consulta = "SELECT cita.id, cita. dia, cita.hora, cita.motivo, medico.nombre, medico.apellidoPaterno from cita JOIN medico ON cita.idMedico=medico.matricula WHERE cita.idUsuario = $matricula AND cita.status=1";
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
    $index['nombre'] = $row['4'];
    $index['apellidoPaterno'] = $row['5'];

    //rol
    array_push($usuarios['datos'], $index);
}
$usuarios["exito"]="1";
echo json_encode($usuarios);

sqlsrv_free_stmt($stmt); //libera la memoria asociada con el resultado de la consulta SQL
sqlsrv_close($conexion);


?>