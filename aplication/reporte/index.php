
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<br/><br/><br/>
<div id="dvData" class="container">
  <table class="table table-bordered">
      <tr>
          <th>Cartera</th>
          <th>Cliente</th>
          <th>Apellido</th>
          <th>Valor </th>
          <th>Fecha </th>
      </tr>
      <?php 
                          require('../../conex/conexion.php');
                          $fechaini =date("Y-m-d");
                          $fecha = $fechaini. " 01:48:10";
                          $fechafin =  $fechaini." 23:48:10";
                          $query="SELECT cat.nombre as cartera, cl.id as id,cl.nombre as nombre, cl.apellido as apellido,cl.cedula as cel,cl.telefono as tel, ct.prestamo as prestamo, ct.fechaVisita1 as fecha1,ct.cuotas as cuota, ct.fechaFin as fechafin, ct.valorPagar as valorpagar, pg.valor as value, pg.fechaPago as fechapaigo
                          FROM cliente as cl 
                          left join cuenta as ct
                          on cl.id = ct.id_cliente
                          join pago as pg
                          on cl.id = pg.id_cliente
                          join cartera as cat 
                          on ct.id_prestamista =cat.id  
                          where pg.fechaPago >='$fecha' and  pg.fechaPago  < '$fechafin' order by cartera";
                          $answer = $conexion -> query($query);
                          while ($row=$answer->fetch_assoc()){
                          ?>
                          <tr>
                              <td> <?php echo $row['cartera']; ?></td>
                              <td> <?php echo $row['nombre']; ?></td>
                              <td> <?php echo $row['apellido']; ?></td>
                              <td> <?php echo $row['value']; ?></td>
                               <td> <?php echo $row['fechapaigo']; ?></td>
                             
                        

                               </tr>
                        

                          <?php 
                          }
                          ?>

    
      <tr>
          <th>Gastos</th>
          <th>Valor</th>
          <th>Fecha </th>
      </tr>
      <?php 
                          require('../../conex/conexion.php');
                          $fechaini =date("Y-m-d");
                          $fecha = $fechaini. " 01:48:10";
                          $fechafin =  $fechaini." 23:48:10";
                          $query="SELECT * FROM `gasto`  where fecha >='$fecha' and  fecha  < '$fechafin'";
                          $answer = $conexion -> query($query);
                          while ($row=$answer->fetch_assoc()){
                          ?>
                          <tr>
                              <td> <?php echo $row['descripcion']; ?></td>
                              <td> <?php echo $row['valor']; ?></td>
                              <td> <?php echo $row['fecha']; ?></td>
                             

                               </tr>
                        

                          <?php 
                          }
                          ?> <?php 
                          require('../../conex/conexion.php');
                          $fechaini =date("Y-m-d");
                          $fecha = $fechaini. " 01:48:10";
                          $fechafin =  $fechaini." 23:48:10";
                          $query="SELECT Sum(valor) as valor FROM `gasto`  where fecha >='$fecha' and  fecha  < '$fechafin'";
                          $answer = $conexion -> query($query);
                          while ($row=$answer->fetch_assoc()){
                          ?>
                          <tr>
                              <td> Total Gastado : $  <?php echo $row['valor']; ?></td>
                             

                               </tr>
                        

                          <?php 
                          }
                          ?>


<tr> </tr><tr>  </tr>

<?php 
                          require('../../conex/conexion.php');
                          $fechaini =date("Y-m-d");
                          $fecha = $fechaini. " 01:48:10";
                          $fechafin =  $fechaini." 23:48:10";
                          $query="SELECT cat.nombre as cartera, cl.id as id,cl.nombre as nombre, cl.apellido as apellido,cl.cedula as cel,cl.telefono as tel, ct.prestamo as prestamo, ct.fechaVisita1 as fecha1,ct.cuotas as cuota, ct.fechaFin as fechafin, ct.valorPagar as valorpagar, sum( pg.valor) as value, pg.fechaPago as fechapaigo
                          FROM cliente as cl 
                          left join cuenta as ct
                          on cl.id = ct.id_cliente
                          join pago as pg
                          on cl.id = pg.id_cliente
                          join cartera as cat 
                          on ct.id_prestamista =cat.id   where pg.fechaPago >='$fecha' and  pg.fechaPago  < '$fechafin' order by cartera";
                          $answer = $conexion -> query($query);
                          while ($row=$answer->fetch_assoc()){
                          ?>
                          <tr>
                         
                              <td>Total Recuperado : $  <?php echo $row['value']; ?></td>
                             
            

                               </tr>
                        

                          <?php 
                          }
                          ?>
  </table>
  <br/>
  <input type="button" id="btnExport" class="btn btn-default btn-lg pull-right" value=" Exportar reporte Hoy " />
</div>

<!--
  PHP SCRIPT
  ----------
  function to_excel($array, $filename) {
    header('Content-type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename='.$filename.'.xls');

    $h = array();
      foreach($array->result_array() as $row){
        foreach($row as $key=>$val){
        if(!in_array($key, $h)){
          $h[] = $key;   
        }
      }
    }
    //echo the entire table headers
    echo '<table>';

    echo '<tr>';
    foreach($h as $key) {
      $key = ucwords($key);
      echo '<th>'.$key.'</th>';
    }
    echo '</tr>';

    foreach($array->result_array() as $row){
      echo '<tr>';
      foreach($row as $val) echo '<td>'.utf8_decode($val).'</td>';  
      echo '</tr>';
    }
    echo '</table>';
  }
-->
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script><script  src="./script.js"></script>

</body>
</html>
