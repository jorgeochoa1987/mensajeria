 
<?php 
include('header.php');
?>


<style>
.card-header:first-child {
    border-radius: 625rem;
}
 .card-header {
    padding: 0rem 0.5rem !important;
} 

</style>


          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->

            
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Dashboard</span>
                <h3 class="page-title"></h3><h4 class="page-title" style=" width: 100%;font-size: 15px;">
                
                <?php date_default_timezone_set('America/Bogota'); 
                $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
                $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                 
                echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ; 
                
                ?></h4>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Small Stats Blocks -->
<div class="row">
    
                
     <div class="col-md-3">
     <div class=" card card-small mb-3 pt-3 page-header row no-gutters py-4" style="justify-content: center;justify-content: center;border-radius: 11px;">
              
                <h3 class="page-title" style="align-self: center;"><button onclick="createnewcard()" class="btn btn-accent">Nuevo Domicilio </button></h3>
            
      </div> 
     
     <div id="container">
          <!-- Card -->
            <div class="card card-small mb-3 pt-3" id="1">
                  <div class="card-header border-bottom text-center">
                  <div style="float: right;"> <button class="closex" onclick="deletecard(1)" >x</button> </div>
                        <div class="form-group"> 
                              <label for="dueno">Lugar de salida</label>
                              <input type="text" class="form-control" id="lsalida" name="lsalida" placeholder="Ingrese Lugar de salida">
                              <label for="dueno">Lugar de llegada</label>
                              <input type="text" class="form-control" id="lllegada" name="lllegada" placeholder="Ingrese Lugar de llegada">
                              <label for="dueno">Valor</label>
                              <input type="text" class="form-control" id="valor" name="valor" placeholder="Ingrese valor"> 
                              <label for="dueno">% Ganancia</label>
                              <input type="text" class="form-control" id="gana" name="gana" placeholder="Valor de ganancia">
                              <label for="dueno">Que lleva el dom</label>
                              <textarea  type="date" class="form-control" id="desc" name="desc" placeholder="Describe el domicilio"></textarea>  
                        </div>
                  </div>
          </div>  
          <!--End Card-->
                
    </div>

    </div> 
 

  <div class="col-md-7" style="padding: 0px;">
      <div style="width: 100%"><iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=es&amp;q=Bucarmanga,%20santander+(bucaramanga)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe></div>
  </div>
  <div class="col-md-2">
                        <?php 
                          require('../conex/conexion.php');
                          $query="SELECT em.id as id,  dom.nombre as nombre, dom.foto as foto,  mo.placa as placa, mo.soat as soat, mo.vencimientosoat as vec  FROM `emparejados`as em join `cliente` as dom ON em.id_domiciliario = dom.id JOIN moto as mo ON em.id_moto = mo.id";
                          $answer = $conexion -> query($query);
                          while ($row=$answer->fetch_assoc()){
                          ?> 
          <div class="card card-small mb-3 pt-3">
                  <div class="card-header border-bottom text-center">
                      <div class="mb-3 mx-auto">
                        <img id="imgSalida" class="rounded-circle"src="modules/uploads/<?php echo $row['foto']; ?>"  alt="Ingrese foto" width="110"> </div>
                        <div class="form-group col-md-12"> 
                                  <label for="mesepago">Domiciliario: <?php echo $row['nombre']; ?></label>
                                 <p style="margin-bottom: -0.25rem;">Placa:  <?php echo $row['placa']; ?></p>
                                 <p style="margin-bottom: -0.25rem;">Soat vence:   <?php echo $row['vec']; ?></p>
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
          <?php  }  ?>
  </div>
</div>   
  



