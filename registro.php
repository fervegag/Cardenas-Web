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

    <title>Registro</title>
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

                <h1>Registrate</h1>
                <div class="contenedor">

                    <div class="input-contenedor">
                        <i class="fas fa-user icon"></i>
                        <input type="text" placeholder="Nombre" name="nombre" required>
                    </div>
                    <div class="input-contenedor">
                        <i class="fas fa-user icon"></i>
                        <input type="text" placeholder="Apellidos" name="apellidos" required>
                    </div>
                    <div class="input-contenedor">
                        <i class="fas fa-id-card icon"></i>
                        <input type="text" placeholder="Número de registro" name="numero" required>
                    </div>

                    <div class="input-contenedor">
                        <i class="fas fa-calendar icon"></i>
                        <input type="date" placeholder="Fecha de nacimiento" name="fecha"  min="1950-01-01" max="2002-01-01" required>
                    </div>
                    <div class="input-contenedor">
                        <!-- <i class="fab fa-d-and-d icon"></i> -->
                        <i class="fas fa-dragon icon"></i>
                        <select name="cinta" class="lista2">
                            <option value="0">Grado de cinta</option>
                            <?php
                            include('dbmanager/config.php');
                            $sql = "SELECT color FROM belt";
                            $resultado = $mysqli->query($sql);
                            $c = 0;
                            if ($resultado->num_rows > 0) {
                                while ($row = $resultado->fetch_assoc()) {
                                    $c = $c + 1;
                                    echo "<option value='" . $c . "'>" . $row['color'] . "</option>";
                                }
                            } else {
                            }

                            ?>
                        </select>
                    </div>
                    <div class="input-contenedor">
                        <i class="fas fa-phone icon"></i>
                        <input type="tel" placeholder="Teléfono" name="telefono" required>
                    </div>
                    <div class="input-contenedor">
                        <i class="fas fa-envelope icon"></i>
                        <input type="email" placeholder="Correo Electronico" name="correo" required>
                    </div>
                    <div class="input-contenedor">
                        <i class="fas fa-user-friends icon"></i>
                        <select name="tipo" class="lista2">
                            <option value="0">Tipo de usuario</option>
                            <option value="prof">Profesor</option>
                            <option value="admin">Administrador</option>
                        </select>
                    </div>
                    <input type="submit" value="Registrate" class="button">
                    <p>Al registrarte, aceptas nuestras Condiciones de uso y Política de privacidad.</p>
                    <p>¿Ya tienes una cuenta?<a class="link" href="login.php"> <b> Iniciar Sesion</b></a></p>
                </div>
            </form>
            <?php
            // include('dbmanager/config.php');
            if (isset($_POST['nombre']) && isset($_POST['numero']) && isset($_POST['fecha']) && isset($_POST['telefono']) && isset($_POST['correo'])) {
                if (strlen($_POST['numero']) > 10) {
                    echo "<script>
                                alert('Número de registro invalido');
                            </script>";
                } else {
                    $nombre = $_POST['nombre'];
                    $apellidos = $_POST['apellidos'];
                    $numero = $_POST['numero'];
                    $fecha = $_POST['fecha'];
                    $cinta = $_POST['cinta'];
                    $telefono = $_POST['telefono'];
                    $correo = $_POST['correo'];
                    $tipo = $_POST['tipo'];
                    $sqlValidarUsuario = "SELECT user_code FROM logininfo Where user_code = '".$numero."'";
                    $resultUsuario = $mysqli->query($sqlValidarUsuario);
                    if($resultUsuario->num_rows > 0){
                        echo "<script>
                                    alert('Número de registro en uso');
                                </script>";
                    }else{

                        switch ($tipo) {
                            case '0':
                                echo "<script>
                                    alert('Tipo de usuario no valido');
                                </script>";
                                break;
                            case 'prof':
                                $sqlValidarCorreo = "SELECT email FROM instructor Where email = '".$correo."'";
                                $resultCorreo = $mysqli->query($sqlValidarCorreo);
                                if($resultCorreo->num_rows > 0){
                                    echo "<script>
                                        alert('Correo electrónico en uso');
                                    </script>";
                                }else{
                                    $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
                                    $passprof = "";
                                    //Reconstruimos la contraseña segun la longitud que se quiera
                                    for ($i = 0; $i < 15; $i++) {
                                        //obtenemos un caracter aleatorio escogido de la cadena de caracteres
                                        $passprof .= substr($str, rand(0, 62), 1);
                                    }
                                    $sqlIngresarProf = "INSERT INTO instructor (reg_code, first_name, last_name, birthdate, phone_num, email, belt_id1) 
                                                    VALUES ('" . $numero . "','" . $nombre . "','" . $apellidos . "','" . $fecha . "','" . $telefono . "','" . $correo . "','" . $cinta . "')";
                                    $sqlLoginInfo = "INSERT INTO logininfo (user_code, pass, status_user, type_user)
                                                    VALUES('" . $numero . "','" . $passprof ."',b'0',b'0')";
                                    if ($mysqli->query($sqlIngresarProf) === True &&$mysqli->query($sqlLoginInfo) === True) {
                                        echo "<script>
                                        alert('Registro exitoso');
                                    </script>";
                                    } else {
                                        echo "<script>
                                        alert('Fallo en el sistema');
                                    </script>";
                                    }
                                }
    
                                break;
                            case 'admin':
                                $sqlValidarCorreo = "SELECT email FROM manager Where email = '".$correo."'";
                                $resultCorreo = $mysqli->query($sqlValidarCorreo);
                                if($resultCorreo->num_rows > 0){
                                    echo "<script>
                                        alert('Correo electrónico en uso');
                                    </script>";
                                }else{
                                    $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
                                    $passadmin = "";
                                    //Reconstruimos la contraseña segun la longitud que se quiera
                                    for ($i = 0; $i < 15; $i++) {
                                        //obtenemos un caracter aleatorio escogido de la cadena de caracteres
                                        $passadmin .= substr($str, rand(0, 62), 1);
                                    }
                                    $sqlIngresarAdmin = "INSERT INTO manager (reg_code, first_name, last_name, birthdate, phone_num, email, belt_id3) 
                                                    VALUES ('" . $numero . "','" . $nombre . "','" . $apellidos . "','" . $fecha . "','" . $telefono . "','" . $correo . "','" . $cinta . "')";
                                    $sqlLoginInfo = "INSERT INTO logininfo (user_code, pass, status_user, type_user)
                                                    VALUES('" . $numero . "','" . $passadmin ."',b'0',b'1')";
                                    if ($mysqli->query($sqlIngresarAdmin) === True && $mysqli->query($sqlLoginInfo) === True) {
                                        echo "<script>
                                        alert('Registro exitoso');
                                    </script>";
                                    } else {
                                        echo "<script>
                                        alert('Fallo en el sistema');
                                    </script>";
                                    }
                                }
                                break;
                        }
                    }
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