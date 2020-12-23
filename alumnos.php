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
    <link rel="stylesheet" href="css/noticia.css">
    <link rel="stylesheet" href="css/bootstrap.css">
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
        <section id="principal">
            <button type="button" class="btn btn-primary button" data-toggle="modal" data-target="#nuevaNoticia" data-nuevaNoticia="Nueva"><i class="far fa-newspaper"> Agregar Alumno</i></button>
            <?php
            include('dbmanager/config.php');
            $usuario = $_SESSION['user_id'];
            $sqlGym = "SELECT gym_code1 FROM instructor WHERE reg_code = '" . $usuario . "'";
            $resultGym = $mysqli->query($sqlGym);
            if ($resultGym->num_rows > 0) {
                while ($row1 = $resultGym->fetch_assoc()) {
                    $gymProf = $row1['gym_code1'];
                }
            }
            $sqlAlumno = "SELECT pupil_id, first_name, last_name, birthdate, phone_num, emergency_phone, pupil.adress, blood_type, picture, status_p, color, gym_name, gym_code2 
                            FROM pupil INNER JOIN belt on pupil.belt_id2 = belt.belt_id
                            INNER JOIN gym ON pupil.gym_code2 = gym.gym_code 
                            WHERE gym_code2 = '$gymProf'
                            ORDER BY last_name";

            //Consulta de alumnos
            $resultAlumno = $mysqli->query($sqlAlumno);
            if ($resultAlumno->num_rows > 0) {
                while ($row = $resultAlumno->fetch_assoc()) {
                    $idAlumno = $row['pupil_id'];
                    $nombre = $row['first_name'];
                    $apellido = $row['last_name'];
                    $nombreCompleto = $row['last_name'] . ", " . $row['first_name'];
                    $fecha = $row['birthdate'];
                    $numero = $row['phone_num'];
                    $emergencias = $row['emergency_phone'];
                    $dir = $row['adress'];
                    $tipoSangre = $row['blood_type'];
                    $foto = $row['picture'];
                    $status_p = $row['status_p'];
                    $grado = $row['color'];
                    $gym = $row['gym_name'];
                    $gymAlumno = $row['gym_code2'];
                    //Diseño
                    //Estado del alumno
                    if($status_p === '1'){
                        $estado = "Activo";
                    }else{
                        $estado = "Inactivo";
                    }
                    //Edad
                    $fechaNacimiento = new DateTime($fecha);
                    $hoy = new DateTime();
                    $edad = $hoy->diff($fechaNacimiento);
            ?>
                    
                    <section id="publicaciones">
                        <article class="post">
                            <h2 class="titulo-post"><?php echo $nombreCompleto ?></h2>
                            <img src="data:image/jpg;base64,<?php echo base64_encode($foto) ?>" class="img-post perfil">
                            <p>
                                <strong>Edad: </strong><span class="datos-publicaciones"><?php echo $edad->y; ?></span>
                                &nbsp; &nbsp; <br>
                                <strong>Cinta: </strong><span class="datos-publicaciones"><?php echo $grado ?></span>
                                &nbsp; &nbsp; <br>
                                <strong>Teléfono: </strong><span class="datos-publicaciones"><?php echo $numero ?></span>
                                &nbsp; &nbsp; <br>
                                <strong>Emergencias: </strong><span class="datos-publicaciones"><?php echo $emergencias ?></span>
                                &nbsp; &nbsp; <br>
                                <strong>Tipo de sangre: </strong><span class="datos-publicaciones"><?php echo $tipoSangre ?></span>
                                &nbsp; &nbsp; <br>
                                <strong>Estado: </strong><span class="datos-publicaciones"><?php echo $estado ?></span>
                                &nbsp; &nbsp; <br>
                            </p>
                            <strong>Dirección: </strong>
                            <p class="texto-post">
                                <?php echo $dir ?>
                            </p>
                            <span class="operaciones">
                                <a href="eliminar_alumno.php?id=<?php echo $idAlumno; ?>" class="link_delete"><i class="fas fa-trash-alt"></i></a>
                                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editarnoticia" data-whatever="<?php echo $idNoticia ?>">Open modal for <?php echo $idNoticia ?> </button> -->
                                <a href="#" data-toggle="modal" data-target="#editarAlumno" data-whatever="<?php echo $idAlumno ?>" data-edad="<?php echo $edad->y ?>" data-cinta="<?php echo $grado ?>" 
                                data-tel="<?php echo $numero ?>"data-emerg="<?php echo $emergencias ?>" data-sangre="<?php echo $tipoSangre ?>" data-estado="<?php echo $estado ?>"
                                data-nombre="<?php echo $nombre ?>" data-apellido="<?php echo $apellido ?>" data-dir="<?php echo $dir ?>"><i class="fas fa-edit"></i></a>
                            </span>
                        </article>
                    </section>
            <?php
                }
            } else {
                // echo "No se encontraron noticias";
            }
            ?>
        </section>
        <p id="gimnasio" style="color: #E3E3E3;"><?php echo $gymProf; ?></p>
        
        <div class="modal fade" id="editarAlumno" tabindex="-1" role="dialog" aria-labelledby="editarAlumnoLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editarAlumnoLabel">Actualización</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <div class="form-group">
                                <label for="id_alumno" class="col-form-label">ID del alumno:</label>
                                <input type="text" class="form-control" id="id_alumno" name="recipient-name" disabled>
                            </div>
                            <div class="form-group">
                                <label for="nombre_alumno" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre_alumno" name="nombre_alumno" required>
                            </div>
                            <div class="form-group">
                                <label for="apellidos_alumno" class="col-form-label">Apellidos:</label>
                                <input type="text" class="form-control" id="apellidos_alumno" name="apellidos_alumno" required>
                            </div>
                            <div class="form-group">
                                <label for="telefono" class="col-form-label">Teléfono:</label>
                                <input type="number" class="form-control" id="telefono" name="telefono" required>
                            </div>
                            <div class="form-group">
                                <label for="emergencias" class="col-form-label">Teléfono de emergencia:</label>
                                <input type="number" class="form-control" id="emergencias" name="emergencias" required>
                            </div>
                            <div class="form-group">
                                <label for="estado" class="col-form-label">Estado:</label>
                                <!-- <input type="text" class="form-control" id="estado" name="estado"> -->
                                <select id="estado"class="form-control" required>
                                    <option value="3" name="estado">Seleccione una opción</option>
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="direccion" class="col-form-label">Dirección:</label>
                                <textarea class="form-control" id="direccion" name="direccion" required></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" onclick="actualizarAlumno()">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="nuevaNoticia" tabindex="-1" role="dialog" aria-labelledby="nuevaNoticiaLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="nuevaNoticiaLabel">Nuevo Alumno</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="agregarAlumno.php" method="POST" enctype="multipart/form-data" onsubmit="return validarAlumno();">
                        <div class="form-group">
                                <label for="add_nombre" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="add_nombre" name="add_nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="add_apellido" class="col-form-label">Apellidos:</label>
                                <input type="text" class="form-control" id="add_apellido" name="add_apellido" required>
                            </div>
                            <div class="form-group">
                                <label for="add_fecha" class="col-form-label">Fecha de nacimiento:</label>
                                <input type="date" class="form-control" id="add_fecha" name="add_fecha" required>
                            </div>
                            <div class="form-group">
                                <label for="add_telefono" class="col-form-label">Teléfono:</label>
                                <input type="tel" class="form-control" id="add_telefono" name="add_telefono" required>
                            </div>
                            <div class="form-group">
                                <label for="add_emergencias" class="col-form-label">Teléfono de emergencias:</label>
                                <input type="tel" class="form-control" id="add_emergencias" name="add_emergencias" required>
                            </div>
                            <div class="form-group">
                                <label for="add_sangre" class="col-form-label">Tipo de sangre:</label>
                                <!-- <input type="text" class="form-control" id="add_fecha" name="add_fecha" required> -->
                                <select name="add_sangre" id="add_sangre" class="form-control" required>
                                    <option value="3">Seleccione el tipo de sangre</option>
                                    <option value="A+">A+</option>
                                    <option value="B+">B+</option>
                                    <option value="O+">O+</option>
                                    <option value="AB+">AB+</option>
                                    <option value="A-">A-</option>
                                    <option value="B-">B-</option>
                                    <option value="O-">O-</option>
                                    <option value="AB-">AB-</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="add_cinta" class="col-form-label">Cinta actual:</label>
                                <!-- <input type="text" class="form-control" id="add_fecha" name="add_fecha" required> -->
                                <select name="add_cinta" id="add_cinta" class="form-control" required>
                                    <option value="0">Seleccione una opción</option>
                                    <?php
                                    $sqlCintas = "SELECT * FROM belt";
                                    $resultCintas = $mysqli->query($sqlCintas);
                                    if($resultCintas->num_rows > 0){
                                        while($row2 = $resultCintas->fetch_assoc()){
                                            $idCinta = $row2['belt_id'];
                                            $cinta = $row2['color'];
                                            ?>
                                            <option value="<?php echo $idCinta; ?>"><?php echo $cinta; ?></option>
                                        <?php
                                        }
                                    }else{
                                        echo "Consulta erronea";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="add_estado" class="col-form-label">Estado:</label>
                                <!-- <input type="text" class="form-control" id="add_fecha" name="add_fecha" required> -->
                                <select name="add_estado" id="add_estado" class="form-control" required>
                                    <option value="3">Seleccione una opción</option>
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="add_foto" class="col-form-label">Foto:</label>
                                <input type="file" name="add_foto" id="add_foto" required>
                            </div>
                            <div class="form-group">
                                <label for="add_direccion" class="col-form-label">Dirección:</label>
                                <textarea class="form-control" id="add_direccion" name="add_direccion" required></textarea>
                            </div>
                            <div class="form-group botones">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Agregar</button>
                            </div>
                            <style>
                                .botones {
                                    float: right;
                                    display: inline-block;
                                }
                            </style>
                        </form>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
        <?php
        $mysqli->close();
        ?>
    </main>
    <!-- Scripts para eliminar alumno y validar noticia -->
    <script src="js/eliminar_alumno.js"></script>
    <script src="js/validar_alumno.js"></script>
    <!-- Scripts para Boostrap -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/abrir_modal.js"></script>
    <script src="js/acciones_modal.js"></script>
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