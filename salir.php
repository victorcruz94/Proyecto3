<!-- Salimos de la sesion que esta abierta -->
<?php
session_start();
session_unset();
session_destroy();
echo"<script type='text/javascript'>
	alert('La sesión cerrada correctamente');
	window.location='index.php';
	</script>";
?>