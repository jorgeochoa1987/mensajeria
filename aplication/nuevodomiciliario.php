<!doctype html>
<html class="no-js h-100" lang="en">
<?php 
include('header.php');
?>
          <!-- / .main-navbar -->
          <div class="page-header row no-gutters py-4" style=" justify-content: center;justify-content: center;background: #e6e6e6;">

              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle"></span>
                <h3 class="page-title"><button id="nuevo"class="btn btn-accent">Agregar Nuevo Domiciliario </button></h3>
              </div>
          </div>
          <div class="main-content-container container-fluid px-4" id="toggle_dom" style="display:none;">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle"></span>
                <h3 class="page-title"></h3>
              </div>
            </div>
            <div>
            <form enctype="multipart/form-data" id="fupForm" >           

            <div class="row" >
              <div class="col-lg-2">
                <div class="card card-small mb-4 pt-3">
                  <div class="card-header border-bottom text-center">
                    <div class="mb-3 mx-auto">
                      <img   id="imgSalida" class="rounded-circle" src="../images/child.png" alt="Ingrese foto" width="110"> </div>
                      <input type="text" class="form-control" hidden  id="idimage" placeholder="Ingrese nombre" > 

                    <h4 class="mb-0"></h4>


                    
                    <span class="text-muted d-block mb-2"></span>
                  
                      <input  class="mb-2 btn btn-sm btn-pill btn-outline-primary mr-2"  style="width: 100%;" name="file" id="file" type="file" />

                  </div> 
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item px-4">
                      <div class="progress-wrapper">
                        <strong class="text-muted d-block mb-2"></strong>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="74" aria-valuemin="0" aria-valuemax="100" style="width: 74%;">
                          </div>
                        </div>
                      </div>
                    </li>
                   
                  </ul>
                </div>
              </div>
              <div class="col-lg-9">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Información básica</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                          
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feFirstName">Nombre</label>
                                <input type="text" class="form-control" hidden   name="save" value="1" >  
                                <input type="text" class="form-control" id="feFirstName" name="feFirstName"  placeholder="Ingrese nombre" value=""> </div>
                              <div class="form-group col-md-6">
                                <label for="feLastName">Apellido</label>
                                <input type="text" class="form-control" id="feLastName" name="feLastName" placeholder="Ingrese apellido" value=""> </div>
                            </div>
                            <div class="form-row">
                             
                              <div class="form-group col-md-6">
                              <label for="feInputAddress">Teléfono</label>
                              <input type="text" class="form-control" id="fephone" name="fephone" placeholder="Ingrese teléfono"> </div>
                              <div class="form-group col-md-6">
                              <label for="feEmailAddress">Correo</label>
                              <input type="text" class="form-control" id="feEmailAddress"  name="feEmailAddress"  placeholder="Ingrese Correo"> </div>
                            </div>
                            
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feInputCity">Ciudad</label>
                                <input type="text" class="form-control" id="feInputCity"  name="feInputCity" placeholder="Ingrese Ciudad"> </div>
                                <div class="form-group col-md-6">
                                <label for="feInputCity">Cédula</label>
                                <input type="text" class="form-control" id="fenumber"  name="fenumber" placeholder="Ingrese cédula"> </div>
                             </div>
                         
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="feDescription">Notas adicionales</label>
                                <textarea class="form-control" name="fenotes" id="fenotes" rows="3"></textarea>
                              </div> 
                            </div> 
                            <button type="submit" id="crearCliente" class="btn btn-accent">Crear Domiciliario</button>

                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              
            <!-- End Page Header -->
           </form>
          </div>
          </div> 
</div>
  <!-- / .main-navbar -->
  <div class="main-content-container container-fluid px-4" style="
    margin-top: -87px;
">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Listado</span>
                <h3 class="page-title">Domiciliario</h3> 
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">de domiciliarios</h6>      <input class="form-control col-md-3 light-table-filter" data-table="order-table" type="text" placeholder="Buscar..">

                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0 order-table">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0">Nombre</th>
                          <th scope="col" class="border-0">Apellido</th>
                          <th scope="col" class="border-0">Cédula</th>
                         
                          <th scope="col" class="border-0">Modificar</th>
                          <th scope="col" class="border-0">Eliminar</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                      <?php 
                          require('../conex/conexion.php');
                          $query="SELECT * FROM cliente where estado != 1 order by id asc ";
                          $answer = $conexion -> query($query);
                          while ($row=$answer->fetch_assoc()){
                          ?>
                          <tr>
                              <td> <?php echo $row['id']; ?></td>
                              <td> <?php echo $row['nombre']; ?></td>
                              <td> <?php echo $row['apellido']; ?></td>
                              <td> <?php echo $row['cedula']; ?></td>
                            
                              <td>  <a href="#"><button type="button" class="mb-2 btn btn-sm btn-info mr-1">Modificar</button> </a></td>
                              <td> 
                              <button type="button" id="<?php echo $row ['id'];?>" class="borrarcl mb-2 btn btn-sm btn-danger mr-1"><i class="material-icons">delete</i> Borrar</button>  
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
            
                      <?php 
                          require('../conex/conexion.php');
                          $query="SELECT * FROM cliente where estado = 1 ";
                          $answer = $conexion -> query($query);
                          while ($row=$answer->fetch_assoc()){
                          ?>
                          <tr>
                              <td> <?php echo $row['id']; ?></td>
                              <td> <?php echo $row['nombre']; ?></td>
                              <td> <?php echo $row['apellido']; ?></td>
                              <td> <?php echo $row['direccion']; ?></td>
                              <td> <?php echo $row['telefono']; ?></td>
                              <td> <?php echo $row['correo']; ?></td>
                              <td> <?php echo $row['favorito']; ?></td>
                              <td> <a href="modCliente.php?id=<?php echo $row ['id'];?>">Modificar </a></td>
                              <td> <a href="#">Eliminar </a></td>
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
       
            <script>
$(document).ready(function(){
  $("#nuevo").click(function(){
    $("#toggle_dom").fadeToggle();
   
  });
});
</script>


          <?php
         include('footer.php');
         ?>