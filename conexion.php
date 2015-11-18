<!-- conexion a la base de datos -->
<?php
session_start();
$servidor = 'localhost';
$usuario = 'root';
$password = 'DAW22015';
$base_datos = 'bd_recursos';
$conexion = mysql_connect($servidor,$usuario,$password,$base_datos) or die ("No se puede conectar a la base de datos!!");
mysql_select_db($base_datos,$conexion) or die ("No se puede conectar a la base de datos!!");

?>