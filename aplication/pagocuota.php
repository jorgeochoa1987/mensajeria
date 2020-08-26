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
  <div class="main-content-container container-fluid px-4" style="
    padding-top: 6% !important;
    background: #00000033;

">
  <div class="card card-small mb-12 pt-3">
                  <div class="card-header border-bottom text-center" style="border-radius: 14px;">
                    <div class="mb-3 mx-auto">
                    <?php 
                          require('../conex/conexion.php');
                          $id = $_GET['idcl'];
                          $query6="SELECT * from cliente where id =  $id";
                          $answer6 = $conexion -> query($query6);
                          while ($row6=$answer6->fetch_assoc()){
                          ?>
                    <h4 class="mb-0">¿ Desea pagar la cuota de : <?php echo $row6['nombre'] ?> ?</h4>
                 
                    <?php 
                          }
                          ?>    <!-- Si es día  cobro  4  veces  al mes -->
                         

                    <span class="text-muted d-block mb-2"><a href="modpago.php?id=<?php $id = $_GET['idcl'];echo $id;?>">Volver a la lista de prestamo </a></span>
                  </div>
                  <ul class="list-group list-group-flush">
                  <div class="form-group col-md-12">
                  <?php 
                          require('../conex/conexion.php');
                          $id = $_GET['id'];
                          $query="SELECT ct.id_prestamista as prestamista, ct.id_cliente as cliente, ct.meses as Cantidadmes, ct.valorPagar as valor, d.lunes as lunes, d.martes as martes, d.miercoles as miercoles, d.jueves as jueves, d.viernes as viernes, d.sabado as sabado, d.domingo as domingo,  d.quincenal as quince, d.mensual as mes FROM cuenta as ct join dias as d on ct.id = d.id_cuenta where ct.id = $id";
                          $answer = $conexion -> query($query);
                          while ($row=$answer->fetch_assoc()){
                          ?>
                                                    <input type="text" class="form-control"  id="idcartera" value="<?php echo $row['prestamista'] ?>" hidden>
                                                    <input type="text" class="form-control"  id="fecliente"  value="<?php echo $row['cliente'] ?>" hidden>
                                                    <input type="text" class="form-control" id="fecuenta" value="<?php $id = $_GET['id'];echo $id;?>" hidden>

                          <!-- Si es mes cobro  una vez a mes -->
                        <?php  if( $row['mes']  == 1)
                          {
                            $valor = $row['valor'];
                            $cantidad = 1;
                            $meses = $row['mes'];
                            $total = round( $valor / $meses, 2);
                             echo  "<label for=\"feValue\">Valor a pagar </label> <input type=\"text\" class=\" form-control\" onkeyup=\"copiar()\" id=\"feValue\" placeholder=\"Valor\" value=\" $total\"> </div>";

                          }?>
                         <!-- Si es quince cobro  2  veces  al mes -->
                         <?php  if( $row['quince']  == 1)
                          {
                            $valor = $row['valor'];
                            $cantidad = 2;
                            $meses =  $row['Cantidadmes']; 
                            $total = round(($valor/ $meses)/$cantidad,2);
                            echo  "<label for=\"feValue\">Valor a pagar </label> 
                            <div class=\"input-group mb-3\">
                          <div class=\"input-group-prepend\">
                            <span class=\"input-group-text\">$</span>
                          </div>
                          <input type=\"text\" class=\"form-control\" aria-label=\"Amount (to the nearest dollar)\"  id=\"feValue\"  value=\"$total\">
                         
                        </div>
                     </div>";

                          }?>
                         <!-- Si es día  cobro  4  veces  al mes -->
                         <?php  
                         if( $row['lunes']  == 1 or $row['martes']  == 1 or $row['miercoles']  == 1 or $row['jueves']  == 1 or $row['viernes']  == 1 or $row['sabado']  == 1 or $row['domingo']  == 1)
                          {

                            $semana = $row['lunes']  +  $row['martes']  + $row['miercoles']  + $row['jueves'] + $row['viernes']  + $row['sabado']  + $row['domingo'] ;
                            if ($semana == 7)
                            {
                              $valor = $row['valor'];
                              $cantidad = 30;
                              $meses =  $row['Cantidadmes']; 
                              $total = round(($valor/ $meses)/$cantidad,2);
                              echo  "<label for=\"feValue\">Valor a pagar </label> <input type=\"text\" class=\" form-control\" onkeyup=\"copiar()\" id=\"feValue\" placeholder=\"Valor\" value=\" $total\"> </div>";
                            }
                            else
                            {
                              $valor = $row['valor'];
                              $cantidad = $semana  * 4;
                              $meses =  $row['Cantidadmes']; 
                              $total = round(($valor/ $meses)/$cantidad,2);
                              echo  "<label for=\"feValue\">Valor a pagar </label> <input type=\"text\" class=\" form-control\" onkeyup=\"copiar()\" id=\"feValue\" placeholder=\"Valor\" value=\" $total\"> </div>";
                        
                            }

                    
                          }?>
                
                   
                     <div class="form-group col-md-12 "style="/* align-items: center; */display: flex;">      
                     <button type="submit"  class="col-md-6 btn btn-sm btn-danger mr-1">
                     <a style="color: white;" href="modpago.php?id=<?php $id = $_GET['idcl'];echo $id;?>">Cancelar </a>
                     
                     </button>
 
                    <button type="submit" id="PagarCuota" class="col-md-6 btn btn-accent">Pagar</button></div>
                        

                          <?php 
                          }
                          ?>
                        
                        
                   

                    </div>
                  </div>
                  </ul>
                </div>
    </div>

    </div>   
          <?php
         include('footer.php');
         ?>