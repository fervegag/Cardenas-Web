<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
} else {
}
?>
<?php
include('dbmanager/config.php');
$idTorneo = $_GET['id'];
$idProfesor = $_SESSION['user_id'];
$sqlGymProf = "SELECT gym_code1 FROM instructor WHERE reg_code = '" . $idProfesor . "'";
$resultGymProf = $mysqli->query($sqlGymProf);
if ($resultGymProf->num_rows > 0) {
    while ($fila = $resultGymProf->fetch_assoc()) {
        $gymProf = $fila['gym_code1'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="imagenes/dragon.ico">
    <link rel="stylesheet" href="css/inscripciones.css">
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
                    <li><a href="noticias_profesor.php">Noticias</a></li>
                    <li><a href="alumnos.php">Alumnos</a></li>
                    <li><a href="eventosProfesor.php">Torneos</a></li>
                    <li><a href="seguridad_prof.php">Seguridad</a></li>
                    <li><a href="logout.php">Salir</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="main">
        <div class="tablas">
            <div class="ConfirmProf inscribir">
                <h1 class="title-prof">Inscribir alumnos</h1>
                <form method="POST">
                    <table class="tabla">
                        <thead>
                            <tr>
                                <th>Registro</th>
                                <th colspan="2">Nombre</th>
                                <th>Operación</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $sqlAlumnos = "SELECT pupil_id, first_name, last_name FROM pupil WHERE status_p = '1' AND gym_code2 = '" . $gymProf . "'";
                            $resultado = $mysqli->query($sqlAlumnos);
                            if ($resultado->num_rows > 0) {
                                while ($row1 = $resultado->fetch_assoc()) {
                                    $registro = $row1['pupil_id'];
                                    $nombre = $row1['first_name'];
                                    $apellido = $row1['last_name'];

                            ?>
                                    <tr class="infoProfe">
                                        <td class="code"><?php echo $registro; ?></td>
                                        <td class="name"><?php echo $nombre; ?></td>
                                        <td class="last-n"><?php echo $apellido; ?></td>
                                        <td>
                                            <a href="inscribirAlumno.php?code=<?php echo $registro; ?>&torneo=<?php echo $idTorneo; ?>" class="link_ins_alumno">Inscribir</a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="ConfirmProf inscritos">
                <h1 class="title-prof">Alumnos inscritos</h1>
                <form method="POST">
                    <table class="tabla">
                        <thead>
                            <tr>
                                <th>Registro</th>
                                <th colspan="2">Nombre</th>
                                <th>Operación</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sqlInscritos = "SELECT pupil_id1, first_name, last_name, gym_code2 FROM fighter 
                                        INNER JOIN pupil on fighter.pupil_id1 = pupil.pupil_id
                                        INNER JOIN tournament on fighter.tournament_id1 = tournament.tournament_id
                                        WHERE tournament_id1 = '" . $idTorneo . "' AND gym_code2 = '" . $gymProf . "'";
                            $resultInscritos = $mysqli->query($sqlInscritos);
                            if ($resultInscritos->num_rows > 0) {
                                while ($row1 = $resultInscritos->fetch_assoc()) {
                                    $registro1 = $row1['pupil_id1'];
                                    $nombre1 = $row1['first_name'];
                                    $apellido1 = $row1['last_name'];

                            ?>
                                    <tr class="infoProfe">
                                        <td class="code"><?php echo $registro1; ?></td>
                                        <td class="name"><?php echo $nombre1; ?></td>
                                        <td class="last-n"><?php echo $apellido1; ?></td>
                                        <td>
                                            <a href="cancelarInscripcion.php?code=<?php echo $registro1; ?>&torneo=<?php echo $idTorneo; ?>" class="link_can_alumno">Cancelar</a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </form>
            </div>
            <script src="js/inscripciones.js"></script>
        </div>
    </main>
    <?php
    $mysqli->close();
    ?>

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