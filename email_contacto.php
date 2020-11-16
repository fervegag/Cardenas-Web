<?php
if (!isset($_POST['fullname'])) {

}else{
    $destino = "dcardenas.club@gmail.com";
    $nombre = $_POST['fullname'];
    $correo = $_POST['email'];
    $telefono = $_POST['phone'];
    $asunto = $_POST['affair'];
    $mensaje = $_POST['message'];
    $cabecera = 'CONTACTO DRAGONES CARDENAS';
    $contenido = "Nombre:" . $nombre . "\nCorreo: " . $correo . "\nTelefono: " . $telefono . "\nMensaje: " . $mensaje;
    mail($destino, $asunto, $contenido, $cabecera);
    header('location: contacto.php');
}
?>