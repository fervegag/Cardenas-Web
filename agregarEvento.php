<?php
include('dbmanager/config.php');
if(!isset($_POST['add_nombre'])||!isset($_POST['add_tipo'])||!isset($_POST['add_fecha'])||!isset($_POST['add_hora'])||!isset($_FILES['add_imagen'])||!isset($_POST['add_direccion'])){
    echo "No se recibieron los datos el evento";
}else{
    $nombre = $_POST['add_nombre'];
    $tipo = $_POST['add_tipo'];
    $fecha = $_POST['add_fecha'];
    $hora = $_POST['add_hora'];
    $direccion = $_POST['add_direccion'];
    $revisar = getimagesize($_FILES['add_imagen']['tmp_name']);
    if ($revisar !== false) {
        $image = $_FILES['add_imagen']['tmp_name'];
        $imgContenido = addslashes(file_get_contents($image));
        $sqlnuevoEvento = "INSERT INTO `tournament` (`tournament_id`, `name_t`, `type_t`, `location_t`, `date_t`, `time_t`, `picture`) VALUES
                            (NULL, '$nombre', '$tipo', '$direccion', '$fecha', '$hora', '$imgContenido')";
        $nuevoEvento = $mysqli->query($sqlnuevoEvento);
        if ($nuevoEvento) {
            // echo "Archivo Subido Correctamente.";
            header('location: EventosAdmin.php');
        } else {
            echo "Ha fallado la subida, reintente nuevamente. <br><br>";
            echo mysqli_errno($mysqli).' - '.mysqli_error($mysqli);
        }
    } else {
        echo "Seleccione una imagen a subir";
    }
}
$mysqli->close();
