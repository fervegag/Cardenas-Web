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
if(!isset($_POST['add_nombre'])||!isset($_POST['add_direccion'])){
    echo "Datos enviados incorrectamente";
}else{
    $nombre = $_POST['add_nombre'];
    $dir = $_POST['add_direccion'];
    $sqlNuevoGym = "INSERT INTO `gym` (`gym_code`,`gym_name`,`adress`)
                    VALUES (null, '$nombre', '$dir')";
    $NuevoGym = $mysqli->query($sqlNuevoGym);
    if ($NuevoGym) {
        header('location: gimnasios.php');
    } else {
        echo "Ha fallado la subida, reintente nuevamente. <br><br>";
        echo mysqli_errno($mysqli).' - '.mysqli_error($mysqli);
    }
}
$mysqli->close();
?>
