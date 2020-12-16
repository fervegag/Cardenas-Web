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
                    <li><a href="#">Perfil</a></li>
                    <li><a href="noticias_profesor.php">Noticias</a></li>
                    <li><a href="#">Alumnos</a></li>
                    <li><a href="#">Torneos</a></li>
                    <li><a href="seguridad_prof.php">Seguridad</a></li>
                    <li><a href="logout.php">Salir</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="main">
    <?php
    $usuario = $_SESSION['user_id'];
    include('dbmanager/config.php');
    $sqlGymProf="SELECT gym_code1 FROM instructor WHERE reg_code = '".$usuario."'";
    $resultGymProf = $mysqli->query($sqlGymProf);
    if($resultGymProf->num_rows > 0){
        while($row = $resultGymProf->fetch_assoc()){
            $gymProf = $row['gym_code1'];
        }
        if($row != '1'){
            $sqlAlumnos = "SELECT * FROM pupil WHERE gym_code2 = '".$gymProf."'";
            $resultAlumnos = $mysqli->query($sqlAlumnos);
            if($resultAlumnos->num_rows > 0){
                while($row2 = $resultAlumnos->fetch_assoc()){
                    $nombre = $row2['first_name'];
                    $apellido = $row2['last_name'];
                    $foto = $row2['picture'];
                    ?>
                    <p>Nombre: <?php echo $nombre ?></p> <br>
                    <p>Apellido: <?php echo $apellido ?></p> <br>
                    <img src="data:image/jpg;base64, <?php echo base64_encode($foto) ?>" alt="Foto" width="25%">
                    <?php
                }
            }else{
                echo "No se recuperaron datos de alumnos";
            }
        }else{
            echo "Aún no se selecciona el gimnacio";
        }
    }else{
        echo "no se recuperaron datos de profesores";
    }
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

</body>

</html>