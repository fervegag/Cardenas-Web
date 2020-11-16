<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}else{

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
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
                    <li><a href="index.php">Noticias</a></li>
                    <li><a href="#">Alumnos</a></li>
                    <li><a href="#">Torneos</a></li>
                    <li><a href="#">Seguridad</a></li>
                    <li><a href="logout.php">Cerrar sesión</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
    <main class="main">
        <?php
            $usuario=$_SESSION['id_user'];
            $mysqli = new mysqli("localhost", 'root', '','CardenasDB');
            if($mysqli->connect_errno){
                echo "Fallo al conectar a MySQL: (".$mysqli->connect_errno.")".$mysqli->connect_error;
            }
            $sqlNombre = "SELECT first_name FROM instructor WHERE reg_code = '".$usuario."'";
            $resultado = $mysqli->query($sqlNombre);
            if($resultado->num_rows >0){
                while($row = $resultado->fetch_assoc()){
                    $Nombre = $row['first_name'];
                }
                echo '<h1>Bienvenido  '.$Nombre.'</h1></div>';
            }
            else{ echo '<h1>Falló</h1>';}

            $sqlNacimiento = "SELECT birthdate FROM instructor WHERE reg_code = '".$usuario."'";
            $resultado = $mysqli->query($sqlNacimiento);
            if($resultado->num_rows >0){
                while($row = $resultado->fetch_assoc()){
                    $Nacimiento = $row['birthdate'];
                }
            }
            else{ echo '<h1>Falló</h1>';}

            $sqlNumero = "SELECT phone_num FROM instructor WHERE reg_code = '".$usuario."'";
            $resultado = $mysqli->query($sqlNumero);
            if($resultado->num_rows >0){
                while($row = $resultado->fetch_assoc()){
                    $Numero = $row['phone_num'];
                }
            }
            else{ echo '<h1>Falló</h1>';}
            $sqlCorreo = "SELECT email FROM instructor WHERE reg_code = '".$usuario."'";
            $resultado = $mysqli->query($sqlCorreo);
            if($resultado->num_rows >0){
                while($row = $resultado->fetch_assoc()){
                    $Correo = $row['email'];
                }
            }
            else{ echo '<h1>Falló</h1>';}

            $sqlGrado = "SELECT color FROM instructor INNER JOIN belt on instructor.belt_id1 = belt.belt_id WHERE reg_code = '".$usuario."'";
            $resultado = $mysqli->query($sqlGrado);
            if($resultado->num_rows >0){
                while($row = $resultado->fetch_assoc()){
                    $Grado = $row['color'];
                }
            }
            else{ echo '<h1>Falló</h1>';}

            $sqlGrado = "SELECT gym_name FROM instructor INNER JOIN gym on instructor.gym_code1 = gym.gym_code WHERE reg_code = '".$usuario."'";
            $resultado = $mysqli->query($sqlGrado);
            if($resultado->num_rows >0){
                while($row = $resultado->fetch_assoc()){
                    $gym = $row['gym_name'];
                }
            }
            else{ echo '<h1>Falló</h1>';}
            
            echo '<div> <p>Gimnasio: '.$gym.'</p>
                        <p>Cinta: '.$Grado.'</p>
                        <p>Fecha de nacimiento: '.$Nacimiento.'</p>
                        <p>Correo electrónico: '.$Correo.'</p>
                        <P>Número telefónico: '.$Numero.'</p>
                        ';
            $mysqli->close();
        ?>

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
    
</body>
</html>