<?php
include('dbmanager/config.php');
$code = $_GET['code'];
$sqlUpdateStatus = "UPDATE logininfo set status_user = 'b1' where user_code = '" . $code . "'";
$update = $mysqli->query($sqlUpdateStatus);
if ($update) {
    $sqlTipoUsuario = "SELECT type_user FROM logininfo WHERE user_code = '" . $code . "'";
    $tipo = $mysqli->query($sqlTipoUsuario);
    if ($tipo->num_rows > 0) {
        while ($row = $tipo->fetch_assoc()) {
            $type = $row['type_user'];
        }
        if ($type != '0') { //Es un Admin
            $sqlEmail = "SELECT email FROM manager WHERE reg_code ='" . $code . "'";
            $resemail = $mysqli->query($sqlEmail);
            if ($resemail->num_rows > 0) {
                while ($row2 = $resemail->fetch_assoc()) {
                    $email = $row2['email'];
                }
                header('location: email_aprobaciones.php?user=' . $code . '&email=' . $email);
            }
        } else { //Es un profesor
            $sqlEmail = "SELECT email FROM instructor WHERE reg_code ='" . $code . "'";
            $resemail = $mysqli->query($sqlEmail);
            if ($resemail->num_rows > 0) {
                while ($row2 = $resemail->fetch_assoc()) {
                    $email = $row2['email'];
                }
                header('location: email_aprobaciones.php?user=' . $code . '&email=' . $email);
            }
        }
    }else{
        echo "<script> 
            alert('mal');
        </script>";
    }
} else {
    echo "<script> 
            alert('No se pudo Actualizar');
        </script>";
}

$mysqli->close();
