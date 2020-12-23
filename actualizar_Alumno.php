<?php
$id = $_GET['varid'];
$nombre = $_GET['varnombre'];
$apellidos = $_GET['varapellidos'];
$telefono = $_GET['vartel'];
$emergencias = $_GET['varemer'];
$estado = $_GET['varestado'];
$direccion = $_GET['vardir'];
// echo $id." - ".$nombre." - ".$apellidos." - ".$telefono." - ".$emergencias." - ".$estado." - ".$direccion;
include('dbmanager/config.php');
$sqlActualizarAlumno = "UPDATE pupil SET first_name = '".$nombre."', last_name = '".$apellidos."', phone_num = '".$telefono."', emergency_phone = '".$emergencias."', status_p = ".$estado.", adress = '".$direccion."' 
                        WHERE pupil_id = '".$id."'";
$ActualizarAlumno = $mysqli->query($sqlActualizarAlumno);
if($ActualizarAlumno){
    header('location: alumnos.php');
}else{
    echo "Todo mal";
}
$mysqli->close();
?>