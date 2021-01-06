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
    <link rel="stylesheet" href="css/inscripciones.css">
    <title>Confirmaciones</title>
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
                    <li><a href="eventosAdmin.php">Eventos</a></li>
                    <li><a href="panel.php">Panel</a></li>
                    <li><a href="seguridad_admin.php">Seguridad</a></li>
                    <li><a href="logout.php">Salir</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="main">
        <div class="ConfirmProf">
            <h1 class="title-prof">Registro de combates</h1>
            <form method="POST">
                <table class="archivo">
                    <thead>
                        <tr>
                            <th>Torneo</th>
                            <th>Peleador 1</th>
                            <th>Peleador 2</th>
                            <th>Ganador</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('dbmanager/config.php');
                        $sqlTorneos = "SELECT tournament_id2, fight_id AS codigo, name_t AS torneo, fighter1.first_name AS peleador1, fighter2.first_name AS peleador2, winner AS ganador 
                                         FROM fight
                                        INNER JOIN tournament ON tournament.tournament_id=fight.tournament_id2
                                        INNER JOIN pupil AS fighter1 ON fighter1.pupil_id=fight.pupil_id2
                                        INNER JOIN pupil AS fighter2 ON fighter2.pupil_id=fight.pupil_id3";
                        $resultTorneos = $mysqli->query($sqlTorneos);
                        if ($resultTorneos->num_rows > 0) {
                            while ($row = $resultTorneos->fetch_assoc()) {
                                $idTorneo = $row['tournament_id2'];
                                $codigo = $row['codigo'];
                                $torneo = $row['torneo'];
                                $peleador1 = $row['peleador1'];
                                $peleador2 = $row['peleador2'];
                                $ganador = $row['ganador']; ?>

                                <tr class="infoPelea">
                                    <td class="code"><?php echo $torneo; ?></td>
                                    <td class="peleador1"><?php echo $peleador1; ?></td>
                                    <td class="peleador2"><?php echo $peleador2; ?></td>
                                    <td class="ganador"><?php echo $ganador; ?></td>
                                </tr>
                        <?php
                            }
                        } else {
                        }
                        $mysqli->close();
                        ?>
                    </tbody>

                </table>
            </form>
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