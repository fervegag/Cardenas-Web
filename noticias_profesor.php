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
                    <li><a href="#">Noticias</a></li>
                    <li><a href="alumnos.php">Alumnos</a></li>
                    <li><a href="#">Torneos</a></li>
                    <li><a href="seguridad_prof.php">Seguridad</a></li>
                    <li><a href="logout.php">Salir</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="main">
        <section id="principal">
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
                                <strong>Categoría: </strong><span class="datos-publicaciones"><?php echo $categoria ?></span>
                            </p>
                            <p class="texto-post">
                                <?php echo $noticia ?>
                            </p>
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