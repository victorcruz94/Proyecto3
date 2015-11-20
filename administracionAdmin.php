<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Recursos de la empresa</title>
  <link type="text/css" rel="stylesheet" href="css.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <script type="text/javascript" src="resultadoBusqueda.js"></script>
</head>
<header>
  <section>
    <img id='logo' src="img/logo.png">
  </section>
  <section>
    <button id='boton' type="submit" class="button" onclick="window.location.href='salir.php'">LOGOUT</button>
    <button id='boton' type="submit" class="button" onclick="window.location.href='pagina_principal_admin.php?id=<?php echo $_REQUEST['identif_usuario']; ?>'">INICIO</button>
  </section>
</header>
<!-- ############################################################ -->
<body id='bg'>
  <section>
    <h1>USUARIOS</h1>
    <section id="formulario">
      <!-- Resultado busqueda de recursos -->
      <?php
        $con=mysqli_connect('localhost', 'root', 'DAW22015', 'bd_recursos');
      ?>
      <!-- ############################################################ -->
      <article id="usuarios">
      <?php
        $idUser=$_REQUEST['identif_usuario'];
        $buscarUsuarios="SELECT * FROM usuario WHERE tipo_usuario='normal'";
        $users=mysqli_query($con,$buscarUsuarios);
        echo "<table><tr><th>#</th><th>Nom</th><th>Nickname</th><th>Mail</th><th>Categoria</th><th>Modificar</th><th>Eliminar</th></tr>";
        if (mysqli_num_rows($users)>0){
          while($row=mysqli_fetch_array($users)){
            echo "<td>$row[id_usuario]</td>";
            echo "<td>".utf8_encode($row['nom_usuari'])."</td>";
            echo "<td>".utf8_encode($row['nickname_usuari'])."</td>";
            echo "<td>".utf8_encode($row['correo_usuari'])."</td>";
            echo "<td>".$row['tipo_usuario']."</td>";
            echo "<td>
                    <form action='modificar_users.php?id=$row[id_usuario]' method='POST'>
                      <input type='hidden' name='identif_usuario' value='$idUser'>
                      <button>
                        <i class='fa fa-pencil-square-o' style='color:black;'></i>
                      </button>
                    </form>
                  </td>";
            ?><td>
                    <form action='eliminar_users.php?id=<?php echo $row['id_usuario'] ?>' method='POST'>
                      <input type="hidden" name="identif_usuario" value="<?php echo $idUser; ?>">
                      <button onclick="return confirm('Deseas eliminar a este usuario?');">
                        <i class='fa fa-user-times' style='color:black;'></i>
                      </button>
                    </form>
                  </td>
                </tr>
              <?php
          }
        }
          //<button id='boton' type='submit' title='Inicio' class='button' onclick='window.location.href='administracionAdmin.php''>ADMIN</button>
        echo "</table>";
        echo "<button><a href='afegir_users.php?identif_usuario=$_REQUEST[identif_usuario]'><i class='fa fa-user-plus'></i></a><b/button>";
        mysqli_close($con);
      ?>
      </article>
      
      <!-- ############################################################ -->
    </section>
  </section>
  <footer id="footer">
<section>
</br><br>
<h2>Escola St.Parrón Cruz Salvador</h2>
<h4>Ensenyament de cualitat desde 1995</h4>
<h5>copyright St. Parrón Cruz Salvador 1995</h5>
</section>
<section id="spe">
  <img src="img/fb.png">
  <img src="img/tw.png">
  <img src="img/ins.png">
  <img src="img/gm.png">
</section>
<section id="info">
  <h4>Fundació St.ParrónCruzSalvador</h4>
  <h4>Avís legal</h4>
  <h4>Política de privacitat</h4>
  <h4>Contacte</h4>
</section>
</footer>
</body>
</html>