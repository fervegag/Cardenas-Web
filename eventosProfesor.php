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
                                <strong>Fecha: </strong><span class="datos-publicaciones" id="fecha"><?php echo $fecha ?></span>
                                &nbsp; &nbsp;
                                <strong>Hora: </strong><span class="datos-publicaciones"><?php echo $hora ?></span>
                            </p>
                            <p class="texto-post">
                                <strong>Sede del evento: </strong>
                                <?php echo $direccion ?>
                            </p>
                            <?php
                            date_default_timezone_set("America/Mexico_City");
                            $fechaActual =  strtotime(date("d-m-Y H:i:s",time()));
                            $fechaTorneo = strtotime($fecha." ".$hora);
                            if($fechaActual < $fechaTorneo){ ?>
                                <div class="btni"><a href="inscripciones.php?id=<?php echo $idEvento; ?>"><button class="inscripcion">Inscripciones</button></a></div>
                            <?php
                            }
                            ?>
                            
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