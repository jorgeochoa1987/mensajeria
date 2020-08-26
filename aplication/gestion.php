 
<?php 
include('header.php');
?>
       <div class="page-header row no-gutters py-4" style="justify-content: center;">
             
            </div>

              <div class="col-lg-12">
              
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Listado</span>
                <h3 class="page-title">Gestion documental</h3> 
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
                          <th scope="col" class="border-0">Placa</th>
                         
                          <th scope="col" class="border-0">Modelo</th>
                          <th scope="col" class="border-0">Marca</th>
                          <th scope="col" class="border-0">Km</th>
                          <th scope="col" class="border-0">Acción</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                         <?php 
                          require('../conex/conexion.php');
                          $query="SELECT * FROM cartera  where saldo > 0  order by id asc ";
                          $answer = $conexion -> query($query);
                          while ($row=$answer->fetch_assoc()){
                          ?>
                          <tr>
                              <td> <?php echo $row['id']; ?></td>
                              <td> <?php echo $row['nombre']; ?></td>
                              <td> AKT</td>

                              <td> 100000 </td>
                              <td>  <button type="button" id="borrarCartera" class="mb-2 btn btn-sm btn-danger mr-1"><i class="material-icons">two_wheeler</i> ver kilometraje</button> </td>
                              <td>  
                              <a href="modCartera.php?id=<?php echo $row ['id'];?>"><button type="button" class="mb-2 btn btn-sm btn-info mr-1">Modificar</button> </a>
                              <input type="text" class="form-control" id="feidcartera"  value="<?php echo $row ['id'];?>" hidden >  <button type="button" id="borrarCartera" class="mb-2 btn btn-sm btn-danger mr-1"><i class="material-icons">delete</i> Borrar</button>  
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
          </div></div> </div>
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