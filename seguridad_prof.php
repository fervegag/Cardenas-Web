<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
} else {
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="imagenes/dragon.ico">
    <link rel="stylesheet" href="css/perfil.css">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="https://kit.fontawesome.com/0458944bda.js" crossorigin="anonymous"></script>
    <title>Dragones Cárdenas</title>
</head>

<body>
    <header class="header">
        <div class="container logo-nav-container">
            <img src="imagenes/logo-blanco.png" alt="logo" class="logo">
            <span class="menu-icon">Ver menú</span>
            <nav class="navigation">
                <ul class="show">
                    <li><a href="profesor.php">Perfil</a></li>
                    <li><a href="index.php">Noticias</a></li>
                    <li><a href="#">Alumnos</a></li>
                    <li><a href="#">Torneos</a></li>
                    <li><a href="#">Seguridad</a></li>
                    <li><a href="logout.php">Salir</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="main">
        <div class="container">
            <form class="formulario" method="POST">
                <h1>Cambiar contraseña</h1>
                <div class="contenedor">

                    <div class="input-contenedor">
                        <i class="fas fa-key icon"></i>
                        <input type="password" placeholder="Ingrese su contraseña actual" name="actualPass" id="actualPass" required>
                    </div>
                    <div class="input-contenedor">
                        <i class="fas fa-unlock icon"></i>
                        <input type="password" placeholder="Nueva contraseña" name="newPass" id="newPass" required>
                    </div>
                    <div class="input-contenedor">
                        <i class="fas fa-lock icon"></i>
                        <input type="password" placeholder="Confirmar contraseña" name="confPass" id="confPass" required>
                    </div>
                    <input type="submit" value="Confirmar" class="button">
                </div>
            </form>
            <?php
            if (!isset($_POST['actualPass']) || !isset($_POST['newPass']) || !isset($_POST['confPass'])) {
            } else {
                include('dbmanager/config.php');
                $user = $_SESSION['user_id'];
                $actualPass = $_POST['actualPass'];
                $newPass = $_POST['newPass'];
                $confPass = $_POST['confPass'];
                $sqlActualPass = "SELECT pass FROM logininfo WHERE user_code = '" . $user . "'";
                $resultActualPAss = $mysqli->query($sqlActualPass);
                if ($resultActualPAss->num_rows > 0) {
                    while ($rowPass = $resultActualPAss->fetch_assoc()) {
                        $userPass = $rowPass['pass'];
                    }
                    if ($userPass != $actualPass) {
                        echo "<script>
                                alert('Contraseña actual erronea');
                            </script>";
                    } else {
                        if ($newPass != $confPass) {
                            echo "<script>
                                alert('La contraseña nueva no coincide');
                            </script>";
                        } else {
                            $sqlUpdatePass = "UPDATE logininfo SET pass = '" . $confPass . "' WHERE user_code = '" . $user . "'";
                            $resultUpdatePass = $mysqli->query($sqlUpdatePass);
                            if ($resultUpdatePass) {
                                echo "<script>
                                    alert('La contraseña ha sido actualizada con éxito');
                                </script>";
                                header('location: logout.php');
                            } else {
                                echo "<script>
                                    alert('No se ha podido actualizar la contraseña');
                                </script>";
                            }
                        }
                    }
                } else {
                    //No se encontró nada
                }
            }
            ?>
        </div>


    </main>

    <footer class="footer">
        <div class="contanier-img">
            <img class="contanier_img" src="imagenes/codeme.jpg" alt="contanier_img">
            <img class="contanier_img" src="imagenes/conade.png" alt="contanier_img">
            <img class="contanier_img" src="imagenes/wbc.png" alt="contanier_img">
            <img class="contanier_img" src="imagenes/whusu.jpg" alt="contanier_img">
            <p align=center href="#" class="bob"> <b> © Dragones Cárdenas® Todos los Derechos Reservados. </p>
            <p align=center href="#" class="bobi"> Términos y Condiciones </p>
            <p align=center href="#" class="bobs"> Política de Privacidad </p> </b>
        </div>
    </footer>
</body>

</html>