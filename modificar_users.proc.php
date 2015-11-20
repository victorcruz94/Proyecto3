<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Recursos de la empresa</title>
  <link type="text/css" rel="stylesheet" href="css.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <script type="text/javascript" src="resultadoBusqueda.js"></script>
</head>
<!-- ############################################################ -->
<body id='bg'>
  <!-- Resultado busqueda de recursos -->
  <?php
    $con=mysqli_connect('localhost', 'root', 'DAW22015', 'bd_recursos');
    $sql="UPDATE usuario SET nom_usuari='$_REQUEST[nombre]',nickname_usuari='$_REQUEST[nickname]',correo_usuari='$_REQUEST[mail]',tipo_usuario='$_REQUEST[tipo]' WHERE id_usuario=$_REQUEST[idUsuario]";
    $datos=mysqli_query($con,$sql);
    $sql="SELECT * FROM usuario WHERE id_usuario=$_REQUEST[idUsuarioYo]";
    $datos=mysqli_query($con,$sql);
    if(mysqli_num_rows($datos)>0){
      while($row=mysqli_fetch_array($datos)){
        if($row['tipo_usuario']=="admin"){
          header("Location: administracionAdmin.php?identif_usuario=$row[id_usuario]");
        }else{
          header("Location: administracionRoot.php?identif_usuario=$row[id_usuario]");
        }
      }
    }
  ?>
  <!-- ############################################################ -->
</body>
</html>