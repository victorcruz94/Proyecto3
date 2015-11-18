<!-- Notificar todos los errores excepto E_NOTICE -->
<?php session_start();
error_reporting(E_ALL^E_NOTICE);
 ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Escola st.ParronCruzSalvador</title>
		<link rel="stylesheet" href="estilo.css" type="text/css" />
		<!-- validacion de formulario con javascript -->
		<script type="text/javascript">
			function validarForm(formulario) {
				if(formulario.usuari.value.length==0 && formulario.clave.value.length==0) {
					formulario.usuari.focus();
					formulario.clave.focus();
					alert('Els camps estàn buits, introdueix nom i contrasenya');
					return false;
				}
				if(formulario.usuari.value.length==0) {
					formulario.usuari.focus();
					alert('Introdueix usuari');
					return false;
				}
				if(formulario.clave.value.length==0) {
					formulario.clave.focus();
					alert('Introdueix contrasenya');
					return false;
				}
				return true;
			}
		</script>
	</head>
	<body background="img/bgini.jpg">
		<section id="cuerpo">
			<!-- pagina mensaje de inicio de sesion -->
			<?php
				if($_SESSION['nickname_usuari']){
			?>
			<a href="index2.php"></a>
			<?php
				}else{
			?>
			<!-- formulario de loguin -->
			<article id="login"><br />
    			<form action="entrar.php" method="post" onsubmit="return validarForm(this);" >
    				<b>Identificació de usuari:</b><br/><br/>
        			<!--<input type="text" placeholder="Correo electronico..." name="correo" id="texto"/><br />-->
					<input type="text" placeholder="Nom usuari..." name="usuari" id="rec" required/></br><br>
        			<input type="password" placeholder="Clau accés..." name="clave" id="rec" required/></br><br>
        			<input type="submit" name="submit" value="Entrar" id="boton">
					<input type="reset" value="Borrar" id="boton">
        		</form>
    		</article>
			<?php
				}
			?>
		</section>
	</body>
</html>