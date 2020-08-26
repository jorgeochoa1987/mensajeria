 
<?php 
include('header.php');
?>
       <div class="page-header row no-gutters py-4" style=" justify-content: center;justify-content: center;background: #e6e6e6;">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0" >
                <h3 class="page-title"><button id="nuevo"class="btn btn-accent">Agregar Nueva motocicleta </button></h3>
              </div>
      </div>
          <div class="main-content-container container-fluid px-4"  id="toggle_dom" style="display:none;">
            <!-- Page Header -->
            <form enctype="multipart/form-data" id="fupForm" >     
                        <div class="page-header row no-gutters py-4">
                          <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                            <h3 class="page-title">Nueva motocicleta</h3>                                   <input type="number" class="form-control" hidden   name="save" value="1" > 

                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-2">
                            <div class="card card-small mb-4 pt-3">
                                                          
                              <div class="card-header border-bottom text-center">
                                <div class="mb-3 mx-auto">
                                  <img   id="imgSalida" class="rounded-circle" src="images/menu.svg" alt="Ingrese foto" width="110"> </div>
                                  <input type="number" class="form-control" hidden  id="idimage" placeholder="Ingrese nombre" > 

                                <h4 class="mb-0"></h4>

                              
                                
                                <span class="text-muted d-block mb-2"></span>
                              
                                  <input  class="mb-2 btn btn-sm btn-pill btn-outline-primary mr-2"  style="width: 100%;" id="file" name="file" type="file" /> 

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
                                            <label for="marca">Marca</label> 
                                            <input type="text" class="form-control" id="marca" name="marca" placeholder="Ingrese marca" value=""> </div>
                                          <div class="form-group col-md-6">
                                            <label for="modelo">Modelo</label>
                                            <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Ingrese modelo" value=""> </div>
                                        </div>
                                        <div class="form-row">
                                        
                                          <div class="form-group col-md-6">
                                          <label for="placa">Placa</label>
                                          <input type="text" class="form-control" id="placa" name ="placa" placeholder="Ingrese placa"> </div>
                                          <div class="form-group col-md-6">
                                          <label for="colo">Color</label>
                                          <input type="text" class="form-control" id="color" name="color" placeholder="Ingrese color"> </div>
                                        </div>
                                        <div class="form-row">
                                          <div class="form-group col-md-6">
                                            <label for="soat">Soat</label>
                                            <input type="text" class="form-control" id="soat"  name="soat" placeholder="Ingrese soat"> </div>
                                        
                                          <div class="form-group col-md-6">
                                            <label for="vec">Vencimiento Soat</label>
                                            <input type="date" class="form-control" id="vec" name="vec" placeholder="Ingrese soat"> </div>
                                        </div>
                                        <div class="form-row">
                                          <div class="form-group col-md-6"> 
                                            <label for="dueno">Tecnomecanica</label>
                                            <input type="text" class="form-control" id="tecno" name="tecno" placeholder="Ingrese #tecnomecanica">
                                            <label for="dueno">Fecha Tecnomecanica</label>
                                            <input type="date" class="form-control" id="tecno" name="ftecno" placeholder="fecha #tecnomecanica"> </div>
                                        </div>  
                                        <div class="form-row">
                                          <div class="form-group col-md-6"> 
                                            <label for="dueno">Dueño</label>
                                            <input type="text" class="form-control" id="dueno" name="dueno" placeholder="Ingrese dueño"> </div>
                                        </div>   
                                        <div class="form-row">
                                          <div class="form-group col-md-12">
                                            <label for="notas">Notas adicionales</label>
                                            <textarea class="form-control" name="notas" id="notas" rows="3"></textarea>
                                          </div>  
                                        </div>
                                        </form>
                                        <button type="submit" id="creamoto" class="btn btn-accent">Crear motocicleta</button>

                                    </div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </div>
                          
                        <!-- End Page Header --> </form> 
                      </div>
                      </div>  
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Listado</span>
                <h3 class="page-title">de motos</h3> 
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0"></h6><input class="form-control col-md-3 light-table-filter" data-table="order-table" type="number" placeholder="Buscar..">
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0 order-table">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0">foto</th>
                          <th scope="col" class="border-0">Marca</th>
                          <th scope="col" class="border-0">Modelo</th>
                          <th scope="col" class="border-0">Placa</th>
                          <th scope="col" class="border-0">Color</th>
                          <th scope="col" class="border-0">Soat</th>
                          <th scope="col" class="border-0">Vencimiento</th>
                          <th scope="col" class="border-0">Dueño</th>
                          <th scope="col" class="border-0">Notas</th>
                          <th scope="col" class="border-0">Registro de KM</th>
                          <th scope="col" class="border-0">Acciones</th>

                        </tr>
                      </thead>
                      <tbody>
                        
                         <?php 
                          require('../conex/conexion.php');
                          $query="SELECT * FROM moto ";
                          $answer = $conexion -> query($query);
                          while ($row=$answer->fetch_assoc()){
                          ?>
                          <tr>
                              <td> <?php echo $row['id']; ?></td>
                              <td> <img src="modules/uploads/<?php echo $row['foto']; ?>"  style="width: 100%;"/></td>
                              <td> <?php echo $row['marca']; ?></td>
                              <td> <?php echo $row['modelo']; ?></td>
                              <td> <?php echo $row['placa']; ?></td>
                              <td> <?php echo $row['color']; ?></td>
                              <td> <?php echo $row['soat']; ?></td>
                              <td> 
                              <?php 
                              
                              $date =date("Y-m-d");
                              $soat = $row['vencimientosoat'];

                              if ($date== $soat)
                              {
                                echo "a vencer";
                              }
                                ?></td>
                              <td> <?php echo $row['dueno']; ?></td>
                              <td> <?php echo $row['notas']; ?></td>

                              <td>  <button type="button" id="" class="mb-2 btn btn-sm btn-danger mr-1"><i class="material-icons">two_wheeler</i> ver kilometraje</button> </td>
                              <td>  
                              <a href="#"><button type="button" class="mb-2 btn btn-sm btn-info mr-1">Modificar</button> </a>
                             <button type="button" onClick="borrarmoto(<?php echo $row ['id'];?>)" class="mb-2 btn btn-sm btn-danger mr-1"><i class="material-icons">delete</i> Borrar</button>  
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