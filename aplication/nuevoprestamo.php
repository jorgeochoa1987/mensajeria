<!doctype html>
<html class="no-js h-100" lang="en">
<?php 
include('header.php');
?>
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Agregar</span>
                <h3 class="page-title">Nuevo prestamo</h3>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-2">
                <div class="card card-small mb-4 pt-3">
                  <div class="card-header border-bottom text-center">
                    <div class="mb-3 mx-auto">
                      </div>
                    <h5 class="mb-0" id="nombre">Nombre cliente</h5>
                    <select class="form-control"  data-style="form-control" id="fecliente" data-live-search="true" title="-- Seleccione Cliente --">
                    <?php 
                          require('../conex/conexion.php');
                          $query="SELECT * FROM cliente where estado != 1 ";
                          $answer = $conexion -> query($query);
                          while ($row=$answer->fetch_assoc()){
                          ?>
                           <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?>  <?php echo $row['apellido']; ?></option>
                        
                          <?php 
                          }
                          ?>
                    
                   
                    </select>
                    <span class="text-muted d-block mb-2"></span>
                    
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item px-4">
                      <div class="progress-wrapper">
                        <strong class="text-muted d-block mb-2"></strong>
                       
                      </div>
                    </li>
                   
                  </ul>
                </div>
              </div>
              <div class="col-lg-7">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Información básica</h6>       <div class="form-group col-md-6">
                                <label for="feFirstName">Fecha de prestamo</label>
                                <input type="date" class="form-control" id="dateprestamo" > </div>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                  
                         
                            <div class="form-row">
                              <div class="form-group col-md-4">
                                <label for="feValue">Valor</label>
                                <input type="number" class=" form-control" onkeyup="copiar()" id="feValue" placeholder="Valor" value="0"> </div>
                                <div class="form-group col-md-2">
                                <label for="mesepago">Meses de pago</label>
                                  <select id="mesespago" class="form-control" onchange="copiar()" >
                                    <option selected="" >0...</option>
                                    <option Value="1">1</option>
                                    <option Value="2">2</option>
                                    <option Value="3">3</option>
                                    <option Value="4">4</option>
                                    <option Value="5">5</option>
                                    <option Value="6">6</option>
                                    <option Value="7">7</option>
                                    <option Value="8">8</option>
                                    <option Value="9">9</option>
                                    <option Value="10">10</option>
                                    <option Value="11">11</option>
                                    <option Value="12">12</option>
                                  </select> </div>
                              <div class="form-group col-md-2">
                                <label for="feInteres">Interes</label>
                                <input type="text" class=" form-control" onkeyup="copiar()"  id="feInteres" placeholder="Interes" value="0"> </div>
                                
                                <div class="form-group col-md-4">
        
                                <label for="feInteres">Valor a pagar</label>
                                <input type="text" class="amount  form-control" id="fevalorapagarVer"  placeholder="" value="">
                                <input type="text" class="form-control" id="fevalorapagar"  placeholder="" value="" hidden> </div>
                                
                                </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                              <label for="feInputState">Cartera</label>
                              <select id="" class="form-control" onchange="showUser(this.value)">
                                  <option  id="fecartera"  selected>Seleccionar</option>
                                  <?php 
                                      require('../conex/conexion.php');
                                      $query="SELECT * FROM cartera where saldo != 0 ";
                                      $answer = $conexion -> query($query);
                                      while ($row=$answer->fetch_assoc()){
                                      ?>
                                      <option value ="<?php echo $row['id']; ?>"> <?php echo $row['nombre']; ?>   <?php echo $row['Apellido']; ?></option>
                                      
                                    <?php 
                                      }
                                      ?></select> 
                                      </div>  
                                <div class="form-group col-md-6">
                                <label for="feFirstName">Fecha de primera visita </label>
                                <input type="date" class="form-control" id="feDate" placeholder="" > </div>
                            </div> 
                          
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="feDescription">Notas</label>
                                <textarea class="form-control" name="feDescription" id="feDescription" rows="5"></textarea>
                              </div>
                            </div>
                            <button type="submit" id="crearPrestamo" class="btn btn-accent">Crear</button>
                     
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class='card card-small col-lg-3'>
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Días de cobro</h6>
                  </div>
                  <div class='card-body p-0'>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item px-3 pb-2">
                        <div class="custom-control custom-checkbox mb-1">
                          <input type="checkbox" class="custom-control-input" id="category1" checked  onclick="valcheck(this.id)" value="1">
                          <label class="custom-control-label" for="category1">Lunes</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-1">
                          <input type="checkbox" class="custom-control-input" id="category2" onclick="valcheck(this.id)" value="0"  >
                          <label class="custom-control-label" for="category2">Martes</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-1">
                          <input type="checkbox" class="custom-control-input" id="category3" onclick="valcheck(this.id)" value="0" >
                          <label class="custom-control-label" for="category3">Miercoles</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-1">
                          <input type="checkbox" class="custom-control-input" id="category4" onclick="valcheck(this.id)" value="0" >
                          <label class="custom-control-label" for="category4">Jueves</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-1">
                          <input type="checkbox" class="custom-control-input" id="category5" onclick="valcheck(this.id)" value="0" >
                          <label class="custom-control-label" for="category5">Viernes</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-1">
                          <input type="checkbox" class="custom-control-input" id="category6" onclick="valcheck(this.id)" value="0" >
                          <label class="custom-control-label" for="category6">Sabado</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-1">
                          <input type="checkbox" class="custom-control-input" id="category7" onclick="valcheck(this.id)" value="0">
                          <label class="custom-control-label" for="category7">Domingo</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-1">
                          <input type="checkbox" class="custom-control-input" onclick="valcheck(this.id)"  id="category8" value="0">
                          <label class="custom-control-label" for="category8">Quincenal</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-1">
                          <input type="checkbox" class="custom-control-input" onclick="valcheck(this.id)"   id="category9" value="0">
                          <label class="custom-control-label" for="category9"  >Mensual</label>
                        </div>
                      </li>
                      <li class="list-group-item d-flex px-3">
                      
                      </li>
                    </ul>
                  </div>
                </div>
            </div>
            <!-- End Page Header -->
           
          </div>
         
          <div id="cliente" class="modal fade" role="dialog">
            <div class="modal-dialog">
           <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Seleccionar cliente</h4>
              </div>
              <div class="modal-body">
                   
              <div class="row">
              <div class="col">
                <div class="">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Clientes Activos</h6>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                        <th scope="col" class="border-0">Favorito</th>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0">Nombre</th>
                          <th scope="col" class="border-0">Apellido</th>
                          <th scope="col" class="border-0">Teléfono</th>
                     
                        </tr>
                      </thead>
                      <tbody>
                        
                      <?php 
                          require('../conex/conexion.php');
                          $query="SELECT * FROM cliente where estado != 1 ";
                          $answer = $conexion -> query($query);
                          while ($row=$answer->fetch_assoc()){
                          ?>
                          <tr>
                              <td> <?php echo $row['favorito']; ?></td>
                              <td> <?php echo $row['id']; ?></td>
                              <td> <?php echo $row['nombre']; ?></td>
                              <td> <?php echo $row['apellido']; ?></td>
                              <td> <?php echo $row['telefono']; ?></td>
                             
                          </tr>
                          <?php 
                          }
                          ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              </div>
            </div>

          </div>
        </div>
        <script>
        function showUser(str) {
  if (str=="") {
    document.getElementById("fecartera").innerHTML="";
    return;
  }
  else
  {
    document.getElementById("fecartera").innerHTML=str;

  }
  //alert('Acción realizada '+ str);
}  
        </script>
          <?php
         include('footer.php');
         ?>