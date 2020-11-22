<?php
if (!isset($_GET['user'])) {

}else{
    include('dbmanager/config.php');
    $user = $_GET['user'];
    $destino = $_GET['email'];
    $asunto1 = 'Recuperación de contraseña Dragones Cardenas';
    $asunto = utf8_decode($asunto1);

    $sql = "SELECT pass FROM LoginInfo WHERE user_code ='" . $user . "'";
    $resultado = $mysqli->query($sql);
    if ($resultado->num_rows > 0){
        while ($row = $resultado->fetch_assoc()) {
            $pass = $row['pass'];
        }
    }else{
        echo "<script>
            alert('Usuario no encontrado');
        </script>";
    }
    $cabecera = 'Usted ha solicitado la recuperación su contraseña';
    $contenido = 'Su contraseña es: '.$pass;
    mail($destino, $asunto, $contenido, $cabecera);
   
    $mysqli->close();
    header('location: recuperar.php');
    
}
?>