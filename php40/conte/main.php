<?php 
session_start();
$mensaje = "";
if ($_SESSION["tipo_usuario"] == 3) {
  header("Location: papeleta.php");
}elseif ($_SESSION["tipo_usuario"] == 4) {
  header("Location: papeleta.php");
}
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
  <?php include '../includes/head.php'; ?>
  <body class="align-items-center py-4 bg-body-tertiary" style="color:#df3232; background-color:white !important;">
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
      <symbol id="check2" viewBox="0 0 16 16">
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
      </symbol>
      <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
      </symbol>
      <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
      </symbol>
      <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
      </symbol>
    </svg>
    <?php /*
    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
      <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
              id="bd-theme"
              type="button"
              aria-expanded="false"
              data-bs-toggle="dropdown"
              aria-label="Toggle theme (auto)">
        <svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#circle-half"></use></svg>
        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
      </button>
      <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#sun-fill"></use></svg>
            Light
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
            Dark
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#circle-half"></use></svg>
            Auto
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
      </ul>
    </div>

    */ ?>

    <?php include '../includes/menu.php'; ?>
    <div class="container pt-5">
      <?php // <form action="" method="post"> ?>
        <div class="container">
            <?php echo $mensaje; ?>

            <div class="container text-center">
                <div class="row" style="border: solid 1px #df3232; padding:20px;">
                <h2>Operaciones</h2>
                <br>
                <br>
                <br>
                <br>
                    <div class="col-4">
                        <h4>Unidad</h4>
                        <input type="text" id="unidad" class="form-control">
                    </div>
                    <div class="col-4">
                        <h4>Placa</h4>
                        <input type="text" id="placa" class="form-control" onkeyup="buscar_placa_papeleta()">
                    </div>
                    <div class="col-4">
                        <h4>Odometro</h4>
                        <input type="text" id="odometro" class="form-control">
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div style="border: solid 1px #df3232; padding:20px;">
              <br>
              <h2>Combustible</h2>
              <br>
              <div class="container text-center">
                  <div class="row">
                      <div class="col-4">
                          
                          <input class="form-check-input" type="radio" id="combustible" name="combustible" value="Empty">
                          <label>Empty</label>
                          <br><br>
                          
                          <input class="form-check-input" type="radio" id="combustible" name="combustible" value="3/8">
                          <label>3/8</label>
                          <br><br>
                          
                          <input class="form-check-input" type="radio" id="combustible" name="combustible" value="3/4">
                          <label>3/4</label>
                          <br><br>
                      </div>
                      <div class="col-4">
                          <input class="form-check-input" type="radio" id="combustible" name="combustible" value="1/8">
                          <label>1/8</label>
                          <br><br>
                          <input class="form-check-input" type="radio" id="combustible" name="combustible" value="1/2">
                          <label>1/2</label>
                          <br><br>
                          <input class="form-check-input" type="radio" id="combustible" name="combustible" value="7/8">
                          <label>7/8</label>
                          <br><br>
                      </div>
                      <div class="col-4">
                          
                          <input class="form-check-input" type="radio" id="combustible" name="combustible" value="1/4">
                          <label>1/4</label>
                          <br><br>
                          
                          <input class="form-check-input" type="radio" id="combustible" name="combustible" value="5/8">
                          <label>5/8</label>
                          <br><br>
                          
                          <input class="form-check-input" type="radio" id="combustible" name="combustible" value="Full">
                          <label>Full</label>
                          <br><br>
                      </div>
                  </div>
              </div>
            </div>
            <br>

            <div class="container text-left" style="border: solid 1px #df3232; padding:20px;">
                <div class="row">
                    <div class="col-4" style="border: solid 1px #df3232; padding:20px;">
                        <h2>Documentacion</h2>
                        <input class="form-check-input" type="checkbox" id="poliza_seguro" value="1">
                        <label>Poliza de seguro</label>
                        <br><br>
                        <input class="form-check-input" type="checkbox" id="placa_revisado" value="1"><label>Placa y Revisado</label>
                        <br><br>
                        <input class="form-check-input" type="checkbox" id="formato_danios_menores" value="1">
                        <label>Formato de Daños Menores</label>
                        <br><br>          
                        <input class="form-check-input" type="checkbox" id="registro_unico_vehicula" value="1">
                        <label>Registro Unico Vehicular</label>
                        <br><br>
                        <input class="form-check-input" type="checkbox" id="stiker_panapass" value="1">
                        <label>Sticker de Panapass</label>
                        <br><br>
                    </div>
                    <div class="col-4" style="border: solid 1px #df3232; padding:20px;">
                        <h2>Operatividad</h2>
                        <input class="form-check-input" type="checkbox" id="pito_claxon" value="1">
                        <label>Pito / Claxon</label>
                        <br><br>
                        <input class="form-check-input" type="checkbox" id="luces_direccionales" value="1">
                        <label>Luces Direccionales</label>
                        <br><br>
                        <input class="form-check-input" type="checkbox" id="luces_traseras" value="1">
                        <label>Luces Traseras</label>
                        <br><br>
                        <input class="form-check-input" type="checkbox" id="luces_delanteras" value="1">
                        <label>Luces Delanteras</label>
                        <br><br>
                        <input class="form-check-input" type="checkbox" id="aire_acondicionado" value="1">
                        <label>Aire Acondicionado</label>
                        <br><br>
                        <input class="form-check-input" type="checkbox" id="limpia_parabrisas" value="1">
                        <label>Limpia Parabrisas</label>
                        <br><br>
                    </div>
                    <div class="col-4" style="border: solid 1px #df3232; padding:20px;">
                        <h2>Accesorios</h2>
                        <input class="form-check-input" type="checkbox" id="alfombras" value="1">
                        <label>Alfombras</label>
                        <br><br>
                        <input class="form-check-input" type="checkbox" id="herramientas" value="1">
                        <label>Herramientas</label>
                        <br><br>
                        <input class="form-check-input" type="checkbox" id="antenas" value="1">
                        <label>Antena</label>
                        <br><br>
                        <input class="form-check-input" type="checkbox" id="placa_pipa" value="1">
                        <label>Palanca / Pipa</label>
                        <br><br>
                        <input class="form-check-input" type="checkbox" id="extintor" value="1">
                        <label>Extintor</label>
                        <br><br>
                        <input class="form-check-input" type="checkbox" id="gato" value="1">
                        <label>Gato</label>
                        <br><br>
                        <input class="form-check-input" type="checkbox" id="llanta_repuesto" value="1">
                        <label>Llanta de Repuesto</label>
                        <br><br>
                        <input class="form-check-input" type="checkbox" id="copas_1234" value="1">
                        <label>Copas 1 2 3 4</label>
                        <br><br>
                        <input class="form-check-input" type="checkbox" id="base_antena" value="1">
                        <label>Base de Antena</label>
                        <br><br>
                        <input class="form-check-input" type="checkbox" id="triangulo_seguridad" value="1">
                        <label>Triangulo de Seguridad</label>
                        <br><br>
                    </div>
                </div>
            </div>
            <br>
            <div class="row text-center" style="border: solid 1px #df3232; padding:20px;">
              <h2>Fotos</h2>
              <br>
              <div class="col-6" style="padding:20px;">
              <label for="file1" class="custom-file-upload">
                  <i class="camera-icon"></i>
              </label>
              <input type="file" id="file1" accept="image/*" class="hidden-file">
              <p id="frente" style="display:block"> FRENTE</p> 
                  <img id="preview1" width="150" >
              </div>
              <div class="col-6" style="padding:20px;">
              <label for="file2" class="custom-file-upload">
                  <i class="camera-icon"></i>
              </label>
                  <input type="file" id="file2" accept="image/*" class="hidden-file">
                  <p id="lado_conductor" style="display:block"> LADO DEL CONDUCTOR</p>
                  <img id="preview2" width="150">
              </div>
              <div class="col-6" style="padding:20px;">
              <label for="file3" class="custom-file-upload">
                  <i class="camera-icon"></i>
              </label>
                  <input type="file" id="file3" accept="image/*" class="hidden-file">
                  <p id="maletero" style="display:block"> MALETERO</p>
                  <img id="preview3" width="150">
              </div>
              <div class="col-6" style="padding:20px;">
              <label for="file4" class="custom-file-upload">
                  <i class="camera-icon"></i>
              </label>
                  <input type="file" id="file4" accept="image/*" class="hidden-file">
                  <p id="lado_pasajero" style="display:block"> LADO DEL PASAJERO</p>
                  <img id="preview4" width="150">
              </div>
          </div>
            <br>
            <div style="border: solid 1px #df3232; padding:20px;">
              <h2>Inspeccion</h2>
              <br>
              <div class="container text-center">
                  <canvas id="miCanvas" width="500" height="500" style="background-color:white;"></canvas><br>
                  <button class="btn btn-secondary" onclick="seleccionarFigura('triangulo')">Triángulo</button>
                  <button class="btn btn-secondary" onclick="seleccionarFigura('cuadrado')">Cuadrado</button>
                  <button class="btn btn-secondary" onclick="seleccionarFigura('circulo')">Círculo</button>
                  <button class="btn btn-secondary" onclick="limpiarCanvas()">Limpiar</button>
              </div>
              <br>
            </div>
            <br>
            <div class="container">
              <button type="button" class="btn btn-primary" style="width:100%" onclick="guardarCanvas()">Enviar</button>
            </div>
            <br>
            <br>
        </div>
      <?php // </form> ?>
    </div>
    <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js"></script>
    <?php include '../includes/foo.php'; ?>
    </body>
</html>

