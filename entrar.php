<!-- se inicia sesion de usuario -->
<?php
session_start();
require_once('conexion.php');

$nickname_usuari = $_POST['usuari'];
$password_usuari = $_POST['clave'];

$consulta = "SELECT * FROM usuario WHERE nickname_usuari='$nickname_usuari' and password_usuari='$password_usuari'";
$query = mysql_query($consulta,$conexion);

/* Si el usuario existe se inicia sesion, si no lo está o la contraseña es incorrecta 
se notifica y volvemos a la pagina principal del formulario */ 
if($row = mysql_fetch_assoc($query)){
	$_SESSION['nickname_usuari'] = $row['nickname_usuari'];
	if($row['tipo_usuario']=="normal"){
		header("Location: pagina_principal.php?id=$row[id_usuario]");
	}else{
		if($row['tipo_usuario']=="admin"){
			header("Location: pagina_principal_admin.php?id=$row[id_usuario]");
		}else{
			header("Location: pagina_principal_root.php?id=$row[id_usuario]");
		}
	}
} else {
	echo"<script type='text/javascript'>
		alert('El usuario o la contraseña son incorrectos. Vuelve a intentarlo!!!');
		window.location.href='index.php';
		</script>";
}
?>