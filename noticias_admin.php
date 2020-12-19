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
                    <li class="li_menu"><a href="#">Noticias</a></li>
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

            <button type="button" class="btn btn-primary button" data-toggle="modal" data-target="#nuevaNoticia" data-nuevaNoticia="Nueva"><i class="far fa-newspaper"> Nueva Noticia</i></button>

            <!-- </section> -->
            <!-- </section> -->
            <?php
            $usuario = $_SESSION['user_id'];
            include('dbmanager/config.php');
            $sqlNoticia = "SELECT news_id, title, body, picture, date_news, first_name, last_name, category FROM news
                    INNER JOIN manager ON news.reg_code1 = manager.reg_code
                    INNER JOIN category ON news.category_id1 = category.category_id
                    ORDER BY news_id DESC";
            $resultNoticia = $mysqli->query($sqlNoticia);
            if ($resultNoticia->num_rows > 0) {
                while ($row = $resultNoticia->fetch_assoc()) {
                    $idNoticia = $row['news_id'];
                    $titulo = $row['title'];
                    $autor = $row['first_name'] . " " . $row['last_name'];
                    $fecha = $row['date_news'];
                    $noticia = $row['body'];
                    $categoria = $row['category'];
                    $imagen = $row['picture']; ?>
                    <section id="publicaciones">
                        <article class="post">
                            <h2 class="titulo-post"><?php echo $titulo ?></h2>
                            <img src="data:image/jpg;base64,<?php echo base64_encode($imagen) ?>" class="img-post">
                            <p>
                                <strong>Por: </strong><span class="datos-publicaciones"><?php echo $autor ?></span>
                                &nbsp; &nbsp;
                                <strong>Fecha: </strong><span class="datos-publicaciones"><?php echo $fecha ?></span>
                                &nbsp; &nbsp;
                                <!-- <strong>Categoría: </strong><span class="datos-publicaciones"><?php echo $categoria ?></span> -->
                            </p>
                            <p class="texto-post">
                                <?php echo $noticia ?>
                            </p>
                            <span class="operaciones">
                                <a href="eliminar_noticia.php?id=<?php echo $idNoticia; ?>" class="link_delete"><i class="fas fa-trash-alt"></i></a>
                                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editarnoticia" data-whatever="<?php echo $idNoticia ?>">Open modal for <?php echo $idNoticia ?> </button> -->
                                <a href="#" data-toggle="modal" data-target="#editarnoticia" data-whatever="<?php echo $idNoticia ?>" data-noticia="<?php echo $noticia ?>" data-name="<?php echo $titulo ?>"><i class="fas fa-edit"></i></a>
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
        <div class="modal fade" id="editarnoticia" tabindex="-1" role="dialog" aria-labelledby="editarnoticiaLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editarnoticiaLabel">Actualización</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <div class="form-group">
                                <label for="id_noticia" class="col-form-label">Id de la noticia:</label>
                                <input type="text" class="form-control" id="id_noticia" name="recipient-name" disabled>
                            </div>
                            <div class="form-group">
                                <label for="titulo_noticia" class="col-form-label">Nombre de la noticia:</label>
                                <input type="text" class="form-control" id="titulo_noticia" name="news_name">
                            </div>
                            <div class="form-group">
                                <label for="noticia" class="col-form-label">Noticia:</label>
                                <textarea class="form-control" id="noticia" name="noticia"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" onclick="actualizarNoticia()">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="nuevaNoticia" tabindex="-1" role="dialog" aria-labelledby="nuevaNoticiaLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="nuevaNoticiaLabel">Nueva Noticia</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="agregarNoticia.php" method="POST" enctype="multipart/form-data" onsubmit="return validar();">
                            <div class="form-group">
                                <label for="add_titulo_noticia" class="col-form-label">Nombre de la noticia:</label>
                                <input type="text" class="form-control" id="add_titulo_noticia" name="add_titulo_noticia" required>
                            </div>
                            <div class="form-group">
                                <label for="add_noticia" class="col-form-label">Noticia:</label>
                                <textarea class="form-control" id="add_noticia" name="add_noticia" required></textarea>
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
        <script src="js/eliminar_noticia.js"></script>
        <script src="js/validar_noticia.js"></script>


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

</body>

</html>