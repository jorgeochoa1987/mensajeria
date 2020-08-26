<!doctype html>
<html class="no-js h-100" lang="en">
<?php 
include('header.php');
?>
<style>
  #display_area {
  width: 90%;
  padding-top: 15px;
  margin: 10px auto;
}


.alert {
  padding: 15px;
  margin-bottom: 20px;
  border: 1px solid #eed3d7;
  border-radius: 4px;
  position: absolute;
  bottom: 0px;
  right: 21px;
  /* Each alert has its own width */
  float: right;
  clear: right;
  background-color: white;
}

.alert-red {
  color: white;
  background-color: #DA4453;
}
.alert-green {
  color: white;
  background-color: #37BC9B;
}
.alert-blue {
  color: white;
  background-color: #4A89DC;
}
.alert-yellow {
  color: white;
  background-color: #F6BB42;
}
.alert-orange {
  color:white;
  background-color: #E9573F;
}
  </style>
  <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Edición </span>
                <h3 class="page-title">Cliente  <?php   $id = $_GET['id']; echo $id; ?></h3>


               </div>
            </div>
         
            <div class="row">
              <div class="col-lg-5">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Información</h6>
                    <div class="custom-control custom-checkbox mb-1">
                              <input type="checkbox" class="custom-control-input" id="formsCheckboxDefault">
                              <label class="custom-control-label" for="formsCheckboxDefault">Favorito</label>
                            </div>
                    <div id="Respuesta"></div>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                    
                            <div class="form-row">
                            <?php 
                          require('../conex/conexion.php');
                          $id = $_GET['id']; 
                          $query1="SELECT * FROM cliente  where id = $id ";
                          $answer1 = $conexion -> query($query1);
                          while ($row2=$answer1->fetch_assoc()){
                          ?>
                          <div class="form-group col-md-12">
                          <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feFirstName">Nombre</label>
                                
                                <input type="text" class="form-control" id="feFirstName" placeholder="Ingrese nombre" value="<?php echo $row2['nombre'] ; ?>"> </div>
                              <div class="form-group col-md-6">
                                <label for="feLastName">Apellido</label>
                                <input type="text" class="form-control" id="feLastName" placeholder="Ingrese apellido" value="<?php echo $row2['apellido'] ; ?>"> </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feEmailAddress">Correo</label>
                                <input type="email" class="form-control" id="feEmailAddress" placeholder="Correo@correo.com" value="<?php echo $row2['correo'] ; ?>"> </div>
                              <div class="form-group col-md-6">
                              <label for="feInputAddress">Teléfono</label>
                              <input type="text" class="form-control" id="fephone" placeholder="Ingrese teléfono" value="<?php echo $row2['telefono'] ; ?>"> </div>
                            </div>
                            <div class="form-group">
                              <label for="feInputAddress">Dirección</label>
                              <input type="text" class="form-control" id="feInputAddress" placeholder="Ingrese dirección" value="<?php echo $row2['direccion'] ; ?>"> </div>
                            <div class="form-row">
                              
                              <div class="form-group col-md-6">
                                <label for="feInputCity">Ciudad</label>
                                <input type="text" class="form-control" id="feInputCity" placeholder="Ingrese Ciudad" value="<?php echo $row2['ciudad'] ; ?>" > </div>
                                <div class="form-group col-md-6">
                                <label for="feInputCity">Cédula</label>
                                <input type="text" class="form-control" id="fenumber" placeholder="Ingrese cédula"  value=" <?php echo $row2['cedula'] ; ?>"> </div>
                             </div>
                        
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="feDescription">Notas adicionales</label>
                                <textarea class="form-control" name="fenotes" id="fenotes" rows="5" value ="<?php echo $row2['notas'] ; ?>" ></textarea>
                              </div>
                            </div>
                            <input type="text" class="form-control" id="feid" hidden value="<?php echo $row2['id'] ; ?>">

                            <button type="submit" id="ActualizarCliente" class="btn btn-accent">Actualizar Cliente</button>
                            </div>

                       
                          <?php 
                          }
                          ?>
                             
                    
                     
                          
                        </div>
                        
                      </div>
                      
                    </li>
                  </ul>
                  
                </div>
                
              </div>
              <div class='card card-small col-lg-7'>
              <div class="card-header border-bottom">
                    <h6 class="m-0">Saldos pagados</h6></div>
                    <div class="card-body p-0 pb-3 bg-white text-center">
                    <table class="table table-white mb-0">
                      <thead class="thead-white">
                        <tr>
                        <th scope="col" class="border-0"># Cuenta</th>
                           <th scope="col" class="border-0">Valor</th>
                          <th scope="col" class="border-0">Cartera</th>
                          <th scope="col" class="border-0">Prestamo</th>
                          <th scope="col" class="border-0">Saldo Actual</th>

                          <th scope="col" class="border-0">Ultimo pago</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                          require('../conex/conexion.php');
                          $id = $_GET['id']; 
                          $prest = $_GET['prest'];
                          $query="SELECT cuenta.id as idcu, cuenta.prestamo as prestamo,cuenta.valorPagar as valorPagar, pg.id as id, pg.valor as valor, pg.id_cartera as cartera, pg.fechaPago as fechaPago, cr.nombre as ncartera FROM pago as pg join cartera as cr on pg.id_cartera = cr.id
                          join cuenta as cuenta 
                          on pg.id_cuenta = cuenta.id
                          where pg.id_cliente = $id  and cuenta.id_prestamista = $prest
                          ";
                          $answer = $conexion -> query($query);
                          while ($row=$answer->fetch_assoc()){
                          ?>
                          <tr>
                              <td> <?php echo $row['idcu']; ?></td>
                              <td>$ <?php echo $row['valor']; ?></td>
                              <td> <?php echo $row['ncartera']; ?></td>
                              <td>$ <?php echo $row['valorPagar']; ?></td>
                              <td>$ <?php 
                              $idcuenta =$row['idcu'];
                               require('../conex/conexion.php');
                               
                               $queryn="SELECT sum(valor) as valordepago from pago where  id_cuenta  =  $idcuenta";
                               $answern = $conexion -> query($queryn);
                               while ($rown=$answern->fetch_assoc()){
                             
                               
                               
                                       echo  $row['valorPagar'] - $rown['valordepago']  ;
                              
                            }
                            ?>
                              
                              </td>
                              <td> <?php echo $row['fechaPago']; ?></td>
                              </tr>
                          <?php 
                          }
                          ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Cuentas pendientes</h6></div>
                    <div class="card-body p-0 pb-3 bg-white text-center">
                    <table class="table table-white mb-0">
                      <thead class="thead-white">
                        <tr>
                        <th scope="col" class="border-0">#</th>
                           <th scope="col" class="border-0">Valor</th>
                          <th scope="col" class="border-0">interes</th>
                          <th scope="col" class="border-0">Cartera</th>
                          <th scope="col" class="border-0">Tipo de cobro</th>
                          <th scope="col" class="border-0">Coutas</th>
                          <th scope="col" class="border-0">Pago</th>

                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                          require('../conex/conexion.php');
                          $id = $_GET['id']; 
                          $prest = $_GET['prest'];
                          $query="SELECT  ct.cuotas as numcoutas, ct.id as id, ct.valorPagar as prestamo, ct.interes as interes, cr.nombre as nombre FROM cuenta as ct join cartera as cr on ct.id_prestamista = cr.id  where id_cliente = $id and ct.id_prestamista = $prest ";
                          $answer = $conexion -> query($query);
                          while ($row=$answer->fetch_assoc()){
                          ?>
                          <tr>
                              <td><input id="id" value="<?php echo $row['id']; ?>" hidden> <?php echo $row['id']; ?> </td>
                              <td><input id="prestamo" value="<?php echo $row['prestamo']; ?>" hidden>$  <?php echo $row['prestamo']; ?></td>
                              <td id="interes"> <?php echo $row['interes']; ?> %</td>
                              <td id="nombre"> <?php echo $row['nombre']; ?></td>
                              <td>
                              <?php 
                            $tcobro = $row['id']; 
                            $query_c ="SELECT * FROM dias where id_cuenta = $tcobro";
                            $answer4 = $conexion -> query($query_c);
                            while($row4 = $answer4 -> fetch_assoc())
                            {
                              if ($row4['lunes']==1)
                              {
                                echo $row4['lunes'];
                              }
                              if ($row4['martes']==1)
                              {
                                echo 'Martes, ';
                              }
                              if ($row4['miercoles']==1)
                              {
                                echo 'Miercoles, ';
                              }
                              if ($row4['jueves']==1)
                              {
                                echo 'Jueves, ';
                              }
                              if ($row4['viernes']==1)
                              {
                                echo 'Viernes, ';
                              }
                              if ($row4['sabado']==1)
                              {
                                echo 'Sabado, ';
                              }
                              if ($row4['domingo']==1)
                              {
                                echo 'Domingo, ';
                              }
                              if ($row4['mensual']==1)
                              {
                                echo 'Mensual';
                              }
                              if ($row4['quincenal']==1)
                              {
                                echo 'Quincenal';
                              }
                            }
                             ?> 
                              </td>
                              <th scope="col" class="border-0"><?php echo $row['numcoutas']; ?></th>
                              <td> <a class="btn btn-sm btn-success mr-1" href="pagocuota.php?id=<?php echo $row['id']; ?>&idcl=<?php $id = $_GET['id']; echo $id; ?>"  >Pagar </a></td>

 
                              </tr>
                          <?php 
                          }
                          ?>
                      </tbody>
                    </table>
                  </div>
              
              </div>
            
            <!-- End Page Header -->
           
          </div>
          
          <?php
         include('footer.php');
         ?>