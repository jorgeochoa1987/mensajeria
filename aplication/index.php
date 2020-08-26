 
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

<?php include('footer.php') ;?>
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
          <?php   }   mysqli_close($conexion);?>        
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

 

         