<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
     -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fa/css/all.min.css">
    <link rel="stylesheet" href="assets/sa/sweetalert2.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    
    <title>DECLARACION SEGURO ACCIDENTES TRAUMATICOS</title>
  </head>
  <body>
      <?php
      date_default_timezone_set('America/Santiago');
      ?>  
  <div class="col-md-10 mx-auto alert alert-warning mt-2 py-1 px-0">  
    <h4 class="text-primary text-center"><i class="fas fa-fw fa-hospital text-info"></i> CREAR DECLARACION SEGURO ACCIDENTES TRAUMATICOS</h4>
  </div>

<div class="container-fluid" style="width: 90%;">
  <form action="genera.php" method="POST">
    <div class="row">
      <div class="col-md-6">
        <div class="card shadow-sm mb-2 bg-white border border-success">
         <div class="card-header pb-1 text-success">
          <h6><i class="fas fa-user"></i> DATOS PACIENTE
          <span class="float-right text-info">
            <button type="reset" class="btn btn-danger btn-sm" style="margin-top:-6px;">
              <i class="fas fa-fw fa-trash"></i> BORRAR DATOS
            </a>
          </span>
          </h6>
          </div>
          <div class="card-body row">
            <div class="col-md-4 px-2">
              <label for="rutpaciente" class="form-label"><i class="fas fa-fw fa-id-card text-primary"></i> RUT</label>
              <input required type="text" autocomplete="off" class="form-control form-control-sm text-center" id="rutpaciente" name="rutpaciente" placeholder="21.239.567-K"> 
            </div>
            <div class="col-md-4 px-2">
              <label for="nombrepaciente" class="form-label"><i class="fas fa-fw fa-user text-primary"></i> NOMBRES</label>
              <input required onkeyup="mayusculas(this);" type="text" autocomplete="off" class="form-control form-control-sm text-center" id="nombrepaciente" name="nombrepaciente" placeholder="ANDRES PATRICIO"> 
            </div>
            <div class="col-md-4 px-2">
              <label for="apellidopaciente" class="form-label"><i class="fas fa-fw fa-user text-primary"></i> APELLIDOS</label>
              <input required onkeyup="mayusculas(this);" type="text" autocomplete="off" class="form-control form-control-sm text-center" id="apellidopaciente" name="apellidopaciente" placeholder="PEREZ FERNANDEZ"> 
            </div>
            <div class="col-md-4 px-2">
              <label for="fechaaccidente" class="form-label"><i class="far fa-fw fa-calendar text-primary"></i> FECHA ACCIDENTE</label>
              <input type="date" class="form-control form-control-sm text-center" id="fechaaccidente" name="fechaaccidente" value="<?php echo date("Y-m-d"); ?>"> 
            </div>
            <div class="col-md-3 px-2">
              <label for="horaaccidente" class="form-label"><i class="fas fa-fw fa-clock text-primary"></i> HORA ACCIDENTE</label>
              <input type="time" class="form-control form-control-sm text-center" id="horaaccidente" name="horaaccidente" value="<?php echo date("H:i"); ?>"> 
            </div>

           <div class="col-md-5 text-center">
              <a class="btn btn-info btn-sm mt-3 py-1" data-toggle="collapse" href="#descripcionAccidente" role="button">
                <i class="fas fa-fw fa-plus"></i>AGREGAR DESCRIPCION DEL ACCIDENTE (OPCIONAL)
              </a>
           </div>
           <div class="collapse col-md-12 px-2 mt-1" id="descripcionAccidente">
              <label for="descripcionl1" class="form-label"><i class="fas fa-fw fa-car-crash text-primary"></i> DESCRIPCION DEL ACCIDENTE <span class="text-danger">OPCIONAL</span></label>
              <input autocomplete="off" type="text" maxlength="57" onkeyup="mayusculas(this);" class="form-control form-control-sm" id="descripcionl1" name="descripcionl1" placeholder="DESCRIPCION DEL ACCIDENTE (LINEA 1)"></input>
              <input autocomplete="off" type="text" maxlength="57" onkeyup="mayusculas(this);" class="form-control form-control-sm mt-1" id="descripcionl2" name="descripcionl2" placeholder="DESCRIPCION DEL ACCIDENTE (LINEA 2)"></input>
              <input autocomplete="off" type="text" maxlength="57" onkeyup="mayusculas(this);" class="form-control form-control-sm mt-1" id="descripcionl3" name="descripcionl3" placeholder="DESCRIPCION DEL ACCIDENTE (LINEA 3)"></input>
           </div>
          </div>
        </div>
      </div>
      <div id="cuadropdf" class="col-md-6 text-center">
        <?php
            echo("<h6 class='text-primary'><i class='fas fa-fw fa-print'></i> BOTON DERECHO ENCIMA DEL DOCUMENTO PARA IMPRIMIR</h6>");
            echo ("<iframe width='100%' height='192%' src='pdfs/seguro.pdf?versionpdf=".rand()."#toolbar=0' ></iframe>");
        ?>
        <span class="badge badge-info">
              <?php
                   function contadorvisitas()
                    {
                        $archivo = "contadorvisitas.txt"; //el archivo de texto que contendra las visitas
                        $f = fopen($archivo, "r"); //abrimos el fichero en modo de lectura
                        if($f)
                        {
                            $contadorvisitas = fread($f, filesize($archivo)); //vemos el archivo de texto
                            $contadorvisitas = $contadorvisitas + 1; //Le sumamos +1 al contador de visitas
                            fclose($f);
                        }
                        $f = fopen($archivo, "w+");
                        if($f)
                        {
                            fwrite($f, $contadorvisitas);
                            fclose($f);
                        }
                        return $contadorvisitas;
                    }
                    echo (contadorvisitas());
                ?>
          </span>
         
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 mt-1">
        <div class="card border border-primary">
        <div class="card-header pb-1 text-danger">
          <h6><i class="fas fa-user"></i> DATOS REPRESENTANTE/PACIENTE
          <span class="float-right text-info"> <!--style="margin-top:-6px;">-->
            <a onclick="mismoPaciente()" href="#" id="mismopaciente" class="btn btn-success btn-sm" style="margin-top:-6px;">
              <i class="far fa-fw fa-copy"></i> COPIAR DATOS DESDE PACIENTE
            </a>
          </span>
          </h6>
          </div>
          <div class="card-body row">
            <div class="col-md-4 px-2">
            <label for="rutrepresentante" class="form-label"><i class="fas fa-fw fa-id-card text-primary"></i> RUT</label>
                <input required type="text" autocomplete="off" class="form-control form-control-sm text-center" id="rutrepresentante" name="rutrepresentante" placeholder="13.435.233-8"> 
            </div>
            <div class="col-md-4 px-2">
              <label for="nombrerepresentante" class="form-label"><i class="fas fa-fw fa-user text-primary"></i> NOMBRES</label>
              <input required onkeyup="mayusculas(this);" type="text" autocomplete="off" class="form-control form-control-sm text-center" id="nombrerepresentante" name="nombrerepresentante" placeholder="NANCY ISABEL"> 
            </div>
            <div class="col-md-4 px-2">
            <label for="apellidorepresentante" class="form-label"><i class="fas fa-fw fa-user text-primary"></i> APELLIDOS</label>
              <input required onkeyup="mayusculas(this);" type="text" autocomplete="off" class="form-control form-control-sm text-center" id="apellidorepresentante" name="apellidorepresentante" placeholder="RUBILAR ROJAS"> 
            </div>
            <div class="col-md-3 px-2">
              <label for="celularrepresentante" class="form-label"><i class="fas fa-fw fa-phone text-primary"></i> CELULAR</label>
              <input type="text" required autocomplete="off" class="form-control form-control-sm text-center" id="celularrepresentante" name="celularrepresentante" placeholder="945321578"> 
            </div>
            <div class="col-md-5 px-2">
              <label for="emailrepresentante" class="form-label"><i class="fas fa-fw fa-envelope text-primary"></i> EMAIL</label>
              <input type="text" required onkeyup="minusculas(this);" autocomplete="off" class="form-control form-control-sm text-center" id="emailrepresentante" name="emailrepresentante" placeholder="email@dominio.cl"> 
            </div>
            <div class="col-md-4 px-2">
                <label for="nacionrepresentante" class="form-label"><i class="fas fa-fw fa-flag text-primary"></i> NACIONALIDAD</label>
                <input required onkeyup="mayusculas(this);" type="text" autocomplete="off" class="form-control form-control-sm text-center" id="nacionrepresentante" name="nacionrepresentante"> 
            </div>
            <div class="col-md-12 mt-3 text-center">
              <button type="submit" class="btn btn-primary text-center"><i class="far fa-fw fa-file-pdf"></i> GENERAR SEGURO CON ESTOS DATOS</button>
            </div>
              <input type="hidden" class="form-control form-control-sm text-center" id="fechadeclaracion" name="fechadeclaracion" value="<?php echo date("Y-m-d"); ?>"> 
          </div>
        </div>
      </div>
      
    </div>
  </form>

</div>
<script src="js/jquery.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.min.js" integrity="sha512-XKa9Hemdy1Ui3KSGgJdgMyYlUg1gM+QhL6cnlyTe2qzMCYm4nAZ1PsVerQzTTXzonUR+dmswHqgJPuwCq1MaAg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js" integrity="sha512-wV7Yj1alIZDqZFCUQJy85VN+qvEIly93fIQAN7iqDFCPEucLCeNFz4r35FCo9s6WrpdDQPi80xbljXB8Bjtvcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/sa/sweetalert2.all.min.js"></script>
<script src="js/rut.js"></script>
<script src="js/funciones.js"></script>
</body>
</html>