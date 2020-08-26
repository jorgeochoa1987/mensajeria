 
<?php 
include('header.php');
?>
       
<div class="main-content-container container-fluid px-4" >
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Agregar</span>
                <h3 class="page-title">Nuevo evento</h3>
              </div>
            </div>
            <form enctype="multipart/form-data" id="fupForm" >           
            <div class="row">
              <div class="col-lg-2">
                <div class="card card-small mb-4 pt-3">
                  <div class="card-header border-bottom text-center">
                    <div class="mb-3 mx-auto">
                      <img   id="imgSalida" class="rounded-circle" src="images/menu.svg" alt="Ingrese foto" width="110"> </div>
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
                    <h6 class="m-0">Información del evento</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                          
                          
            
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                <input type="text" class="form-control" hidden   name="save" value="1" >  
                                  <label for="feDescription">Texto del evento</label>
                                  <textarea class="form-control" name="name" id="name" rows="3"></textarea>
                                </div>
                              </div>

                              </form>

                            <button type="submit" id="crearEvento" class="btn btn-accent">Crear evento</button>

                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              
            <!-- End Page Header -->
            <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Listado</span>
                <h3 class="page-title">de eventos</h3> 
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0"></h6><input class="form-control col-md-3 light-table-filter" data-table="order-table" type="text" placeholder="Buscar..">
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0 order-table">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0">Texto</th>
                         
                          <th scope="col" class="border-0">Imagen</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                        
                         <?php 
                          require('../conex/conexion.php');
                          $query="SELECT * FROM evento";
                          $answer = $conexion -> query($query);
                          while ($row=$answer->fetch_assoc()){
                          ?>
                          <tr>
                              <td> <?php echo $row['id']; ?></td>
                              <td> <?php echo $row['nombre']; ?></td>
                              <td><img src="modules/uploads/<?php echo $row['imagen'];?>" style="width: 46%;"></td>
                             
                            
                              <td>  
                              <a href="modCartera.php?id=<?php echo $row ['id'];?>"><button type="button" class="mb-2 btn btn-sm btn-info mr-1">Modificar</button> </a>
                               <button type="button" onClick="borrarevento(<?php echo $row ['id'];?>)" class="mb-2 btn btn-sm btn-danger mr-1"><i class="material-icons">delete</i> Borrar</button>  
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
            <!-- End Default Light Table -->
            <!-- Default Dark Table 
            <div class="row">
              <div class="col">
                <div class="card card-small overflow-hidden mb-4">
                  <div class="card-header bg-dark">
                    <h6 class="m-0 text-white">Cartera Saldadas</h6>
                  </div>
                  <div class="card-body p-0 pb-3 bg-dark text-center">
                    <table class="table table-dark mb-0">
                      <thead class="thead-dark">
                        <tr>
                        <th scope="col" class="border-0">#</th>
                           <th scope="col" class="border-0">Nombre</th>
                          
                          <th scope="col" class="border-0">Valor</th>
                          <th scope="col" class="border-0">Favorito</th>
                          <th scope="col" class="border-0">Modificar</th>
                          <th scope="col" class="border-0">Eliminar</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                          require('../conex/conexion.php');
                          $query="SELECT * FROM cartera where saldo =0";
                          $answer = $conexion -> query($query);
                          while ($row=$answer->fetch_assoc()){
                          ?>
                          <tr>
                              <td> <?php echo $row['id']; ?></td>
                              <td> <?php echo $row['nombre']; ?></td>
                            
                              <td class="amount"> <?php echo $row['valorIni']; ?></td>
                              <td> <?php echo $row['favorito']; ?></td>
                              <td> <a href="modCartera.php?id=<?php echo $row ['id'];?>">Modificar </a></td>
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
            </div>-->
            <!-- End Default Dark Table -->
          </div>
          </div>
          </div> 
          <!-- / .main-navbar -->
        

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