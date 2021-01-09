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
  <link href="css/bootstrap.css" rel="stylesheet">
  <!-- <link href="css/ionicons.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="css/style.css">
  <!-- <link rel="stylesheet" href="css/confirmaciones.css"> -->
  <link rel="stylesheet" href="css/config.css">
  
  <title>Panel</title>
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
        <ul>
          <li><a href="administrativo.php">Perfil</a></li>
          <li><a href="noticias_admin.php">Noticias</a></li>
          <li><a href="eventosAdmin.php">Eventos</a></li>
          <li><a href="#">Panel</a></li>
          <li><a href="seguridad_admin.php">Seguridad</a></li>
          <li><a href="logout.php">Salir</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <main class="main">
    <div class="section-counter paralax-mf bg-image" style="background-image: url(img/counters-bg.jpg)">
      <div class="overlay-mf"></div>
      <div class="container">
        <div class="row">
          <div class="col-sm-3 col-lg-3">
            <div class="counter-box">
              <div class="counter-ico">
                <a href="confirmaciones.php"><span class="ico-circle"><i class="fas fa-check"></i></span> </a> <br>
              </div>
              <div class="counter-num">
                <span class="counter-text"><b>CONFIRMACIONES</b></span>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-lg-3">
            <div class="counter-box pt-4 pt-md-0">
              <div class="counter-ico">
                <a href="administra_prof.php"><span class="ico-circle"><i class="fas fa-users"></i></span> <br> </a>
              </div>
              <div class="counter-num">
                <span class="counter-text"><b>ADMINISTRACIÓN DE PROFESORES</span></b>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-lg-3">
            <div class="counter-box pt-4 pt-md-0">
              <div class="counter-ico">
                <a href="gimnasios.php"> <span class="ico-circle"><i class="fas fa-cogs"></i></span><br></a>
              </div>
              <div class="counter-num">
                <span class="counter-text"><b>GESTIONAR GIMNASIOS</b></span>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-lg-3">
            <div class="counter-box pt-4 pt-md-0">
              <div class="counter-ico">
                <a href="archivo.php"> <span class="ico-circle"><i class="fas fa-medal"></i></span> </a> <br>
              </div>
              <div class="counter-num">
                <span class="counter-text"><b>REGISTRO DE TORNEOS</b></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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