<script>
function createnewcard() {  
  newid= Math.floor((Math.random() * 10) + 1);   
  $("#container").append(" <div class=\"card card-small mb-3 pt-3\" id=\""+newid+"\" style=\"padding: 10px;\" \"><div style=\"text-align: end;\"> <button class=\"closex\" onclick=\"deletecard("+newid+")\" >x</button> </div><div class=\"form-group\"> <label for=\"dueno\">Lugar de salida</label>"+
                             " <input type=\"text\" class=\"form-control\" id=\"lsalida\" name=\"lsalida\" placeholder=\"Ingrese Lugar de salida\">"+
                             "  <label for=\"dueno\">Lugar de llegada</label>"+ 
                             "  <input type=\"text\" class=\"form-control\" id=\"lllegada\" name=\"lllegada\" placeholder=\"Ingrese Lugar de llegada\">"+
                             "  <label for=\"dueno\">Valor</label>"+
                             "  <input type=\"text\" class=\"form-control\" id=\"valor\" name=\"valor\" placeholder=\"Ingrese valor\"> "+
                             "  <label for=\"dueno\">% Ganancia</label>"+
                             "  <input type=\"text\" class=\"form-control\" id=\"gana\" name=\"gana\" placeholder=\"Valor de ganancia\">"+
                             " <label for=\"dueno\">Que lleva el dom</label>"+
                             "  <textarea  type=\"date\" class=\"form-control\" id=\"desc\" name=\"desc\" placeholder=\"Describe el domicilio\"></textarea>  "+
                             "  </div>"+ 
                             " </div></div>");

  }
</script>

<script> 
function deletecard(id) {
  idc = "#"+id; 
  $(idc).remove(); 
  } 
</script>
          </div>     

          <?php 
          include_once("footer.php") ;
        
         ?> 

</div>
<footer class="main-footer d-flex p-2 px-3 bg-white border-top">
            <ul class="nav">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="nuevocliente.php">Nuevo cliente</a>
              </li>
             
              <li class="nav-item">
                <a class="nav-link" href="listarcartera.php">Cartera</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Vencidos</a>
              </li>
            </ul>
            <span class="copyright ml-auto my-auto mr-2">Copyright © <?php  echo date("Y");?>
              <a href="https://wickwit" rel="nofollow"></a>
            </span>
          </footer>
        </main>
      </div>
    </div>
    <div class="promo-popup animated">
      <a href="http://bit.ly/shards-dashboard-pro" class="pp-cta extra-action">
     </a>
      <div class="pp-intro-bar" style="
    padding-right: 81px;
    padding-left: 121px;
">Clientes prioritarios
        <span class="close">
          <i class="material-icons">close</i>
        </span>
        <span class="up">
          <i class="material-icons">keyboard_arrow_up</i>
        </span>
      </div>
      <div class="pp-inner-content" style="padding-left:15px!important">
        <div class="row">
        <?php
                          require('../conex/conexion.php');
                          $query99="SELECT * FROM `cliente` WHERE `favorito`=1";
                          $answer99 = $conexion -> query($query99);
                          while ($row99=$answer99->fetch_assoc()){
                          ?> 
              <div class="col-lg col-md-2 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase"><?php echo $row99['nombre']; ?></span>
                        <h6 class="stats-small__value count my-3"><?php echo $row99['telefono']; ?></h6>
                      </div>
                      <div class="stats-small__data">
                      </div>
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-1"></canvas>
                  </div>
                </div>
              </div>
              <?php 
                        } 
                        ?>
                     
                             
        </div>
        <a class="pp-cta extra-action" href="index.php">Ver lista completa</a>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="scripts/extras.1.1.0.min.js"></script>
    <script src="scripts/shards-dashboards.1.1.0.min.js"></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js'></script>
    <script  src="modules/selectable.js"></script>
    <script src="modules/crearCrud.js"></script>
    <script src="modules/decimales.js"></script>
    <script src="modules/funcionesEspeciales.js"></script>

    <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script src='https://cdn.datatables.net/v/bs/jq-2.2.4/dt-1.10.15/r-2.1.1/datatables.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js'></script>
<script src='https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js'></script>
<script src='https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js'></script>
<script src='https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js'></script>


<script  src="modules/generarReporte.js"></script>

  </body>
</html>