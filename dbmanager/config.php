<?php
define('USER','root');
define('PASSWORD','');
define('HOST','localhost');
define('DATABASE','CardenasDB');

$mysqli = new mysqli(HOST, USER, PASSWORD,DATABASE);
if($mysqli->connect_errno){
    echo "Fallo al conectar a MySQL: (".$mysqli->connect_errno.")".$mysqli->connect_error;
}
?>