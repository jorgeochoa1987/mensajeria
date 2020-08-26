 
<?php 
include('header.php');
?>
<link rel='stylesheet' href='https://cdn.datatables.net/v/bs/jq-2.2.4/dt-1.10.15/r-2.1.1/datatables.min.css'><link rel="stylesheet" href="./style.css">
<style>
  .dt-button
{
  background: #007bff;
    color: white;
    padding: 5px 13px 5px 10px;
    border-radius: 4px;
    margin-left:6px;
}
</style>  
          <!-- / .main-navbar -->
  <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Reportes</span>
                <h3 class="page-title">por cartera</h3>
              </div>
            </div>


            <!-- partial:index.partial.html -->
<div class="col-sm-12 col-sm-offset-2">
 

<div class="clearfix"></div>
<div class="hidden">
<table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
    <thead>
        <tr>
        <th>Id</th>
            <th>Nombre cartera</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>cédula</th>
            <th>teléfono</th>
            <th>prestamo</th>
            <th>fecha</th>
            <th>cuota</th>
            <th>Fecha fin</th>
            <th>Valor a pagar</th>
            <th>Valor</th>
            <th>Fecha pago</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
             <th>Id</th>
            <th>Nombre cartera</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>cédula</th>
            <th>teléfono</th>
            <th>prestamo</th>
            <th>fecha</th>
            <th>cuota</th>
            <th>Fecha fin</th>
            <th>Valor a pagar</th>
            <th>Valor</th>
            <th>Fecha pago</th>

        </tr>
    </tfoot>
    <tbody>
        <?php 
                          require('../conex/conexion.php');
                          $query="SELECT cl.id as id, cart.nombre as nombrecartera,cl.nombre as nombre, cl.apellido as apellido,cl.cedula as cedula,cl.telefono as telefono, ct.prestamo as prestamo, ct.fechaVisita1 as fecha,ct.cuotas as cuota, ct.fechaFin as fechafin, ct.valorPagar as valorpagar, pg.valor as value, pg.fechaPago as fechapaigo
                          FROM cliente as cl 
                          join cuenta as ct
                          on cl.id = ct.id_cliente
                          join pago as pg
                          on cl.id = pg.id_cliente
                          join cartera as cart
                          on pg.id_cartera = cart.id";
                          $answer = $conexion -> query($query);
                          while ($row=$answer->fetch_assoc()){
                          ?>
                          <tr>
                              <td> <?php echo $row['id']; ?></td>
                              <td> <?php echo $row['nombrecartera']; ?></td>
                              <td> <?php echo $row['nombre']; ?></td>
                              <td> <?php echo $row['apellido']; ?></td>
                              <td> <?php echo $row['cedula']; ?></td>
                              <td> <?php echo $row['telefono']; ?></td>
                              <td> <?php echo $row['prestamo']; ?></td>
                              <td> <?php echo $row['fecha']; ?></td>
                              <td> <?php echo $row['cuota']; ?></td>
                              <td> <?php echo $row['fechafin']; ?></td>
                              <td> <?php echo $row['valorpagar']; ?></td>
                              <td> <?php echo $row['value']; ?></td>
                               <td> <?php echo $row['fechapaigo']; ?></td>

                               </tr>
                        

                          <?php 
                          }
                          ?>

       
    </tbody>
    
    
</table>
  </div>
        
  </div>
<!-- partial -->


          <?php
         include('footer.php');
         ?>