<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="imagenes/dragon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <script src="https://kit.fontawesome.com/0458944bda.js" crossorigin="anonymous"></script>

    <title>Login</title>
</head>

<body>
    <header class="header">
        <div class="container logo-nav-container">
            <!-- <a href="#" class="logo"> DRAGONES <br> CÁRDENAS </br></a> -->
            <a href="index.php"><img src="imagenes/logo-blanco.png" alt="logo" class="logo"></a>
            <span class="menu-icon">Ver menú</span>
            <nav class="navigation">
                <ul class="show">
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="nosotros.php">Nosotros</a></li>
                    <li><a href="deporte.php">Deporte</a></li>
                    <li><a href="contacto.php">Contacto</a></li>
                    <li><a href="login.php">Profesores</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="main">
        <div class="container">
            <form class="formulario" method="POST">
                <h1>Login</h1>
                <div class="contenedor">

                    <div class="input-contenedor">
                        <i class="fas fa-user icon"></i>
                        <input type="text" placeholder="Número de registro" name="usuario" id="usuario" required>

                    </div>
                    <div class="input-contenedor">
                        <i class="fas fa-key icon"></i>
                        <input type="password" placeholder="Contraseña" name="pass" id="pass" required>

                    </div>
                    <input type="submit" value="Ingresar" class="button">
                    <p>Al registrarte, aceptas nuestras Condiciones de uso y Política de privacidad.</p>
                    <p>¿No tienes una cuenta? <a class="link" href="registro.php"> <b> Registrate </b> </a></p>
                    <p><a href="recuperar.php" class="link">He olvidado mi contraseña</a></p>
                </div>
            </form>
            <?php
            include('dbmanager/config.php');
            if (isset($_POST['usuario']) && isset($_POST['pass'])) {

                $user = $_POST['usuario'];
                $password = $_POST['pass'];
                $sql = "SELECT pass FROM loginInfo WHERE user_code ='" . $user . "'";
                $resultado = $mysqli->query($sql);
                if ($resultado->num_rows > 0) {
                    while ($row = $resultado->fetch_assoc()) {
                        $passRequest = $row['pass'];
                    }
                    if ($password != $passRequest) {
                        echo "<script>
                                alert('Contraseña incorrecta');
                            </script>";
                    } else {
                        $sqlstatus = "SELECT status_user FROM LoginInfo WHERE user_code = '" . $user . "'";
                        $resultadostatus = $mysqli->query($sqlstatus);
                        if ($resultadostatus->num_rows > 0) {
                            while ($filas = $resultadostatus->fetch_assoc()) {
                                $statusUser = $filas['status_user'];
                            }
                            if ($statusUser != '1') {
                                echo "<script>
                                        alert('Tu usuario aun no está activo');
                                    </script>";
                            } else {
                                $sqlTypeUser = "SELECT type_user FROM LoginInfo WHERE user_code = '" . $user . "'";
                                $resultadoTypeUser = $mysqli->query($sqlTypeUser);
                                if ($resultadoTypeUser->num_rows > 0) {
                                    while ($rowType = $resultadoTypeUser->fetch_assoc()) {
                                        $typeUser = $rowType['type_user'];
                                    }
                                    if ($typeUser != '1') {
                                        session_start();
                                        $_SESSION['user_id']=$user;
                                        header('location: profesor.php');
                                    } else {
                                        session_start();
                                        $_SESSION['user_id']=$user;
                                        header('location: administrativo.php');
                                    }
                                }
                            }
                        }
                    }
                } else {
                    echo "<script>
                            alert('Usuario no encontrado');
                        </script>";
                }
            }
            $mysqli->close();
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
    <!-- <script src="../js/jquery-3.5.0.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="js/javaS1.js"></script>

    <!--container-redes-sociales-->
    <div class="container-redes">
        <a href="https://api.whatsapp.com/send?phone=56315539&text=¿Qué servicios ofrecen?" target="_blank">
            <img src="icon/icon-whatsapp.png" title="Enviar mensaje de WhatsApp" alt="">
        </a>
        <a href="https://www.facebook.com/Dragones-C%C3%A1rdenas-145549915536501" target="_blank">
            <img src="icon/icon-face.png" alt="" title="Visata nuestra página de Facebook">
        </a>






</body>

</html>