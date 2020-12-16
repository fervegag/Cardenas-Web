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
                    <li><a href="#">Perfil</a></li>
                    <li><a href="noticias_profesor.php">Noticias</a></li>
                    <li><a href="alumnos.php">Alumnos</a></li>
                    <li><a href="#">Torneos</a></li>
                    <li><a href="seguridad_prof.php">Seguridad</a></li>
                    <li><a href="logout.php">Salir</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="main">
        <?php
        $usuario = $_SESSION['user_id'];
        include('dbmanager/config.php');
        $sqlNombre = "SELECT first_name FROM instructor WHERE reg_code = '" . $usuario . "'";
        $resultado = $mysqli->query($sqlNombre);
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $Nombre = $row['first_name'];
            }
        } else {
            echo '<h1>Falló</h1>';
        }

        $sqlNacimiento = "SELECT birthdate FROM instructor WHERE reg_code = '" . $usuario . "'";
        $resultado = $mysqli->query($sqlNacimiento);
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $Nacimiento = $row['birthdate'];
            }
        } else {
            echo '<h1>Falló</h1>';
        }

        $sqlNumero = "SELECT phone_num FROM instructor WHERE reg_code = '" . $usuario . "'";
        $resultado = $mysqli->query($sqlNumero);
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $Numero = $row['phone_num'];
            }
        } else {
            echo '<h1>Falló</h1>';
        }
        $sqlCorreo = "SELECT email FROM instructor WHERE reg_code = '" . $usuario . "'";
        $resultado = $mysqli->query($sqlCorreo);
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $Correo = $row['email'];
            }
        } else {
            echo '<h1>Falló</h1>';
        }

        $sqlGrado = "SELECT color FROM instructor INNER JOIN belt on instructor.belt_id1 = belt.belt_id WHERE reg_code = '" . $usuario . "'";
        $resultado = $mysqli->query($sqlGrado);
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $Grado = $row['color'];
            }
        } else {
            echo '<h1>Falló</h1>';
        }

        $sqlGrado = "SELECT gym_name FROM instructor INNER JOIN gym on instructor.gym_code1 = gym.gym_code WHERE reg_code = '" . $usuario . "'";
        $resultado = $mysqli->query($sqlGrado);
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $gym = $row['gym_name'];
            }
        } else {
            $gym = 'Desconocido';
        } ?>

        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card text-center">
                        <div class="option">
                            <div class="title">
                                <center> <i class="fa fa-user" aria-hidden="true"></i> </center>
                            </div>
                            <ul>
                                <center>
                                    <li> <i class="#" aria-hidden="true"> </i> <b>
                                            <h2>Bienvenido <br> <?php echo $Nombre ?> </br> </h2>
                                        </b> </li>
                                </center>
                                <li> <i class="fa fa-building" aria-hidden="true"> </i> <b> GYM</b> <br> <?php echo $gym ?> </br> </li>
                                <li> <i class="fa fa-check" aria-hidden="true"> </i> <b> Cinta</b> <br> <?php echo $Grado ?> </br> </li>
                                <li> <i class="fa fa-calendar" aria-hidden="true"> </i> <b> Fecha de nacimiento</b> <br> <?php echo $Nacimiento ?> </br> </li>
                                <li> <i class="fa fa-envelope-square" aria-hidden="true"> </i> <b> Email</b> <br> <?php echo $Correo ?> </br> </li>
                                <li> <i class="fa fa-phone" aria-hidden="true"> </i> <b> Télefono</b> <br> <?php echo $Numero ?> </br> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $mysqli->close();
        ?>

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