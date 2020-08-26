 
<?php 
include('header.php');
?>
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Listado</span>
                <h3 class="page-title">de clientes</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Clientes Activos</h6>      <input class="form-control col-md-3 light-table-filter" data-table="order-table" type="text" placeholder="Buscar..">

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
                            
                              <td>  <a href="modCliente.php?id=<?php echo $row ['id'];?>"><button type="button" class="mb-2 btn btn-sm btn-info mr-1">Modificar</button> </a></td>
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
          </div>
          <?php
         include('footer.php');
         ?>