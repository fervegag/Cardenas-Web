<?php
if (!isset($_GET['user'])) {

}else{
    include('dbmanager/config.php');
    $user = $_GET['user'];
    $destino = $_GET['email'];
    $asunto1 = 'Aprobación de registro | Dragones Cardenas';
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
    $cabecera = 'Su solicitud de registro ha sido aprobada, ahora puede ingresar al sistema';
    $contenido = "Usuario: ".$user."\nContraseña: ".$pass;
    mail($destino, $asunto, $contenido, $cabecera);
   
    $mysqli->close();
    header('location: confirmaciones.php');
    
}
?>