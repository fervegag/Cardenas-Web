<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="imagenes/dragon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <script src="https://kit.fontawesome.com/0458944bda.js" crossorigin="anonymous"></script>
    <title>Recuperar Contraseña</title>
</head>

<body>
    <header class="header">
        <div class="container logo-nav-container">
            <!-- <a href="#" class="logo"> DRAGONES <br> CÁRDENAS </br></a> -->
            <img src="imagenes/logo-blanco.png" alt="logo" class="logo">
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
                <h1>Recuperación de la contraseña</h1>
                <div class="contenedor">
                    <div class="titulo">
                        <label>Ingrese su número de registro</label>
                    </div>
                    <div class="input-contenedor">
                        <i class="fas fa-user icon"></i>
                        <input type="text" placeholder="Número de registro" name="usuario" id="usuario" required>

                    </div>
                    <div class="titulo">
                        <label>Ingrese el correo con el que se registró</label>
                    </div>
                    <div class="input-contenedor">
                        <i class="fas fa-envelope icon"></i>
                        <input type="text" placeholder="Correo electrónico" name="correo" id="correo" required>
                    </div>
                    <div class="titulo">
                        <label>Elija su tipo de usuario</label>
                    </div class="listadiv">
                    <select name="tipoUsuario" class="lista">
                        <option value="prof">Profesor</option>
                        <option value="admin">Administrador</option>
                    </select>
                    <input type="submit" value="Enviar" class="button">
                    <p>¿No tienes una cuenta? <a class="link" href="registro.php"> <b> Registrate </b> </a></p>
                    <p>¿Ya tienes una cuenta?<a class="link" href="login.php"> <b> Iniciar Sesion</b></a></p>
                </div>
            </form>
            <?php
            include('dbmanager/config.php');
            if (isset($_POST['usuario']) && isset($_POST['correo']) && isset($_POST['tipoUsuario'])){
                $user = $_POST['usuario'];
                $email = $_POST['correo'];
                $userType = $_POST['tipoUsuario'];
                switch ($userType){
                    case 'prof':
                        $sql = "SELECT email FROM instructor WHERE reg_code ='" . $user . "'";
                        $resultado = $mysqli->query($sql);
                        if ($resultado->num_rows > 0){
                            while ($row = $resultado->fetch_assoc()) {
                                $emailRequest = $row['email'];
                            }
                            if ($email != $emailRequest) {
                                echo "<script>
                                    alert('El correo electrónico no coincide');
                                </script>";
                            }else{
                                header('location: email_recupera.php?user='.$user.'&email='.$email);
                            }
                        }else{
                            echo "<script>
                                alert('Usuario no encontrado');
                            </script>";
                        }
                    break;
                    case 'admin':
                        $sql = "SELECT email FROM manager WHERE reg_code ='" . $user . "'";
                        $resultado = $mysqli->query($sql);
                        if ($resultado->num_rows > 0){
                            while ($row = $resultado->fetch_assoc()) {
                                $emailRequest = $row['email'];
                            }
                            if ($email != $emailRequest) {
                                echo "<script>
                                    alert('El correo electrónico no coincide');
                                </script>";
                            }else{
                                header('location: email_recupera.php?user='.$user.'&email='.$email);
                            }
                        }else{
                            echo "<script>
                                alert('Usuario no encontrado');
                            </script>";
                        }
                    break;
                    default:
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