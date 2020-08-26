 
<?php 
include('header.php');
?>
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Listado</span>
                <h3 class="page-title">Listado de prestamos por cartera</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4" >                

                  <div class="card-header border-bottom">   
                  <?php 
                          require('../conex/conexion.php');
                          $query="SELECT * FROM cartera group by cedula";
                          $answer = $conexion -> query($query);
                         
                          while ($row=$answer->fetch_assoc()){
                          ?> 
                         <?php   $id =  $row['id']; ?>
                          <div class="row">
              <div class="col"> 
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">  
                    <h6 class="m-0">   <input class="form-control col-md-3 light-table-filter" data-table="order-table" type="text" placeholder="Buscar..">
                    Cartera de :  <?php echo $row['nombre']; ?>  Cédula: id: <?php echo $row['cedula']; ?>  </h6> 
                    <h6 class="m-0" style="float: right;" >Monto por cobrar :  <?php  $query3="SELECT sum(c.valorPagar) as moneysum FROM cuenta as c  join cliente as cl  on c.id_cliente = cl.id where id_prestamista =  $id ";
                          $answer3 = $conexion -> query($query3);   while ($row3=$answer3->fetch_assoc()){
                            ?>  $ <?php echo $row3['moneysum'] ; ?> </h6>
                            <?php 
                          }

                      ?>

                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0 order-table">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0">Nombre</th>
                          <th scope="col" class="border-0">Apellido</th>
                          <th scope="col" class="border-0">Prestado</th>
                          <th scope="col" class="border-0">Pagar</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                     
                      $query2="SELECT  id_prestamista as prestamista, c.id_cliente as idcliente, c.id as ident, cl.nombre as name, cl.apellido as lastname,sum(c.valorPagar) as money,cl.telefono as phone, cl.correo as mail  FROM cuenta as c  join cliente as cl  on c.id_cliente = cl.id where id_prestamista = $id group by c.id_cliente";
                          $answer2 = $conexion -> query($query2);
                         
                          while ($row2=$answer2->fetch_assoc()){
                          ?>
                          <?php
                          if ( $row2['money'] == 0 )
                          {

                          }else 
                          {?>
                            <tr>
                            <th scope="col" class="border-0"> <?php echo $row2['ident']; ?></th>
                            <th scope="col" class="border-0"><?php echo $row2['name']; ?></th>
                             <th scope="col" class="border-0"><?php echo $row2['lastname']; ?></th>
                             <th scope="col" class="border-0">$ <?php echo $row2['money']; ?></th>
                           
                             <td> <a class="btn btn-sm btn-success mr-1" href="modpago.php?id=<?php echo $row2 ['idcliente'];?>&prest=<?php echo $row2['prestamista'];?>">Pagar </a></td>
 
                             </tr>
                             <?php
                          }
                         
                          ?>
                       
                            <?php 
                          }
                         
                      
                      ?>
                     
                        
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
                          <?php 
                          }
                          ?>


                    
                  </div>
            
                </div>
              </div>
            </div>
         
          </div>
          <?php
         include('footer.php');
         ?>