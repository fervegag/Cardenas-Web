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
    <link rel="icon" href="imagenes/dragon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/0458944bda.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/confirmaciones.css"> -->
    <link rel="stylesheet" href="css/style_prof.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Gimnasios</title>
    <!-- GOOGLE FONTs -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    <header class="header">
        <div class="container logo-nav-container">
            <a href="index.php"><img src="imagenes/logo-blanco.png" alt="logo" class="logo"></a>
            <span class="menu-icon">Ver menú</span>
            <nav class="navigation">
                <ul class="show">
                    <li><a href="administrativo.php">Perfil</a></li>
                    <li><a href="noticias_admin.php">Noticias</a></li>
                    <li><a href="eventosProfesor.php">Eventos</a></li>
                    <li><a href="panel.php">Panel</a></li>
                    <li><a href="seguridad_admin.php">Seguridad</a></li>
                    <li><a href="logout.php">Salir</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="main">
        <div class="ConfirmProf">
            <h1 class="title-prof">Gimnasios Registrados</h1>
            <div class="boton">
                <button class="agregar " data-toggle="modal" data-target="#nuevoGym" data-nuevoGym="Nuevo">Nuevo Gimasio</button>
            </div>
            <form method="POST">
                <table class="tabla">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Operación</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('dbmanager/config.php');
                        $sqlGym = "SELECT * FROM gym WHERE gym_code != '1'";
                        $resultado = $mysqli->query($sqlGym);
                        if ($resultado->num_rows > 0) {
                            while ($row2 = $resultado->fetch_assoc()) {
                                $code = $row2['gym_code'];
                                $name = $row2['gym_name'];
                                $adress = $row2['adress'];
                        ?>
                                <tr class="infoProfe">
                                    <td class="code"><?php echo $code ?></td>
                                    <td class="name"><?php echo $name ?></td>
                                    <td class="dir"><?php echo $adress ?></td>
                                    <td>
                                        <a href="eliminar_gym.php?code=<?php echo $row2['gym_code']; ?>" class="link_del_gym">Eliminar</a>
                                        <a href="#" data-toggle="modal" data-target="#editargym" data-whatever="<?php echo $code ?>" data-name="<?php echo $name ?>" data-adress="<?php echo $adress ?>">Editar</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        $mysqli->close();
                        ?>
                    </tbody>
                </table>
            </form>

        </div>

        <div class="modal fade" id="editargym" tabindex="-1" role="dialog" aria-labelledby="editargymLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editargymLabel">Actualización</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <div class="form-group">
                                <label for="id_gym" class="col-form-label">Código del gimnasio:</label>
                                <input type="text" class="form-control" id="id_gym" name="recipient-name" disabled>
                            </div>
                            <div class="form-group">
                                <label for="nombre_gym" class="col-form-label">Nombre del gimnasio:</label>
                                <input type="text" class="form-control" id="nombre_gym" name="name">
                            </div>
                            <div class="form-group">
                                <label for="adress" class="col-form-label">Dirección:</label>
                                <textarea class="form-control" id="adress" name="adress"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" onclick="actualizarGym()">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="nuevoGym" tabindex="-1" role="dialog" aria-labelledby="nuevoGymLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="nuevoGymLabel">Nuevo Gimnasio</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="agregarGym.php" method="POST" onsubmit="return validar();">
                            <div class="form-group">
                                <label for="add_nombre" class="col-form-label">Nombre del gimnasio:</label>
                                <input type="text" class="form-control" id="add_nombre" name="add_nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="add_direccion" class="col-form-label">Dirección:</label>
                                <textarea class="form-control" id="add_direccion" name="add_direccion" required></textarea>
                            </div>
                            <div class="form-group botones">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Agregar</button>
                            </div>
                            <style>
                                .botones {
                                    float: right;
                                    display: inline-block;
                                }
                            </style>
                        </form>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
        <script src="js/eliminar_gym.js"></script>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/abrir_modal.js"></script>
        <script src="js/acciones_modal.js"></script>
        <script src="js/validar_gym.js"></script>
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