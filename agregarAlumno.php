<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
} else {
}
?>
<?php
include('dbmanager/config.php');
if(!isset($_POST['add_nombre'])||!isset($_POST['add_apellido'])||!isset($_POST['add_fecha'])||!isset($_POST['add_telefono'])||!isset($_POST['add_emergencias'])||!isset($_POST['add_sangre'])||!isset($_POST['add_cinta'])||!isset($_POST['add_estado'])||!isset($_POST['add_direccion'])||!isset($_FILES['add_foto'])){
    echo "Los datos no fueron enviados";
}else{
    //Obteniendo el gimnasio
    $sqlGymProf = "SELECT gym_code1 FROM instructor WHERE reg_code = '".$_SESSION['user_id']."'";
    $resultGymProf = $mysqli->query($sqlGymProf);
    if($resultGymProf->num_rows > 0){
        while($row = $resultGymProf->fetch_assoc()){
            $gym = $row['gym_code1'];
        }
    }else{
        echo "No se encontró al profesor";
    }
    //Datos del alumno
    $nombre = $_POST['add_nombre'];
    $apellido = $_POST['add_apellido'];
    $fecha = $_POST['add_fecha'];
    $telefono = $_POST['add_telefono'];
    $emergencias = $_POST['add_emergencias'];
    $sangre = $_POST['add_sangre'];
    $cinta = $_POST['add_cinta'];
    $estado = $_POST['add_estado'];
    $direccion = $_POST['add_direccion'];
    $sexo = $_POST['add_sexo'];
    $revisar = getimagesize($_FILES['add_foto']['tmp_name']);
    if ($revisar !== false) {
        $image = $_FILES['add_foto']['tmp_name'];
        $imgContenido = addslashes(file_get_contents($image));
        // $sqlnuevaNoticia = "INSERT INTO `news` (`news_id`, `title`, `body`, `picture`, `date_news`, `reg_code1`, `category_id1`) VALUES
        //                     (NULL, '$titulo', '$noticia', '$imgContenido', '$fecha', '$id', '4')";
        $sqlNuevoAlumno ="INSERT INTO `pupil` (`pupil_id`,`first_name`, `last_name`, `birthdate`, `sexo`, `phone_num`, `emergency_phone`, `adress`, `blood_type`, `picture`, `status_p`, `belt_id2`, `gym_code2`) VALUES
                            (NULL, '$nombre', '$apellido', '$fecha', '$sexo', '$telefono', '$emergencias', '$direccion', '$sangre', '$imgContenido', $estado, '$cinta', '$gym')";
        $nuevoAlumno = $mysqli->query($sqlNuevoAlumno);
        if ($nuevoAlumno) {
            // echo "Archivo Subido Correctamente.";
            header('location: alumnos.php');
        } else {
            echo "Ha fallado la subida, reintente nuevamente. <br><br>";
            echo mysqli_errno($mysqli).' - '.mysqli_error($mysqli);
        }
    } else {
        echo "Seleccione una foto a subir";
    }

}
$mysqli->close();
?>