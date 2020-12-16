<?php
$id = $_GET['varid'];
$titulo = $_GET['vartitulo'];
$noticia = $_GET['varnoticia'];
$fecha = $_GET['varfecha'];
include('dbmanager/config.php');
$sqlactualizarNoticia = "UPDATE news SET title = '".$titulo."', body = '".$noticia."', date_news = '".$fecha."' WHERE news_id = '".$id."'"; 
$actualizarNoticia = $mysqli->query($sqlactualizarNoticia);
if($actualizarNoticia){
    header('Location: noticias_admin.php');
}else{
    echo "Todo mal";
}
$mysqli->close();
?>