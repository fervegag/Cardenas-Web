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
            <img src="imagenes/logo-blanco.png" alt="logo" class="logo">
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
            <h1 class="title-prof">Orden de combates</h1>
            <h2 class="title-inst">Instrucciones:</h2>
            <p class="inst">Haga clic sobre el nombre del alumno que ganó el combate</p>
            <form method="POST">
                <table class="tabla orden">
                    <thead>
                        <tr>
                            <th>Pelea</th>
                            <th>Peleador 1</th>
                            <th>Peleador 2</th>
                            <th>Ganador</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('dbmanager/config.php');
                        $idTorneo = $_GET['id'];
                        $sqlPeleas = "SELECT fight_id, name_t as torneo, 
                                        CONCAT(fighter1.first_name,' ',fighter1.last_name) as peleador1,
                                        fighter1.pupil_id as id1, 
                                        CONCAT(fighter2.first_name,' ',fighter2.last_name) as peleador2, 
                                        fighter2.pupil_id as id2,
                                        winner as ganador
                                        from fight
                                        inner join tournament on tournament.tournament_id=fight.tournament_id2
                                        inner join pupil as fighter1 on fighter1.pupil_id=fight.pupil_id2
                                        inner join pupil as fighter2 on fighter2.pupil_id=fight.pupil_id3
                                        WHERE tournament_id2 = '".$idTorneo."'";  
                        $c = 1;
                        $resultado = $mysqli->query($sqlPeleas);
                        if ($resultado->num_rows > 0) {
                            while ($row1 = $resultado->fetch_assoc()) {
                                $pelea = $row1['fight_id'];
                                $id1 = $row1['id1'];
                                $peleador1 = $row1['peleador1'];
                                $id2 = $row1['id2'];
                                $peleador2 =  $row1['peleador2'];
                                $ganador = $row1['ganador'];
                        ?>
                                <tr class="infoProfe">
                                    <td class="contador"><?php echo $c++; ?></td>
                                    <td class="p1"><a href="elegirGanador.php?idGanador=<?php echo $id1 ?>&idPelea=<?php echo $pelea ?>&Peleador=<?php echo $peleador1 ?>&idTorneo=<?php echo $idTorneo ?>"><?php echo $peleador1; ?></a></td>
                                    <td class="p2"><a href="elegirGanador.php?idGanador=<?php echo $id2 ?>&idPelea=<?php echo $pelea ?>&Peleador=<?php echo $peleador2 ?>&idTorneo=<?php echo $idTorneo ?>"><?php echo $peleador2; ?></a></td>
                                    <td class="ganador"><?php echo $ganador; ?></td>
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