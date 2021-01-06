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
    <link rel="stylesheet" href="css/noticia.css">
    <link rel="stylesheet" href="css/bootstrap.css">
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
                    <li class="li_menu"><a href="administrativo.php">Perfil</a></li>
                    <li class="li_menu"><a href="noticias_admin.php">Noticias</a></li>
                    <li class="li_menu"><a href="#">Eventos</a></li>
                    <li class="li_menu"><a href="panel.php">Panel</a></li>
                    <li class="li_menu"><a href="seguridad_admin.php">Seguridad</a></li>
                    <li class="li_menu"><a href="logout.php">Salir</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="main">
        <section id="principal">
            <!-- <section id="sidebar">
            <section id="categorias">
                <h2 class="encabezado-sidebar">Categorías</h2>
                <a href="" class="enlace-sidebar">Seccion 1</a>
                <a href="" class="enlace-sidebar">Seccion 2</a>
                <a href="" class="enlace-sidebar">Seccion 3</a>
                <a href="" class="enlace-sidebar">Seccion 4</a>
                <a href="" class="enlace-sidebar">Seccion 5</a>
                <a href="" class="enlace-sidebar">Seccion 6</a>
            </section>

        </section> -->
            <!-- <section id="sidebar"> -->
            <!-- <section class="post"> -->

            <!-- <button><i class="far fa-newspaper"> Nueva Noticia</i></button> -->

            <button type="button" class="btn btn-primary button" data-toggle="modal" data-target="#nuevoevento" data-nuevaNoticia="Nueva"><i class="far fa-newspaper"> Nuevo Evento</i></button>

            <!-- </section> -->
            <!-- </section> -->
            <?php
            $usuario = $_SESSION['user_id'];
            include('dbmanager/config.php');
            $sqlEvento = "SELECT * FROM tournament
                        ORDER BY tournament_id DESC";
            $resultEvento = $mysqli->query($sqlEvento);
            if ($resultEvento->num_rows > 0) {
                while ($row = $resultEvento->fetch_assoc()) {
                    $idEvento = $row['tournament_id'];
                    $nombreEvento = $row['name_t'];
                    $tipo = $row['type_t'];
                    $direccion = $row['location_t'];
                    $fecha = $row['date_t'];
                    $hora = $row['time_t'];
                    $imagen = $row['picture']; ?>
                    <section id="publicaciones">
                        <article class="post">
                            <h2 class="titulo-post"><?php echo $nombreEvento ?></h2>
                            <img src="data:image/jpg;base64,<?php echo base64_encode($imagen) ?>" class="img-post">
                            <p>
                                <strong>Tipo: </strong><span class="datos-publicaciones"><?php echo $tipo ?></span>
                                &nbsp; &nbsp;
                                <strong>Fecha: </strong><span class="datos-publicaciones"><?php echo $fecha ?></span>
                                &nbsp; &nbsp;
                                <strong>Hora: </strong><span class="datos-publicaciones"><?php echo $hora ?></span>
                            </p>
                            <p class="texto-post">
                                <strong>Sede del evento: </strong>
                                <?php echo $direccion ?>
                            </p>
                            <span class="operaciones">
                                <a href="eliminar_evento.php?id=<?php echo $idEvento; ?>" class="link_delete"><i class="fas fa-trash-alt"></i></a>
                                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editarnoticia" data-whatever="<?php echo $idNoticia ?>">Open modal for <?php echo $idNoticia ?> </button> -->
                                <a href="#" data-toggle="modal" data-target="#editarevento" data-whatever="<?php echo $idEvento ?>" data-tipo="<?php echo $tipo ?>" data-fecha="<?php echo $fecha ?>" data-hora="<?php echo $hora ?>" data-direccion="<?php echo $direccion ?>" data-nombre="<?php echo $nombreEvento ?>"><i class="fas fa-edit"></i></a>
                                <?php
                                date_default_timezone_set("America/Mexico_City");
                                $fechaActual =  strtotime(date("d-m-Y"));
                                $fechaTorneo = strtotime($fecha);
                                $tiempo = date('H') . ':' . date('i') . ':' . date('s');
                                $time1 = new DateTime($tiempo);
                                $time2 = new DateTime($hora);
                                $diffHoras = $time2->diff($time1);
                                $diferencia = $diffHoras->format("%i");
                                if ($fechaActual == $fechaTorneo && $diferencia > 0 && $diferencia < 30) { ?>
                                    <a href="generarPeleas.php?id=<?php echo $idEvento; ?>"><button class="inscripcion">Iniciar</button></a>
                                <?php
                                }
                                ?>
                            </span>
                        </article>
                    </section>
            <?php
                }
            } else {
                echo "No se encontraron noticias";
            }
            ?>

        </section>
        <?php
        $mysqli->close();
        ?>
        <div class="modal fade" id="editarevento" tabindex="-1" role="dialog" aria-labelledby="editareventoLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editareventoLabel">Actualización</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <div class="form-group">
                                <label for="id_evento" class="col-form-label">Id del evento:</label>
                                <input type="text" class="form-control" id="id_evento" name="recipient-name" disabled>
                            </div>
                            <div class="form-group">
                                <label for="nombre" class="col-form-label">Nombre del evento:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="tipo" class="col-form-label">Tipo de evento:</label>
                                <input type="text" class="form-control" id="tipo" name="tipo" required>
                            </div>
                            <div class="form-group">
                                <label for="fecha" class="col-form-label">Fecha:</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" required>
                            </div>
                            <div class="form-group">
                                <label for="hora" class="col-form-label">Hora:</label>
                                <input type="time" class="form-control" id="hora" name="hora" required>
                            </div>
                            <div class="form-group">
                                <label for="direccion" class="col-form-label">Sede del evento:</label>
                                <textarea class="form-control" id="direccion" name="direccion" required></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" onclick="actualizarEvento()">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="nuevoevento" tabindex="-1" role="dialog" aria-labelledby="nuevoeventoLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="nuevoeventoLabel">Nuevo Evento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="agregarEvento.php" method="POST" enctype="multipart/form-data" onsubmit="return validar();">
                            <div class="form-group">
                                <label for="add_nombre" class="col-form-label">Nombre del evento:</label>
                                <input type="text" class="form-control" id="add_nombre" name="add_nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="add_tipo" class="col-form-label">Tipo de evento:</label>
                                <input type="text" class="form-control" id="add_tipo" name="add_tipo" required>
                            </div>
                            <div class="form-group">
                                <label for="add_fecha" class="col-form-label">Fecha:</label>
                                <input type="date" class="form-control" id="add_fecha" name="add_fecha" required>
                            </div>
                            <div class="form-group">
                                <label for="add_hora" class="col-form-label">Hora:</label>
                                <input type="time" class="form-control" id="add_hora" name="add_hora" required>
                            </div>
                            <div class="form-group">
                                <label for="add_direccion" class="col-form-label">Sede del evento:</label>
                                <textarea class="form-control" id="add_direccion" name="add_direccion" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="add_imagen" class="col-form-label">Imagen:</label>
                                <input type="file" name="add_imagen" id="add_imagen" required>
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
        <script src="js/eliminar_evento.js"></script>
        <script src="js/validar_evento.js"></script>


        <!-- Scripts para Boostrap -->
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/abrir_modal.js"></script>
        <script src="js/acciones_modal.js"></script>

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

</body>

</html>