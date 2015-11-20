    <article id="formulario1">
        <?php
          $idUser = $_REQUEST['id'];
          echo "<h1>Aules de Teoria</h1>";
          $buscarRecursos="SELECT * FROM recursos WHERE tipo_recurs=1";
          $recursos=mysqli_query($con,$buscarRecursos);
          echo "<table><tr><th>Producte</th><th>Nom</th><th>Quantitat Reservas</th><th>Reservar?</th></tr>";
          if (mysqli_num_rows($recursos)>0){
            while($row=mysqli_fetch_array($recursos)){
              echo "<td>$row[id_recurs]</td>";
              echo "<td>".utf8_encode($row['nom_recurs'])."</td>";
              $sql2="SELECT COUNT(recurs_reservat) AS 'quantitatReservas' FROM reservas WHERE recurs_reservat=$row[id_recurs]";
              $datos2=mysqli_query($con,$sql2);
              if(mysqli_num_rows($datos2)>0){
                while($row2=mysqli_fetch_array($datos2)){
                  echo "<td>$row2[quantitatReservas]</td>";
                }
              }
              echo "<td>
                      <form action='reserva_recurs.php?id=$row[id_recurs]' method='POST'>
                        <input type='hidden' name='idUsuario' value='$idUser'>
                        <button>
                          <i class='fa fa-calendar-plus-o' style='color:black;'></i>
                        </button>
                      </form>
                    </td>
                  </tr>";
              if(isset($_POST['producto'])){
                foreach($_POST['producto'] as $producto){
                  $cambiarDisponibilidad="UPDATE `recursos` SET `recursos`.`disponibilitat`='no disponible' WHERE `recursos`.`id_recurs`=$producto";
                  mysqli_query($con,$cambiarDisponibilidad);
                  $introducirReserva="INSERT INTO reservas (recurs_reservat,usuari_reserva,hora_inici,hora_fi) VALUES ($producto,2,now(),now()+INTERVAL 1 HOUR)";
                  mysqli_query($con,$introducirReserva);
                }
              }
            }
          }
          echo "</table>";
        ?>
      </form>
    </article>
    <!-- ############################################################ -->
    <article id="formulario2">
        <?php
          echo "<h1>Aules d'Informàtica</h1>";
          $sql="SELECT * FROM recursos WHERE tipo_recurs=2";
          $datos=mysqli_query($con,$sql);
          echo "<table><tr><th>Producte</th><th>Nom</th><th>Quantitat Reservas</th><th>Reservar?</th></tr>";
          if (mysqli_num_rows($datos)>0){
            while($row=mysqli_fetch_array($datos)){
              echo "<td>$row[id_recurs]</td>";
              echo "<td>".utf8_encode($row['nom_recurs'])."</td>";
              $sql2="SELECT COUNT(recurs_reservat) AS 'quantitatReservas' FROM reservas WHERE recurs_reservat=$row[id_recurs]";
              $datos2=mysqli_query($con,$sql2);
              if(mysqli_num_rows($datos2)>0){
                while($row2=mysqli_fetch_array($datos2)){
                  echo "<td>$row2[quantitatReservas]</td>";
                }
              }
              echo "<td>
                      <form action='reserva_recurs.php?id=$row[id_recurs]' method='POST'>
                        <input type='hidden' name='idUsuario' value='$idUser'>
                      <button>
                        <i class='fa fa-calendar-plus-o' style='color:black;'></i>
                      </button>
                    </form>
                    </td>
                  </tr>";
              if(isset($_POST['producto'])){
                foreach($_POST['producto'] as $producto){
                  $sql2="UPDATE `recursos` SET 'recursos`.`disponibilitat'='no disponible', `recursos`.`hora_agafat`=now(), `recursos`.`reservas`=+ 1, `recursos`.`usuario`=1 WHERE `recursos`.`id_recurs`=$producto";
                  $update = mysqli_query($con,$sql2);
                }
              }
            }
            echo "</table>";
          }
        ?>
        </form>
      </article>
      <!-- ############################################################ -->

      <article id="formulario3">
        <?php
          echo "<h1>Despatxos d'entrevistes</h1>";
          $sql="SELECT * FROM recursos WHERE tipo_recurs=3";
          $datos=mysqli_query($con,$sql);
          echo "<table><tr><th>Producte</th><th>Nom</th><th>Quantitat Reservas</th><th>Reservar?</th></tr>";
          if (mysqli_num_rows($datos)>0){

            while($row=mysqli_fetch_array($datos)){
              echo "<td>$row[id_recurs]</td>";
              echo "<td>".utf8_encode($row['nom_recurs'])."</td>";
              $sql2="SELECT COUNT(recurs_reservat) AS 'quantitatReservas' FROM reservas WHERE recurs_reservat=$row[id_recurs]";
              $datos2=mysqli_query($con,$sql2);
              if(mysqli_num_rows($datos2)>0){
                while($row2=mysqli_fetch_array($datos2)){
                  echo "<td>$row2[quantitatReservas]</td>";
                }
              }
                echo "<td>
                        <form action='reserva_recurs.php?id=$row[id_recurs]' method='POST'>
                          <input type='hidden' name='idUsuario' value='$idUser'>
                        <button>
                          <i class='fa fa-calendar-plus-o' style='color:black;'></i>
                        </button>
                      </form>
                      </td>
                    </tr>";
              if(isset($_POST['producto'])){
                foreach($_POST['producto'] as $producto){
                  $sql2="UPDATE `recursos` SET 'recursos`.`disponibilitat'='no disponible', `recursos`.`hora_agafat`=now(), `recursos`.`reservas`=+ 1, `recursos`.`usuario`=1 WHERE `recursos`.`id_recurs`=$producto";
                  $update = mysqli_query($con,$sql2);
                }
              }
            }
            echo "</table>";
          }
        ?>
        </form>
      </article>
      <!-- ############################################################ -->

      <article id="formulario4">
        <?php
          echo "<h1>Sala d'entrevistes</h1>";
          $sql="SELECT * FROM recursos WHERE tipo_recurs=4";
          $datos=mysqli_query($con,$sql);
          echo "<table><tr><th>Producte</th><th>Nom</th><th>Quantitat Reservas</th><th>Reservar?</th></tr>";
          if (mysqli_num_rows($datos)>0){

            while($row=mysqli_fetch_array($datos)){
              echo "<td>$row[id_recurs]</td>";
              echo "<td>".utf8_encode($row['nom_recurs'])."</td>";
              $sql2="SELECT COUNT(recurs_reservat) AS 'quantitatReservas' FROM reservas WHERE recurs_reservat=$row[id_recurs]";
              $datos2=mysqli_query($con,$sql2);
              if(mysqli_num_rows($datos2)>0){
                while($row2=mysqli_fetch_array($datos2)){
                  echo "<td>$row2[quantitatReservas]</td>";
                }
              }
                echo "<td>
                        <form action='reserva_recurs.php?id=$row[id_recurs]' method='POST'>
                          <input type='hidden' name='idUsuario' value='$idUser'>
                        <button>
                          <i class='fa fa-calendar-plus-o' style='color:black;'></i>
                        </button>
                      </form>
                      </td>
                    </tr>";
              if(isset($_POST['producto'])){
                foreach($_POST['producto'] as $producto){
                  $sql2="UPDATE `recursos` SET 'recursos`.`disponibilitat'='no disponible', `recursos`.`hora_agafat`=now(), `recursos`.`reservas`=+ 1, `recursos`.`usuario`=1 WHERE `recursos`.`id_recurs`=$producto";
                  $update = mysqli_query($con,$sql2);
                }
              }
            }
            echo "</table>";
          }
        ?>
        </form>
      </article>
      <!-- ############################################################ -->

      <article id="formulario5">
        <?php
          echo "<h1>Projector portàtil</h1>";
          $sql="SELECT * FROM recursos WHERE tipo_recurs=5";
          $datos=mysqli_query($con,$sql);
          echo "<table><tr><th>Producte</th><th>Nom</th><th>Quantitat Reservas</th><th>Reservar?</th></tr>";
          if (mysqli_num_rows($datos)>0){

            while($row=mysqli_fetch_array($datos)){
              echo "<td>$row[id_recurs]</td>";
              echo "<td>".utf8_encode($row['nom_recurs'])."</td>";
              $sql2="SELECT COUNT(recurs_reservat) AS 'quantitatReservas' FROM reservas WHERE recurs_reservat=$row[id_recurs]";
              $datos2=mysqli_query($con,$sql2);
              if(mysqli_num_rows($datos2)>0){
                while($row2=mysqli_fetch_array($datos2)){
                  echo "<td>$row2[quantitatReservas]</td>";
                }
              }
                echo "<td>
                        <form action='reserva_recurs.php?id=$row[id_recurs]' method='POST'>
                          <input type='hidden' name='idUsuario' value='$idUser'>
                        <button>
                          <i class='fa fa-calendar-plus-o' style='color:black;'></i>
                        </button>
                      </form>
                      </td>
                    </tr>";
              if(isset($_POST['producto'])){
                foreach($_POST['producto'] as $producto){
                  $sql2="UPDATE `recursos` SET 'recursos`.`disponibilitat'='no disponible', `recursos`.`hora_agafat`=now(), `recursos`.`reservas`=+ 1, `recursos`.`usuario`=1 WHERE `recursos`.`id_recurs`=$producto";
                  $update = mysqli_query($con,$sql2);
                }
              }
            }
            echo "</table>";
          }
        ?>
        </form>
      </article>
      <!-- ############################################################ -->

      <article id="formulario6">
        <?php
          echo "<h1>Carro de portàtils</h1>";
          $sql="SELECT * FROM recursos WHERE tipo_recurs=6";
          $datos=mysqli_query($con,$sql);
          echo "<table><tr><th>Producte</th><th>Nom</th><th>Quantitat Reservas</th><th>Reservar?</th></tr>";
          if (mysqli_num_rows($datos)>0){

            while($row=mysqli_fetch_array($datos)){
              echo "<td>$row[id_recurs]</td>";
              echo "<td>".utf8_encode($row['nom_recurs'])."</td>";
              $sql2="SELECT COUNT(recurs_reservat) AS 'quantitatReservas' FROM reservas WHERE recurs_reservat=$row[id_recurs]";
              $datos2=mysqli_query($con,$sql2);
              if(mysqli_num_rows($datos2)>0){
                while($row2=mysqli_fetch_array($datos2)){
                  echo "<td>$row2[quantitatReservas]</td>";
                }
              }
                echo "<td>
                        <form action='reserva_recurs.php?id=$row[id_recurs]' method='POST'>
                          <input type='hidden' name='idUsuario' value='$idUser'>
                        <button>
                          <i class='fa fa-calendar-plus-o' style='color:black;'></i>
                        </button>
                      </form>
                      </td>
                    </tr>";
              if(isset($_POST['producto'])){
                foreach($_POST['producto'] as $producto){
                  $sql2="UPDATE `recursos` SET 'recursos`.`disponibilitat'='no disponible', `recursos`.`hora_agafat`=now(), `recursos`.`reservas`=+ 1, `recursos`.`usuario`=1 WHERE `recursos`.`id_recurs`=$producto";
                  $update = mysqli_query($con,$sql2);
                }
              }
            }
            echo "</table>";
          }
        ?>
        </form>
      </article>
      <!-- ############################################################ -->

      <article id="formulario7">
        <?php
          echo "<h1>Portàtils</h1>";
          $sql="SELECT * FROM recursos WHERE tipo_recurs=7";
          $datos=mysqli_query($con,$sql);
          echo "<table><tr><th>Producte</th><th>Nom</th><th>Quantitat Reservas</th><th>Reservar?</th></tr>";
          if (mysqli_num_rows($datos)>0){

            while($row=mysqli_fetch_array($datos)){
              echo "<td>$row[id_recurs]</td>";
              echo "<td>".utf8_encode($row['nom_recurs'])."</td>";
              $sql2="SELECT COUNT(recurs_reservat) AS 'quantitatReservas' FROM reservas WHERE recurs_reservat=$row[id_recurs]";
              $datos2=mysqli_query($con,$sql2);
              if(mysqli_num_rows($datos2)>0){
                while($row2=mysqli_fetch_array($datos2)){
                  echo "<td>$row2[quantitatReservas]</td>";
                }
              }
                echo "<td>
                        <form action='reserva_recurs.php?id=$row[id_recurs]' method='POST'>
                          <input type='hidden' name='idUsuario' value='$idUser'>
                        <button>
                          <i class='fa fa-calendar-plus-o' style='color:black;'></i>
                        </button>
                      </form>
                      </td>
                    </tr>";
              if(isset($_POST['producto'])){
                foreach($_POST['producto'] as $producto){
                  $sql2="UPDATE `recursos` SET 'recursos`.`disponibilitat'='no disponible', `recursos`.`hora_agafat`=now(), `recursos`.`reservas`=+ 1, `recursos`.`usuario`=1 WHERE `recursos`.`id_recurs`=$producto";
                  $update = mysqli_query($con,$sql2);
                }
              }
            }
            echo "</table>";
          }
        ?>
        </form>
      </article>
      <!-- ############################################################ -->

      <article id="formulario8">
        <?php
          echo "<h1>Mòbils</h1>";
          $sql="SELECT * FROM recursos WHERE tipo_recurs=8";
          $datos=mysqli_query($con,$sql);
          echo "<table><tr><th>Producte</th><th>Nom</th><th>Quantitat Reservas</th><th>Reservar?</th></tr>";
          if (mysqli_num_rows($datos)>0){

            while($row=mysqli_fetch_array($datos)){
              echo "<td>$row[id_recurs]</td>";
              echo "<td>".utf8_encode($row['nom_recurs'])."</td>";
              $sql2="SELECT COUNT(recurs_reservat) AS 'quantitatReservas' FROM reservas WHERE recurs_reservat=$row[id_recurs]";
              $datos2=mysqli_query($con,$sql2);
              if(mysqli_num_rows($datos2)>0){
                while($row2=mysqli_fetch_array($datos2)){
                  echo "<td>$row2[quantitatReservas]</td>";
                }
              }
                echo "<td>
                        <form action='reserva_recurs.php?id=$row[id_recurs]' method='POST'>
                          <input type='hidden' name='idUsuario' value='$idUser'>
                        <button>
                          <i class='fa fa-calendar-plus-o' style='color:black;'></i>
                        </button>
                      </form>
                      </td>
                    </tr>";
              if(isset($_POST['producto'])){
                foreach($_POST['producto'] as $producto){
                  $sql2="UPDATE `recursos` SET 'recursos`.`disponibilitat'='no disponible', `recursos`.`hora_agafat`=now(), `recursos`.`reservas`=+ 1, `recursos`.`usuario`=1 WHERE `recursos`.`id_recurs`=$producto";
                  $update = mysqli_query($con,$sql2);
                }
              }
            }
            echo "</table>";
          }
        ?>
        </form>
      </article>
      <!-- ############################################################ -->
      <article id="formulario9">
          <form action="index.php" method="POST">
        <?php
          $sql="SELECT * FROM reservas WHERE usuari_reserva=$_REQUEST[id]";
          $datos=mysqli_query($con,$sql);
          if (mysqli_num_rows($datos)>0){
            echo "<h1>Els Meus Recursos</h1>";
            echo "<table><tr><th>Reserva</th><th>Recurs</th><th>Dia</th><th>Horas</th></tr>";
            while($row=mysqli_fetch_array($datos)){
              echo "<td>$row[id_reserva]</td>";
              $sql2="SELECT * FROM recursos WHERE id_recurs=$row[recurs_reservat]";
              $datos2=mysqli_query($con,$sql2);
              if(mysqli_num_rows($datos2)>0){
                while($row2=mysqli_fetch_array($datos2)){
                  echo "<td>$row2[nom_recurs]</td>";
                }
              }
              echo "<td>$row[dia]</td>";
              echo "<td>$row[franja_horaria]</td></tr>";
            }
            echo "</table>";
          }else{
            echo "<h1 style='margin-right:400px;font-size:30px'>No tens recursos</h1>";
            echo "<table style='border: none;'></table>";
          }
        ?>
        </form>
      </article>