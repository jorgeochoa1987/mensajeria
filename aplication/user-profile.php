<?php 
include('header.php');

?>
          <!-- / .main-navbar -->
         
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Información</span>
                <h3 class="page-title">cuenta de usuario  <?php   $id = $_GET['id']; echo $id; ?></h3>
              </div>
            </div>
            <!-- End Page Header -->
          
            <div class="row">
              <div class="col-lg-4">
                <div class="card card-small mb-4 pt-3">
                  <div class="card-header border-bottom text-center">
                    <div class="mb-3 mx-auto">
                    <?php
                          require('../conex/conexion.php');
                          $id = $_GET['id']; 
                          $query3="SELECT * FROM users  where id = $id ";
                          $answer3 = $conexion -> query($query3);
                          while ($row3=$answer3->fetch_assoc()){
                          ?> 
                        <img   id="imgSalida" class="rounded-circle" src="<?php echo $row3['foto']; ?>" alt="Ingrese foto" width="110"> </div>
                      <input type="text" class="form-control" hidden  id="idimage" placeholder="Ingrese nombre"  value="<?php echo $row3['foto']; ?>"> 
                      <?php 
                        }
                        ?>
                    
                             

                    <h4 class="mb-0"><?php echo  $nombreApe ?></h4>
                    <span class="text-muted d-block mb-2">Administrador Su</span>
                   
                    <input  class="mb-2 btn btn-sm btn-pill btn-outline-primary mr-2"  style="
    width: 100%;
" name="file-input" id="file-input" type="file" />
                  </div>
                
                  
                </div>
              </div>
              <div class="col-lg-8">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Información del usuario</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                        <?php
                         
                         $id = $_GET['id']; 
                          $query1="SELECT * FROM users  where id = $id ";
                          $answer1 = $conexion -> query($query1);
                          while ($row1=$answer1->fetch_assoc()){
                          ?>
                          
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feFirstName">Nombre </label>
                                <input type="text" class="form-control" id="feId"  value="<?php echo $row1['id']; ?>" hidden>

                                <input type="text" class="form-control" id="feFirstName" placeholder="Primer nombre" value="<?php echo $row1['nombreApellido']; ?>"> </div>
                              <div class="form-group col-md-6">
                                <label for="feLastName">Usuario</label>
                                <input type="text" class="form-control" id="feLastName" placeholder="Usuario" value="<?php echo $row1['usuario']; ?>"> </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feEmailAddress">Correo</label>
                                <input type="email" class="form-control" id="feEmailAddress" placeholder="Email" value="<?php echo $row1['correo']; ?>"> </div>
                              <div class="form-group col-md-6">
                                <label for="fePassword">Contraseña</label>
                                <input type="password" class="form-control" id="fePassword" value="<?php echo $row1['contrasenia']; ?>"> </div>
                            </div>
                        
                            <button type="submit" id="actualizarUser" class="btn btn-accent">Actualizar</button>
                        

                          <?php 
                          }
                          ?>
                             
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- End Default Light Table -->
          </div>
         <?php
         include('footer.php');
         ?>