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
                <h3 class="page-title">Nuevo Gasto</h3>
              </div>
            </div>
            <div class="row">
              
              </div>
              <div class="col-lg-9">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Información de gasto</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                          
                           
                            <div class="form-row">
                              
                              <div class="form-group col-md-6">
                                <label for="feInputCity">Valor</label>
                                <input type="text" class="form-control" id="feValue" placeholder="Ingrese valor"> </div>
                                <div class="form-group col-md-6">
                                <label for="feInputCity">fecha</label>
                                <input type="date" class="form-control" id="fedate" placeholder=""> </div>
                             </div>
                        
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="feDescription">Notas adicionales</label>
                                <textarea class="form-control" name="fenotes" id="fenotes" rows="5"></textarea>
                              </div>
                            </div>
                            <button type="submit" id="crearGasto" class="btn btn-accent">Crear Gasto</button>

                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              
            <!-- End Page Header -->
          </div>
          <?php
         include('footer.php');
         ?>