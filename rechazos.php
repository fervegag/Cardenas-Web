<?php
include('dbmanager/config.php');
$code = $_GET['code'];
//Primero verificar si es administrador o profesor
$sqlTipo = "SELECT type_user FROM logininfo WHERE user_code = '".$code."'";
$resultTipo = $mysqli->query($sqlTipo);
if($resultTipo->num_rows > 0){
    while($row = $resultTipo->fetch_assoc()){
        $tipo = $row['type_user'];
    }
    if($tipo != '0'){ //Es un admin
        $sqlEliminarProfesor = "DELETE FROM manager WHERE reg_code = '".$code."'";
        $resultEliminarProfesor = $mysqli->query($sqlEliminarProfesor);
        $sqlEliminar = "DELETE FROM logininfo Where user_code = '".$code."'";
        $resultEliminar = $mysqli->query($sqlEliminar);
        if($resultEliminar && $resultEliminarProfesor){
            header('location: confirmaciones.php');
        }else{
            echo "<script>alert('La eliminación falló')</script>";
            header('location: confirmaciones.php');
        }
    }else{ //Es un profesor
        $sqlEliminarProfesor = "DELETE FROM instructor WHERE reg_code = '".$code."'";
        $resultEliminarProfesor = $mysqli->query($sqlEliminarProfesor);
        $sqlEliminar = "DELETE FROM logininfo Where user_code = '".$code."'";
        $resultEliminar = $mysqli->query($sqlEliminar);
        if($resultEliminar && $resultEliminarProfesor){
            header('location: confirmaciones.php');
        }else{
            echo "<script>alert('La eliminación falló')</script>";
            header('location: confirmaciones.php');
        }
    }
}else{
    echo "<script>alert('No se encontraron resultados')</script>";
}
?>