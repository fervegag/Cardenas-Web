<?php
$code = $_GET['varcodigo'];
$puesto = $_GET['varpuesto'];
$cinta = $_GET['varcinta'];
$correo = $_GET['varcorreo'];
$telefono = $_GET['vartelefono'];
include('dbmanager/config.php');
$sqlActualizarAdmin = "UPDATE manager 
                        SET occupation = '".$puesto."', belt_id3 = '".$cinta."', email = '".$correo."', phone_num = '".$telefono."'
                        WHERE reg_code = '".$code."'";
$actualizarAdmin = $mysqli->query($sqlActualizarAdmin);
if($actualizarAdmin){
    header('location: administrativo.php');
}else{
    echo "Consulta mal efectuada";
}
$mysqli->close();
?>