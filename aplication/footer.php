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