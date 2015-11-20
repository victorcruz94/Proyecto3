<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Recursos de la empresa</title>
    <link type="text/css" rel="stylesheet" href="css.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script type="text/javascript" src="resultadoBusqueda.js"></script>
  </head>
  <body id='bg'>
  <?php
    $con=mysqli_connect('localhost', 'root', 'DAW22015', 'bd_recursos');
    $cont = 0;
    foreach ($_REQUEST['horaR'] as $horaReserva) {
      if($cont==0){
        $arrayHoras=$horaReserva;
        $cont=1;
      }else{
        $arrayHoras=$arrayHoras.",".$horaReserva;
      }
    }
    $sql="INSERT INTO reservas (recurs_reservat,usuari_reserva,dia,franja_horaria) VALUES ($_REQUEST[idRecurs], $_REQUEST[id], '$_REQUEST[idDia]', '$arrayHoras')";
    //echo $sql;
    $datos=mysqli_query($con,$sql);
    $sql="SELECT * FROM usuario WHERE id_usuario=$_REQUEST[id]";
    $datos=mysqli_query($con,$sql);
    if(mysqli_num_rows($datos)>0){
      while($row=mysqli_fetch_array($datos)){
        if($row['tipo_usuario']=="normal"){
          header("Location: pagina_principal.php?id=$_REQUEST[id]");
        }else{
          if($row['tipo_usuario']=="admin"){
            header("Location: pagina_principal_admin.php?id=$_REQUEST[id]");
          }else{
            header("Location: pagina_principal_root.php?id=$_REQUEST[id]");
          }
        }
      }
    }
  ?>
  </body>
</html>