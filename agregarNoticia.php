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
if (!isset($_POST['add_titulo_noticia']) || !isset($_POST['add_noticia']) || !isset($_FILES['add_imagen'])) {
    echo "falló";
} else {
    $id = $_SESSION['user_id'];
    $titulo = $_POST['add_titulo_noticia'];
    $noticia = $_POST['add_noticia'];
    $fecha = date('Y') . '-' . date('m') . '-' . date('d');
    $revisar = getimagesize($_FILES['add_imagen']['tmp_name']);
    if ($revisar !== false) {
        $image = $_FILES['add_imagen']['tmp_name'];
        $imgContenido = addslashes(file_get_contents($image));
        $sqlnuevaNoticia = "INSERT INTO `news` (`news_id`, `title`, `body`, `picture`, `date_news`, `reg_code1`, `category_id1`) VALUES
                            (NULL, '$titulo', '$noticia', '$imgContenido', '$fecha', '$id', '4')";
        $nuevaNoticia = $mysqli->query($sqlnuevaNoticia);
        if ($nuevaNoticia) {
            // echo "Archivo Subido Correctamente.";
            header('location: noticias_admin.php');
        } else {
            echo "Ha fallado la subida, reintente nuevamente. <br><br>";
            echo mysqli_errno($mysqli).' - '.mysqli_error($mysqli);
        }
    } else {
        echo "Seleccione una imagen a subir";
    }
}
$mysqli->close();
?>