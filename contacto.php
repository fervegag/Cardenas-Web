<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="imagenes/dragon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/stilos.css">
    <script src="https://kit.fontawesome.com/0458944bda.js" crossorigin="anonymous"></script>
    <title> Contactanos</title>
    <!-- GOOGLE FONTs -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    <header class="header">
        <div class="container logo-nav-container">
            <!-- <a href="#" class="logo"> DRAGONES <br> CÁRDENAS </br></a> -->
            <a href="index.php"><img src="imagenes/logo-blanco.png" alt="logo" class="logo"></a>
            <span class="menu-icon">Ver menú</span>
            <nav class="navigation">
                <ul>
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
        <div class="content">
            <div class="contact-wrapper animated bounceInUp">
                <div class="contact-form">
                    <h3>Contactanos</h3>
                    <form action="email_contacto.php" method="POST">
                        <p>
                            <label>Nombe y Apellidos</label>
                            <input type="text" name="fullname" required>
                        </p>
                        <p>
                            <label>Email</label>
                            <input type="email" name="email" required>
                        </p>
                        <p>
                            <label>Número de teléfono</label>
                            <input type="tel" name="phone">
                        </p>
                        <p>
                            <label>Asunto</label>
                            <input type="text" name="affair" required>
                        </p>
                        <p class="block">
                            <label>Mensaje</label>
                            <textarea name="message" rows="3" required></textarea>
                        </p>
                        <p class="block">
                            <button>Enviar</button>
                        </p>
                    </form>

                </div>
                <div class="contact-info">
                    <h4>Más Información</h4>
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i><b> Rincón del Mirador I, Tlalpan, 14748 Ciudad de México, CDMX</li>
                        <li><i class="fas fa-phone"></i><b> 56315539</li>
                        <li><i class="fas fa-envelope-open-text"></i> <b> contacto@dragoncardenas.com.mx </b> </li>
                    </ul>
                    <center>
                        <iframe class="maps" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15064.958342619737!2d-99.2219985!3d19.2719446!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x358fdb9fbbfb87ca!2sDragones%20Cardenas%20KickBoxing%20Y%20MMA!5e0!3m2!1ses-419!2smx!4v1603684097076!5m2!1ses-419!2smx" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </center>
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