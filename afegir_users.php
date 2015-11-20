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
  <?php
    $idUser=$_REQUEST['identif_usuario'];
  ?>
  <section>
    <button id='boton' type="submit" class="button" onclick="window.location.href='salir.php'">LOGOUT</button>
    <?php
      $con=mysqli_connect('localhost', 'root', 'DAW22015', 'bd_recursos');
      $sql="SELECT * FROM usuario WHERE id_usuario=$idUser";
      $user=mysqli_query($con,$sql);
      if (mysqli_num_rows($user)>0){
        while($row=mysqli_fetch_array($user)){
          if($row['tipo_usuario']=='admin'){
            ?>
            <button id='boton' type="submit" class="button" onclick="window.location.href='pagina_principal_admin.php?id=<?php echo $idUser; ?>'">RESERVAS</button>
            <?php
          }else{
            ?>
            <button id='boton' type="submit" class="button" onclick="window.location.href='pagina_principal_root.php?id=<?php echo $idUser; ?>'">RESERVAS</button>
            <?php
          }
        }
      }
    ?>
  </section>
</header>
<!-- ############################################################ -->
<body id='bg'>
  <section>
    <h1>Afegir Usuari</h1>
    <section id="formulario">
      <!-- ############################################################ -->
      <article id="afegirUser">
        <form action="afegir_users.proc.php" method="POST">
      <?php
        $tipoUsuario="SELECT * FROM usuario WHERE id_usuario=$_REQUEST[identif_usuario]";
        $users2=mysqli_query($con,$tipoUsuario);
        if (mysqli_num_rows($users2)>0){
          while($row=mysqli_fetch_array($users2)){
              echo "Nombre:<br/><input name='nombre' required><br/><br/>";
              echo "Nickname:<br/><input name='nickname' required><br/><br/>";
              echo "Contrasenya:<br/><input name='password' required><br/><br/>";
              echo "Mail:<br/><input name='mail' required><br/><br/>";
              echo "Tipo de usuario:<br/>";
              echo "<input type='hidden' name='idUsuario' value='$row[id_usuario]'>";
              echo "<input type='hidden' name='idUsuarioYo' value='$idUser'>";
              if($row['tipo_usuario']=='admin'){
                echo "<select name='tipo'><option value='normal' selected>Normal</option><option value='admin'>Administrador</option></select><br/><br/>";
              }else{
                  echo "<select name='tipo'><option value='normal'>Normal</option><option value='admin'>Administrador</option><option value='root'>Root</option></select><br/><br/>";
              }
            }
            echo "<button type='submit'>Afegir</button>";
          }
      ?>
      </form>
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