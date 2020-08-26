 
<?php 
include('header.php');
?>
       <div class="page-header row no-gutters py-4" style=" justify-content: center;justify-content: center;background: #e6e6e6;">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0" >
                <h3 class="page-title"><button id="nuevo"class="btn btn-accent">Asignar nueva moto </button></h3>
              </div>
      </div>
          <div class="main-content-container container-fluid px-4"  id="toggle_dom" style="display:none; min-height: calc(00vh - 7.5rem);">
            <!-- Page Header --> 
            <form enctype="multipart/form-data" id="fupForm" >     
                        <div class="page-header row no-gutters py-4">
                          <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                            <h3 class="page-title">Nueva asignación</h3>                                  
                             <input type="number" class="form-control" hidden   name="save" value="1" > 

                          </div>
                        </div>
                        <div class="row">
                        
                          <div class="col-lg-12">
                            <div class="card card-small mb-4">
                              <div class="card-header border-bottom">
                                <h6 class="m-0">Seleccione  moto y conductor </h6>
                              </div>
                              <ul class="list-group list-group-flush">
                                <li class="list-group-item p-3">
                                  <div class="row">
                                    <div class="col">
                                    
                                        <div class="form-row">
                                        <div class="form-group col-md-4">
                                    <label for="nameCate">Conductor</label>
                                    <select class="form-control"  data-style="form-control" id="mensajero" name="mensajero" data-live-search="true" title="-- Seleccione categoria --">
                                        <?php 
                                            require('../conex/conexion.php');
                                            $query2="SELECT * FROM cliente ";
                                            $answer2 = $conexion -> query($query2);
                                            while ($row2=$answer2->fetch_assoc()){
                                            ?>
                                            <option value="<?php echo $row2['id']; ?>"><?php echo $row2['nombre']; ?> <?php echo $row2['apellido']; ?></option>
                                            
                                            <?php 
                                            } 
                                            ?>
                                    </select>
                            </div>
                            <div class="form-group col-md-4">
                                    <label for="nameCate">Moto</label>
                                    <select class="form-control"  data-style="form-control" id="moto" name="moto" data-live-search="true" title="-- Seleccione categoria --">
                                        <?php 
                                            require('../conex/conexion.php');
                                            $query3="SELECT * FROM moto ";
                                            $answer3 = $conexion -> query($query3); 
                                            while ($row3=$answer3->fetch_assoc()){
                                            ?>
                                            <option value="<?php echo $row3['id']; ?>"><?php echo $row3['placa']; ?> <?php echo $row3['marca']; ?></option>
                                            
                                            <?php 
                                            }
                                            ?>
                                    </select>
                            </div>
                                        
                                        </div> 
                                       
                                        </form>
                                        <button type="submit" id="asignar" class="btn btn-accent">Asignar</button>
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
                <h3 class="page-title">Domiciliarios asignados</h3> 
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
                          <th scope="col" class="border-0">Placa</th>
                          <th scope="col" class="border-0">Soat #</th>
                          <th scope="col" class="border-0">Fecha vence Soat</th>
                      

                        </tr>
                      </thead>
                      <tbody>
                        
                         <?php 
                          require('../conex/conexion.php');
                          $query="SELECT em.id as id,  dom.nombre as nombre, dom.foto as domfoto,  mo.placa as placa, mo.soat as soat, mo.vencimientosoat as vec  FROM `emparejados`as em join `cliente` as dom ON em.id_domiciliario = dom.id JOIN moto as mo ON em.id_moto = mo.id";
                          $answer = $conexion -> query($query);
                          while ($row=$answer->fetch_assoc()){ 
                          ?> 
                          <tr>
                              <td> <?php echo $row['id']; ?></td>
                              <td> <img src="modules/uploads/<?php
                              if($row['domfoto']==''){
                                echo "picture.png";
                              }else{
                                echo $row['domfoto']; } ?> 
                              "style="width: 30% "/></td>
                              <td> <?php echo $row['nombre']; ?></td>
                              <td> <?php echo $row['placa']; ?></td>
                              <td> <?php echo $row['soat']; ?></td>
                              <td> <?php echo $row['vec']; ?></td>
                               <td> 
                              <a href="#"><button type="button" class="mb-2 btn btn-sm btn-info mr-1">Modificar</button> </a>
                             <button type="button" onClick="borrarmoto(<?php echo $row ['id'];?>)" class="mb-2 btn btn-sm btn-danger mr-1"><i class="material-icons">delete</i> Borrar</button> </td> 
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