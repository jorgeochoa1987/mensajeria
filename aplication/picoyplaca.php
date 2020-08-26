 
<?php 
include('header.php');
?>
       
<div class="main-content-container container-fluid px-4" >
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Lista</span>
                <h3 class="page-title">Tabla de pico y placa </h3>
              </div>
            </div>
            <div class="row">
          
              <div class="col-lg-12">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                    <form enctype="multipart/form-data" id="fupForm" >    
                      <div class="row">  
 
                        <div class="col">
                        <?php 
                          require('../conex/conexion.php');
                          $query="SELECT * FROM picoyplaca where id =1 ";
                          $answer = $conexion -> query($query);
                          while ($row=$answer->fetch_assoc()){
                          ?>
                        <div class="form-row">
                                          <div class="form-group col-md-6">
                                            <label for="marca">Lunes</label> 
                                            <input type="number" class="form-control" hidden   name="save" value="1" > 
                                            <input type="number" class="form-control" id="marca" name="l1" placeholder="Ingrese valor inicial" value="<?php echo $row['l1']; ?>"> </div>
                                          <div class="form-group col-md-6">
                                            <label for="modelo">_</label>
                                            <input type="number" class="form-control" id="modelo" name="l2" placeholder="Ingrese valor final" value="<?php echo $row['l2']; ?>"> </div>
                        </div>
                        <div class="form-row">
                                          <div class="form-group col-md-6">
                                            <label for="marca">Martes</label>
                                            <input type="number" class="form-control" id="marca" name="m1" placeholder="Ingrese valor inicial" value="<?php echo $row['m1']; ?>"> </div>
                                          <div class="form-group col-md-6">
                                            <label for="modelo">_</label>
                                            <input type="number" class="form-control" id="modelo" name="m2" placeholder="Ingrese valor final" value="<?php echo $row['m2']; ?>"> </div>
                        </div>
                        <div class="form-row"> 
                                          <div class="form-group col-md-6">
                                            <label for="marca">Miercoles</label>
                                            <input type="number" class="form-control" id="marca" name="mi1" placeholder="Ingrese valor inicial" value="<?php echo $row['mi1']; ?>"> </div>
                                          <div class="form-group col-md-6">
                                            <label for="modelo">_</label>
                                            <input type="number" class="form-control" id="modelo" name="mi2" placeholder="Ingrese valor final" value="<?php echo $row['mi2']; ?>"> </div>
                        </div>
                        <div class="form-row">
                                          <div class="form-group col-md-6">
                                            <label for="marca">Jueves</label>
                                            <input type="number" class="form-control" id="marca" name="j1" placeholder="Ingrese valor inicial" value="<?php echo $row['j1']; ?>"> </div>
                                          <div class="form-group col-md-6">
                                            <label for="modelo">_</label>
                                            <input type="number" class="form-control" id="modelo" name="j2" placeholder="Ingrese valor final" value="<?php echo $row['j2']; ?>"> </div>
                        </div>
                        <div class="form-row">
                                          <div class="form-group col-md-6">
                                            <label for="marca">Viernes</label>
                                            <input type="number" class="form-control" id="marca" name="v1" placeholder="Ingrese valor inicial" value="<?php echo $row['v1']; ?>"> </div>
                                          <div class="form-group col-md-6">
                                            <label for="modelo">_</label>
                                            <input type="number" class="form-control" id="modelo" name="v2" placeholder="Ingrese valor final" value="<?php echo $row['v2']; ?>"> </div>
                        </div>
                        <div class="form-row">
                                          <div class="form-group col-md-6">
                                            <label for="marca">Sabado</label>
                                            <input type="number" class="form-control" id="marca" name="s1" placeholder="Ingrese valor inicial" value="<?php echo $row['s1']; ?>"> </div>
                                          <div class="form-group col-md-6">
                                            <label for="modelo">_</label>
                                            <input type="number" class="form-control" id="modelo" name="s2" placeholder="Ingrese valor final" value="<?php echo $row['s2']; ?>"> </div>
                        </div>
                        <div class="form-row">
                                          <div class="form-group col-md-6">
                                            <label for="marca">Domingo</label>
                                            <input type="number" class="form-control" id="marca" name="d1" placeholder="Ingrese valor inicial" value="<?php echo $row['d1']; ?>"> </div>
                                          <div class="form-group col-md-6">
                                            <label for="modelo">_</label>
                                            <input type="number" class="form-control" id="modelo" name="d2" placeholder="Ingrese valor final" value="<?php echo $row['d2']; ?>"> </div>
                        </div>
 </form>              
                        <?php 
                           }
                          ?>
                            

                            <button type="submit" id="Acpicoyplaca" class="btn btn-accent">Actualizar Pico y placa </button>

                        </div>
                      </div>
                    </li>
                  </ul>
                </div>  
              </div>
              
            <!-- End Page Header -->
          </div>
          </div> 
          <!-- / .main-navbar -->
        
          </div> </div>

          <?php
         include('footer.php');
         ?>