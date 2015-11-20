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
  <header>
    <section>
      <img id='logo' src="img/logo.png">
    </section>
    <section>
      <button id='boton' type="submit" class="button" onclick="window.location.href='salir.php'">LOGOUT</button>
    </section>
  </header>
  <!-- ############################################################ -->
  <section>
    <h1>Reservar Recurso</h1>
    <section id="formulario">
      <!-- Resultado busqueda de recursos -->
      <?php
        $con=mysqli_connect('localhost', 'root', 'DAW22015', 'bd_recursos');
      ?>
      <!-- ############################################################ -->
      <article id="modifuser">
        <?php 
          $idUser = $_REQUEST['idUsuario'];

          $franjaH = array('08:00-08:59','09:00-09:59','10:00-10:59','11:00-11:59','12:00-12:59','13:00-13:59','14:00-14:59','15:00-15:59','16:00-16:59');
          //////////////////////////////////////////////////////////////
          $buscarRecurs="SELECT * FROM recursos WHERE id_recurs=$_REQUEST[id]";
          $recurs=mysqli_query($con,$buscarRecurs);
          echo "<table><tr><th>Producte</th><th>Nom</th><th>Quantitat Reservas</th></tr>";
          if (mysqli_num_rows($recurs)>0){
            while($row=mysqli_fetch_array($recurs)){
              echo "<td>$row[id_recurs]</td>";
              $idRec = $row['id_recurs'];
              echo "<td>".$row['nom_recurs']."</td>";
              $sql2="SELECT COUNT(recurs_reservat) AS 'quantitatReservas' FROM reservas WHERE recurs_reservat=$row[id_recurs]";
              $datos2=mysqli_query($con,$sql2);
              if(mysqli_num_rows($datos2)>0){
                while($row2=mysqli_fetch_array($datos2)){
                  echo "<td>$row2[quantitatReservas]</td></tr></table><br/>";
                }
              }
              //////////////////////////////////////////////////////////////
              echo "<form action='reserva_recurs.php?id=$_REQUEST[id]' method='POST'>
                    <input type='hidden' name='idUsuario' value='$idUser'>";
              if(isset($_REQUEST['diaR'])){
                echo "<input type='date' name='diaR' value='$_REQUEST[diaR]' required>";
              }else{
                echo "<input type='date' name='diaR' required>";
              }
              echo "<button>Comprobar horas</button><br/>
                    </form><br/>";
              //////////////////////////////////////////////////////////////
              if(isset($_REQUEST['diaR'])){
                echo "<form action='reserva_recurs.proc.php?id=$_REQUEST[idUsuario]' method='POST'>";
                $sql="SELECT * FROM reservas WHERE dia='$_REQUEST[diaR]' && recurs_reservat=$_REQUEST[id]";
                $datos=mysqli_query($con,$sql);
                $arrayTotal=array();
                if(mysqli_num_rows($datos)>0){
                  while($row=mysqli_fetch_array($datos)){
                    $arrayFranjas=$row['franja_horaria'];
                    $arrayFranjas=explode(',',$arrayFranjas);
                    foreach ($arrayFranjas as $hora) {
                      array_push($arrayTotal, $hora);
                    }
                  }
                  foreach($franjaH as $hora){
                    if(in_array($hora, $arrayTotal)){
                    }else{
                      echo $hora."<input type='checkbox' name='horaR[]' value='$hora'><br/>";
                    }
                  }
                }else{
                  for($i=0;$i<sizeof($franjaH);$i++){
                    echo $franjaH[$i]."<input type='checkbox' name='horaR[]' value='$franjaH[$i]'><br/>";
                  }
                }
                echo "<input type='hidden' name='idDia' value='$_REQUEST[diaR]'>";
                echo "<input type='hidden' name='idRecurs' value='$idRec'>";
                echo "<br/><button type='submit'>Reservar</button>";
                echo "</form>";
              }
            }
          }
          //////////////////////////////////////////////////////////////
        ?>
      </article>
      <!-- ############################################################ -->
    </section>
    <footer id="footer">
      <section></br><br>
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