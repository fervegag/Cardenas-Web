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
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="https://kit.fontawesome.com/0458944bda.js" crossorigin="anonymous"></script>
    <title>Dragones Cárdenas</title>
</head>

<body>
    <header class="header">
        <div class="container logo-nav-container">
            <a href="index.php"><img src="imagenes/logo-blanco.png" alt="logo" class="logo"></a>
            <span class="menu-icon">Ver menú</span>
            <nav class="navigation">
                <ul>
                    <li><a href="#">Perfil</a></li>
                    <li><a href="noticias_admin.php">Noticias</a></li>
                    <li><a href="eventosAdmin.php">Eventos</a></li>
                    <li><a href="panel.php">Panel</a></li>
                    <li><a href="seguridad_admin.php">Seguridad</a></li>
                    <li><a href="logout.php">Salir</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="main">
        <?php
        $usuario = $_SESSION['user_id'];
        // $pruebausuario = "JIC-678302";
        include('dbmanager/config.php');
        $sqlNombre = "SELECT first_name FROM manager WHERE reg_code = '" . $usuario . "'";
        $resultado = $mysqli->query($sqlNombre);
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $Nombre = $row['first_name'];
            }
        } else {
            echo '<h1>Falló</h1>';
        }

        $sqlNacimiento = "SELECT birthdate FROM manager WHERE reg_code = '" . $usuario . "'";
        $resultado = $mysqli->query($sqlNacimiento);
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $Nacimiento = $row['birthdate'];
            }
        } else {
            echo '<h1>Falló</h1>';
        }

        $sqlNumero = "SELECT phone_num FROM manager WHERE reg_code = '" . $usuario . "'";
        $resultado = $mysqli->query($sqlNumero);
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $Numero = $row['phone_num'];
            }
        } else {
            echo '<h1>Falló</h1>';
        }
        $sqlCorreo = "SELECT email FROM manager WHERE reg_code = '" . $usuario . "'";
        $resultado = $mysqli->query($sqlCorreo);
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $Correo = $row['email'];
            }
        } else {
            echo '<h1>Falló</h1>';
        }

        $sqlPuesto = "SELECT occupation FROM manager WHERE reg_code = '" . $usuario . "'";
        $resultado = $mysqli->query($sqlPuesto);
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $Puesto = $row['occupation'];
            }
        } else {
            echo '<h1>Falló</h1>';
        }

        $sqlGrado = "SELECT color FROM manager INNER JOIN belt on manager.belt_id3 = belt.belt_id WHERE reg_code = '" . $usuario . "'";
        $resultado = $mysqli->query($sqlGrado);
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $Grado = $row['color'];
            }
        } else {
            echo '<h1>Falló</h1>';
        }
        ?>

        <div class="container">
            <div class="row">
                <!-- <div class="col-sm-4"> -->
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
                            <li> <i class="fa fa-address-card-o" aria-hidden="true"> </i> <b> Puesto </b> <br> <?php echo $Puesto ?> </br> </li>
                            <li> <i class="fa fa-check" aria-hidden="true"> </i> <b> Cinta</b> <br> <?php echo $Grado ?> </br> </li>
                            <li> <i class="fa fa-calendar" aria-hidden="true"> </i> <b> Fecha de nacimiento</b> <br> <?php echo $Nacimiento ?> </br> </li>
                            <li> <i class="fa fa-envelope-square" aria-hidden="true"> </i> <b> Email</b> <br> <?php echo $Correo ?> </br> </li>
                            <li> <i class="fa fa-phone" aria-hidden="true"> </i> <b> Teléfono</b> <br> <?php echo $Numero ?> </br> </li>
                            <li class="boton"><button class="update" data-toggle="modal" data-target="#editaradmin" data-whatever="<?php echo $usuario ?>" data-grado="<?php echo $Grado ?>" data-email="<?php echo $Correo ?>" data-telefono="<?php echo $Numero ?>" data-puesto="<?php echo $Puesto ?>">Actualizar</button></li>
                        </ul>
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>

        <div class="modal fade" id="editaradmin" tabindex="-1" role="dialog" aria-labelledby="editaradminLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editaradminLabel">Actualización</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <div class="form-group">
                                <label for="id_admin" class="col-form-label">Código de Administrativo:</label>
                                <input type="text" class="form-control" id="id_admin" name="recipient-name" disabled>
                            </div>
                            <div class="form-group">
                                <label for="puesto" class="col-form-label">Puesto:</label>
                                <input type="text" class="form-control" id="puesto" name="puesto">
                            </div>
                            <div class="form-group">
                                <label for="cinta" class="col-form-label">Cinta:</label>
                                <!-- <textarea class="form-control" id="cinta" name="cinta"></textarea> -->
                                <select name="cinta" id="cinta" class="form-control">
                                    <option value="0">Sleccione una opción</option>
                                    <?php
                                    $sqlCinta = "SELECT * FROM belt";
                                    $resultCinta = $mysqli->query($sqlCinta);
                                    if ($resultCinta->num_rows > 0) {
                                        while ($row2 = $resultCinta->fetch_assoc()) {
                                            $idCinta = $row2['belt_id'];
                                            $color = $row2['color'];
                                    ?>
                                            <option value="<?php echo $idCinta ?>"><?php echo $color ?></option>
                                    <?php
                                        }
                                    } else {
                                        echo "No se devolvieron resultados";
                                    }
                                    $mysqli->close();
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="correo" class="col-form-label">Correo Electrónico:</label>
                                <input type="email" class="form-control" id="correo" name="correo">
                            </div>
                            <div class="form-group">
                                <label for="telefono" class="col-form-label">Teléfono:</label>
                                <input type="tel" class="form-control" id="telefono" name="telefono">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" onclick="actualizarAdmin()">Actualizar</button>
                    </div>
                </div>
            </div>
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="js/javaS1.js"></script>
    <!-- Scripts para Boostrap -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/abrir_modal.js"></script>
    <script src="js/acciones_modal.js"></script>

</body>

</html>