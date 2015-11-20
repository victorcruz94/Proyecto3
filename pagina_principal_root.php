<!DOCTYPE html>
<html>
  <!-- ############################ - HEAD - ################################ -->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Recursos de la empresa</title>
    <link type="text/css" rel="stylesheet" href="css.css" />
    <script type="text/javascript" src="resultadoBusqueda.js"></script>
  </head>
  <!-- ############################ - BODY - ################################ -->
  <body id='bg'>
    <!-- ############################ - HEADER - ################################ -->
    <header>
      <!-- ############################ - LOGO - ################################ -->
      <section>
        <img id='logo' src="img/logo.png">
      </section>
    </header>
    <!-- ############################ - NAVBAR - ################################ -->
    <nav>
      <section>
      <?php
        $idUser = $_REQUEST['id'];
      ?>
        <button id='boton' type="submit" title="Inicio" class="button" onclick="window.location.href='salir.php'">LOGOUT</button>
        <form action="administracionRoot.php" method="POST">
          <input type="hidden" name="identif_usuario" value="<?php echo $idUser; ?>">
          <button id='boton' type="submit" title="Inicio" class="button" onclick="window.location.href='administracionRoot.php'">ADMIN</button>
        </form>
      </section>
    </nav>
    <!-- ############################ - CONTENIDO - ################################ -->
    <section>
      <h1>RECURSOS</h1>
      <!-- ############################ - RECURSOS - ################################ -->
      <section id="recursos">
        <button id="btn9" class="menu" onclick="resultado9();">Els meus recursos</button></br><br>
        <button id="btn1" class="menu" onclick="resultado1();">Aules de teoría</button></br><br>
        <button id="btn2" class="menu" onclick="resultado2();">Aules d'informatica</button></br><br>
        <button id="btn3" class="menu" onclick="resultado3();">Despatxos d'entrevistas</button></br><br>
        <button id="btn4" class="menu" onclick="resultado4();">Sala de reunions</button></br><br>
        <button id="btn5" class="menu" onclick="resultado5();">Projector portàtil</button></br><br>
        <button id="btn6" class="menu" onclick="resultado6();">Carro de portàtils</button></br><br>
        <button id="btn7" class="menu" onclick="resultado7();">Portàtils</button></br><br>
        <button id="btn8" class="menu" onclick="resultado8();">Mòbils</button></br><br>
      </section>
      <!-- ##################### - RESULTADO BUSQUEDA - ######################### -->
      <section id="formulario">
        <?php
          $con=mysqli_connect('localhost', 'root', 'DAW22015', 'bd_recursos');
        ?>
        <article id="resultBusqueda">
          <?php
            include("formularios.php");
          ?>
        </article>
        <!-- ####################### - IMAGEN COLEGIO - ########################## -->
        <article id="fotoCole">
          <img src="img/colegio.jpg">
        </article>
      </section>
    </section>
    <!-- ############################ - FOOTER - ################################ -->
    <footer>
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