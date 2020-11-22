<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="imagenes/dragon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
    <script src="https://kit.fontawesome.com/0458944bda.js" crossorigin="anonymous"></script>

    <title>Registro</title>
</head>

<body>
    <header class="header">
        <div class="container logo-nav-container">
            <!-- <a href="#" class="logo"> DRAGONES <br> CÁRDENAS </br></a> -->
            <img src="imagenes/logo-blanco.png" alt="logo" class="logo">
            <span class="menu-icon">Ver menú</span>
            <nav class="navigation">
                <ul class="show">
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
        <div class="container">
          <form class="formulario">

             <h1>Registrate</h1>
              <div class="contenedor">

              <div class="input-contenedor">
                  <i class="fas fa-user icon"></i>
                  <input type="text" placeholder="Nombre Completo" required>

                  </div>

                  <div class="input-contenedor">
                  <i class="fas fa-envelope icon"></i>
                  <input type="text" placeholder="Correo Electronico" required>

                  </div>

                  <div class="input-contenedor">
                 <i class="fas fa-key icon"></i>
                  <input type="password" placeholder="Contraseña" required>

                  </div>
                  <input type="submit" value="Registrate" class="button">
                  <p>Al registrarte, aceptas nuestras Condiciones de uso y Política de privacidad.</p>
                  <p>¿Ya tienes una cuenta?<a class="link" href="login.php"> <b> Iniciar Sesion</b></a></p>
              </div>
             </form>

        </div>

    </main>

    <footer class="footer">
        <div class="contanier-img">
          <img class="contanier_img" src="imagenes/codeme.jpg" alt="contanier_img">
          <img class="contanier_img"src="imagenes/conade.png" alt="contanier_img">
          <img class="contanier_img"src="imagenes/wbc.png" alt="contanier_img">
          <img class="contanier_img"src="imagenes/whusu.jpg" alt="contanier_img">

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
