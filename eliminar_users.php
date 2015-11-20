<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <title>Eliminar usuarios</title>
  </head>
  <body>
    <?php
      $con = mysqli_connect('localhost', 'root', 'DAW22015', 'bd_recursos');

      $sql = "DELETE FROM usuario WHERE id_usuario=$_REQUEST[id]";
      $datos = mysqli_query($con, $sql);
      $sql = "SELECT * FROM usuario WHERE id_usuario=$_REQUEST[identif_usuario]";
      echo $sql;

      $datos = mysqli_query($con, $sql);
      if(mysqli_affected_rows($con)==1){
        if (mysqli_num_rows($datos)>0){
          while($row=mysqli_fetch_array($datos)){
            if($row['tipo_usuario']=='admin'){
              header("location:administracionAdmin.php?identif_usuario=$_REQUEST[identif_usuario]");
            }else{
              header("location:administracionRoot.php?identif_usuario=$_REQUEST[identif_usuario]");
            }
          }
        }
      } elseif(mysqli_affected_rows($con)==0){
        echo "No se ha eliminado ningún producto por que no existe en la BD";
      } else {
        echo "Ha pasado algo raro";
      }
      mysqli_close($con);
    ?>
  </body>
</html>