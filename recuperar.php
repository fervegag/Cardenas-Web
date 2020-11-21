<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="imagenes/dragon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <script src="https://kit.fontawesome.com/0458944bda.js" crossorigin="anonymous"></script>
    <title>Recuperar Contraseña</title>
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
            <form class="formulario" method="POST">
                <h1>Recuperación de la contraseña</h1>
                <div class="contenedor">
                    <div class="titulo">
                        <label>Ingrese su número de registro</label>
                    </div>
                    <div class="input-contenedor">
                        <i class="fas fa-user icon"></i>
                        <input type="text" placeholder="Número de registro" name="usuario" id="usuario" required>

                    </div>
                    <div class="titulo">
                        <label>Ingrese el correo con el que se registró</label>
                    </div>
                    <div class="input-contenedor">
                        <i class="fas fa-envelope icon"></i>
                        <input type="text" placeholder="Correo electrónico" name="correo" id="correo" required>
                    </div>
                    <input type="submit" value="Enviar" class="button">
                    <p>¿No tienes una cuenta? <a class="link" href="registro.php"> <b> Registrate </b> </a></p>
                    <p><a href="recuperar.php" class="link">He olvidado mi contraseña</a></p>
                </div>
            </form>
        </div>

    </main>
</body>

</html>