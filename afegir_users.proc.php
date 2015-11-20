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
  <?php
    $con=mysqli_connect('localhost', 'root', 'DAW22015', 'bd_recursos');
    $sql="INSERT INTO usuario (nom_usuari,nickname_usuari,correo_usuari,password_usuari,tipo_usuario) VALUES ('$_REQUEST[nombre]','$_REQUEST[nickname]','$_REQUEST[mail]','$_REQUEST[password]','$_REQUEST[tipo]')";
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
</body>
</html>