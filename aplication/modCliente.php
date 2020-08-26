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

 <!-- / .main-navbar -->
 <div class="main-content-container container-fluid px-4">
            <!-- Page Header --> 
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Edición</span>
                <h3 class="page-title">Editar Domiciliario  <?php   $id = $_GET['id']; echo $id; ?></h3>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-2">
                <div class="card card-small mb-4 pt-3">
                  <div class="card-header border-bottom text-center">
                  <?php
                          require('../conex/conexion.php');
                          $id = $_GET['id']; 
                          $query2="SELECT * FROM cliente  where id = $id ";
                          $answer2 = $conexion -> query($query2);
                          while ($row2=$answer2->fetch_assoc()){
                          ?> 
                    <div class="mb-3 mx-auto">
                    <img   id="imgSalida" class="rounded-circle" src="<?php echo $row2['foto'] ;?>" alt="Ingrese foto" width="110"> </div>
                      <input type="text" class="form-control" hidden id="idimage" placeholder="Ingrese nombre" value="<?php echo $row2['foto'] ; ?>">                     <h4 class="mb-0"></h4>
                    <span class="text-muted d-block mb-2"></span>
                    <input  class="mb-2 btn btn-sm btn-pill btn-outline-primary mr-2"  style="
    width: 100%;
" name="file-input" id="file-input" type="file" />
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
                                
                                <input type="text" class="form-control" id="feFirstName" placeholder="Ingrese nombre" value="<?php echo $row2['nombre'] ; ?>"> </div>
                              <div class="form-group col-md-6">
                                <label for="feLastName">Apellido</label>
                                <input type="text" class="form-control" id="feLastName" placeholder="Ingrese apellido" value="<?php echo $row2['apellido'] ; ?>"> </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feEmailAddress">Correo</label>
                                <input type="text" class="form-control" id="feEmailAddress" placeholder="Dirección de cobro" value="<?php echo $row2['correo'] ; ?>"> </div>
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
                            <button type="submit" id="ActualizarCliente" class="btn btn-accent">Actualizar Cliente</button>
                            <?php 
                        }
                        ?>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              
            <!-- End Page Header -->
          </div>
          <input type="text" hidden class="form-control" id="feid" placeholder="Ingrese nombre" value="<?php   $id = $_GET['id']; echo $id; ?>">
                                                         
      <?php   include('footer.php');
         ?>