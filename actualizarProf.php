<?php
$code = $_GET['varcodigo'];
$cinta = $_GET['varcinta'];
$correo = $_GET['varcorreo'];
$telefono = $_GET['vartelefono'];
$gym = $_GET['vargym'];
include('dbmanager/config.php');
$sqlActualizarProf = "UPDATE instructor 
                        SET belt_id1 = '".$cinta."', email = '".$correo."', phone_num = '".$telefono."', gym_code1 = '".$gym."'
                        WHERE reg_code = '".$code."'";
$actualizarProf = $mysqli->query($sqlActualizarProf);
if($actualizarProf){
    header('location: profesor.php');
    // echo "Ha fallado la subida, reintente nuevamente. <br><br>";
    //         echo mysqli_errno($mysqli).' - '.mysqli_error($mysqli);
}else{
    echo "Consulta mal efectuada";
}
$mysqli->close();
?>