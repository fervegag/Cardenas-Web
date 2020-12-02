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
    <link rel="stylesheet" href="css/confirmaciones.css">
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
                    <li><a href="#">Noticias</a></li>
                    <li><a href="#">Eventos</a></li>
                    <li><a href="panel.php">Panel</a></li>
                    <li><a href="seguridad_admin.php">Seguridad</a></li>
                    <li><a href="logout.php">Salir</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="main">
        <div class="ConfirmProf">
            <h1 class="title-prof">Lista de profesores</h1>
            <form method="POST">
                <table class="tabla">
                    <thead>
                        <tr>
                            <th>Registro</th>
                            <th colspan="2">Nombre</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Cinta</th>
                            <th>Gimnasio</th>
                            <th>Operación</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('dbmanager/config.php');
                        $sqlCodigos = "SELECT user_code FROM logininfo WHERE type_user = '0' AND status_user = '1'";
                        $resultado = $mysqli->query($sqlCodigos);
                        if ($resultado->num_rows > 0) {
                            $varSaveProf = array();
                            for ($c = 0; $row = $resultado->fetch_assoc(); $c++) {
                                $varSaveProf[$c] = $row['user_code'];
                                $sqlPendientes = "SELECT reg_code, first_name, last_name, phone_num, email, color, gym_name FROM instructor 
                                INNER JOIN belt ON instructor.belt_id1 = belt.belt_id
                                INNER JOIN gym ON instructor.gym_code1 = gym.gym_code where reg_code = '" . $varSaveProf[$c] . "'";
                                $infoProf = $mysqli->query($sqlPendientes);
                                if ($infoProf->num_rows > 0) {
                                    while ($row2 = $infoProf->fetch_assoc()) { ?>
                                        <tr class="infoProfe">
                                            <td class="code"><?php echo $row2['reg_code'] ?></td>
                                            <td class="name"><?php echo $row2['first_name'] ?></td>
                                            <td class="last-n"><?php echo $row2['last_name'] ?></td>
                                            <td class="phone-n"><?php echo $row2['phone_num'] ?></td>
                                            <td class="email-add"><?php echo $row2['email'] ?></td>
                                            <td class="cinta"><?php echo $row2['color'] ?></td>
                                            <td class="gym_code"><?php echo $row2['gym_name'] ?></td>
                                            <td>
                                                <a href="eliminar_prof.php?code=<?php echo $row2['reg_code']; ?>" class="link_rech_prof">Eliminar</a>
                                            </td>
                                        </tr>
                        <?php
                                    }
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </form>
        </div>
        <script src="js/eliminar_prof.js"></script>
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
    <script src="../js/javaS1.js"></script>

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