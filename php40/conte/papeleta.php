<?php 
session_start();
if (!isset($_SESSION["tipo_usuario"])) {
  header("Location: ../index.php");
}


include '../conn/conn.php';
$mensaje = "";

$where = "";
/*
if ($_SESSION["tipo_usuario"] == 1) {
   $where .= " stat in(1, 2, 3, 4, 5) ";
}elseif ($_SESSION["tipo_usuario"] == 2 || $_SESSION["tipo_usuario"] == 3) {
   $where .= " stat in(1) ";
}elseif ($_SESSION["tipo_usuario"] == 4) {
  $where .= " stat in(2, 3) ";
}*/

if (isset($_POST['counter_aprobado'])) {
    $actulizar_counter = $pdo -> query("UPDATE papeleta_general SET email_cliente = '".$_POST['email_cliente']."', 
                                                                    contrato = '".$_POST['contrato']."', 
                                                                    stat = 2, 
                                                                    sucursal = '".$_POST['sucursal']."', 
                                                                    id_user_counter = '".$_SESSION["id"]."' 
                                                                    WHERE 
                                                                    id ='".$_POST['id']."'");

    $mensaje = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Registro Exitoso</strong>.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

if (isset($_POST['eliminar_reg'])) { 
  $actulizar_counter = $pdo -> query("DELETE FROM papeleta_general WHERE id ='".$_POST['id']."'");

    $mensaje = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Registro Eliminado</strong> Se elimino el registro.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}

$where = ' (1=1) ';

if ($_SESSION["tipo_usuario"] == 3) {
  $where .= " AND stat = 1 ";
}

if ($_SESSION["tipo_usuario"] == 2) {
  $where .= " AND stat = 11 ";
}

if(isset($_POST['ing_sal']) && $_POST['ing_sal'] == 2){ 
  $where .= " AND stat = 2 ";
}elseif (isset($_POST['ing_sal']) && $_POST['ing_sal'] == 3) {
  $where .= " AND stat = 3 ";
}else{
  $where .= " AND stat in(1,2,3) ";
}

$ultimo_id = $pdo -> query("SELECT * FROM papeleta_general WHERE $where");
$rows = $ultimo_id->fetchAll(PDO::FETCH_ASSOC);
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
    </div> */ ?>

    <?php include '../includes/menu.php'; ?>
    <!-- Modal Counter -->
    <div class="modal fade" id="counter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content" style="background-color:white !important;">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Counter</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="" method="post">
            <div class="modal-body" id="counter_detail">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cancelar">Cerrar</button>
              <button type="submit" class="btn btn-success" name="counter_aprobado" id="enviar">Enviar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Modal heiker -->
    <div class="modal fade" id="heiker" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
      <div class="modal-dialog modal-xl" style="max-width:100%;">
        <div class="modal-content" style="background-color:white !important;">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Hiker</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <?php // <form action="" method="post"> ?>
            <div class="modal-body" id="heiker_detail">
            </div>
            <div class="modal-footer">
              <!--<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cancelar">Cerrar</button>
              <button type="submit" class="btn btn-success" name="counter_aprobado" id="enviar">Enviar</button>-->
            </div>
          <?php // </form> ?>
        </div>
      </div>
    </div>
    <!-- Modal heiker recibe -->
    <div class="modal fade" id="heiker_recibe" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" style="max-width:100%">
        <div class="modal-content" style="background-color:white !important;">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Recibir Vehiculo</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <?php // <form action="" method="post"> ?>
            <div class="modal-body" id="heiker_detail_recibe">
            </div>
            <div class="modal-footer">
              
            </div>
          <?php // </form> ?>
        </div>
      </div>
    </div>
    <!-- Modal Eliminar registro -->
    <div class="modal fade" id="eliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content" style="background-color:white !important;">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Counter</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="" method="post">
            <div class="modal-body" id="eliminar_detail">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cancelar">Cerrar</button>
              <button type="submit" class="btn btn-danger" name="eliminar_reg" id="enviar">Eliminar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Modal ver detalles -->
    <div class="modal fade" id="ver_detallesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" style="max-width:100%;">
        <div class="modal-content" style="background-color:white !important;">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Ver detalles</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
            <div class="modal-body" id="ver_detalles">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cancelar">Cerrar</button>
              <!--<button type="submit" class="btn btn-success" name="counter_aprobado" id="enviar">Enviar</button>-->
            </div>
        </div>
      </div>
    </div>
    <!-- Modal ver detalles revision -->
    <div class="modal fade" id="ver_detallesModalRevi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" style="max-width:100%;">
        <div class="modal-content" style="background-color:white !important;">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Ver Revision</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
            <div class="modal-body" id="ver_detalles_revision">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cancelar">Cerrar</button>
              <!--<button type="submit" class="btn btn-success" name="counter_aprobado" id="enviar">Enviar</button>-->
            </div>
        </div>
      </div>
    </div>

    <div class="container pt-5">
      <?php // <form action="" method="post"> ?>
        <div class="container">
            <?php echo $mensaje; ?>
            <h2>Papeletas</h2>

            <?php if ($_SESSION["tipo_usuario"] == 4) { ?>
            <form id="miFormulario" action="" method="post">
                <div style="text-align: center;">
                    <label for="salida">Check-out</label>
                    <input type="radio" name="ing_sal" id="salida" value="2" <?php if(isset($_POST['ing_sal']) && $_POST['ing_sal'] == 2){ echo 'checked'; } ?>>
                    <label for="ingreso">Check-In</label>
                    <input type="radio" name="ing_sal" id="ingreso" value="3" <?php if(isset($_POST['ing_sal']) && $_POST['ing_sal'] == 3){ echo 'checked'; } ?>>
                </div>
            </form>
            <?php } ?>

            <br>
            <br>
                <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Unidad</th>
                        <th>Placa</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $row) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['date_time']; ?></td>
                        <td><?php echo $row['unidad']; ?></td>
                        <td><?php echo $row['placa']; ?></td>
                        <td><?php if ($row['stat'] == 1) {
                              echo 'Esperando asigancion';
                              }elseif ($row['stat'] == 2) {
                                echo 'Esperando Check-out';
                              }elseif ($row['stat'] == 3) {
                                echo 'Esperando Check-in';
                              }elseif ($row['stat'] == 4) {
                                echo 'Finalizado';
                              }elseif ($row['stat'] == 5) {
                                echo 'Revision';
                              }  ?></td>
                        <td>
                        <?php if ($_SESSION["tipo_usuario"] == 3  || $_SESSION["tipo_usuario"] == 1) { ?>
                        <a type="button" class="btn btn-success btn-icon" data-bs-toggle="modal" data-bs-target="#counter" onclick="counter(<?php echo $row['id']; ?>)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                            </svg>
                        </a>
                        <?php } ?>
                        <?php if ($row['stat'] == 2 && $_SESSION["tipo_usuario"] == 4  || $_SESSION["tipo_usuario"] == 1) { ?>
                        <?php $inspec = "'".$row["imspeccion"]."'"; ?>
                        <a type="button" class="btn btn-warning btn-icon" data-bs-toggle="modal" data-bs-target="#heiker" onclick="heiker(<?php echo $row['id']; ?>, <?php echo $inspec; ?>)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                            </svg>
                        </a>
                        <?php } ?>
                        <?php if ($row['stat'] == 3 && $_SESSION["tipo_usuario"] == 4  || $_SESSION["tipo_usuario"] == 1) { ?>
                        <?php $inspec2 = "'".$row["imspeccion2"]."'"; ?>
                        <a type="button" class="btn btn-primary btn-icon" data-bs-toggle="modal" data-bs-target="#heiker_recibe" onclick="heiker_recibe(<?php echo $row['id']; ?>, <?php echo $inspec2; ?>)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                            </svg>
                        </a>
                        <?php } ?>
                        <?php if ($row['stat'] == 4) { ?>
                        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ver_detallesModal" onclick="ver_detalles(<?php echo $row['id']; ?>)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66-2.043C4.12 3.238 5.88 2 8 2c2.12 0 3.88 1.238 5.168 3.957A13.134 13.134 0 0 0 14.828 8a13.134 13.134 0 0 0-1.66 2.043C11.88 12.762 10.12 14 8 14c-2.12 0-3.88-1.238-5.168-3.957A13.134 13.134 0 0 0 1.173 8z"/>
                                <path d="M8 5a3 3 0 1 0 0 6 3 3 0 0 0 0-6zm0 4a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                            </svg>
                        </a>
                        <?php } ?>
                        <?php if ($row['stat'] == 5) { ?>
                        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ver_detallesModalRevi" onclick="ver_detalles_revision(<?php echo $row['id']; ?>)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66-2.043C4.12 3.238 5.88 2 8 2c2.12 0 3.88 1.238 5.168 3.957A13.134 13.134 0 0 0 14.828 8a13.134 13.134 0 0 0-1.66 2.043C11.88 12.762 10.12 14 8 14c-2.12 0-3.88-1.238-5.168-3.957A13.134 13.134 0 0 0 1.173 8z"/>
                                <path d="M8 5a3 3 0 1 0 0 6 3 3 0 0 0 0-6zm0 4a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                            </svg>
                        </a>
                        <?php } ?>
                        <a type="button" class="btn btn-danger btn-icon" data-bs-toggle="modal" data-bs-target="#eliminar" onclick="eliminar(<?php echo $row['id']; ?>)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                            </svg>
                        </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Unidad</th>
                        <th>Placa</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
      <?php // </form> ?>
    </div>
    <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        new DataTable('#example');

        function counter(x){

            fetch('papeleta_status.php?counter_detail=1&id=' + x)
            .then(response => {
                
                if (!response.ok) {
                throw new Error('Error de red al intentar fetch.');
                }
                return response.text();
            })
            .then(data => {
                
                document.querySelector("#counter_detail").innerHTML = data;
            })
            .catch(error => {
                
                console.error("Hubo un problema con la operación fetch:", error);
            });

        }

        function heiker(x, ruta){

            fetch('papeleta_status.php?heiker=1&id=' + x)
            .then(response => {
                if (!response.ok) {
                throw new Error('Error de red al intentar fetch.');
                }
                return response.text();
            })
            .then(data => {

                document.querySelector("#heiker_detail").innerHTML = data;

                var canvas = document.getElementById("miCanvas");
                var ctx = canvas.getContext("2d");
                var figuraSeleccionada = null;

                var imagen = new Image();
                imagen.src = "" + ruta + "";  
                imagen.onload = function() {
                ctx.drawImage(imagen, 0, 0, canvas.width, canvas.height);
                }
                canvas.addEventListener("click", function(e) {
                var rect = canvas.getBoundingClientRect();
                var x = e.clientX - rect.left;
                var y = e.clientY - rect.top;

                if (figuraSeleccionada === "triangulo") {
                    dibujarTriangulo(x, y);
                } else if (figuraSeleccionada === "cuadrado") {
                    dibujarCuadrado(x, y);
                } else if (figuraSeleccionada === "circulo") {
                    dibujarCirculo(x, y);
                }
                });
                function seleccionarFigura(figura) {
                figuraSeleccionada = figura;
                }
                function dibujarTriangulo(x, y) {
                ctx.beginPath();
                ctx.moveTo(x, y);
                ctx.lineTo(x + 25, y + 50);
                ctx.lineTo(x - 25, y + 50);
                ctx.closePath();
                
                ctx.lineWidth = 3;
                ctx.strokeStyle = 'blue';
                ctx.stroke();
                }
                function dibujarCuadrado(x, y) {
                ctx.beginPath();
                ctx.rect(x - 25, y - 25, 50, 50);
                
                ctx.lineWidth = 3;
                ctx.strokeStyle = 'green';
                ctx.stroke();
                }
                function dibujarCirculo(x, y) {
                ctx.beginPath();
                ctx.arc(x, y, 25, 0, Math.PI * 2);
                
                ctx.lineWidth = 3;
                ctx.strokeStyle = 'red';
                ctx.stroke();
                }
                function limpiarCanvas() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                ctx.drawImage(imagen, 0, 0, canvas.width, canvas.height);
                }

                document.getElementById('btnTriangulo').addEventListener('click', function() {
                    seleccionarFigura('triangulo');
                });
                document.getElementById('btnCuadrado').addEventListener('click', function() {
                    seleccionarFigura('cuadrado');
                });
                document.getElementById('btnCirculo').addEventListener('click', function() {
                    seleccionarFigura('circulo');
                });
                document.getElementById('btnLimpiar').addEventListener('click', limpiarCanvas);

                // firma digital

                /*
                  let firmaCanvas = document.getElementById("firmaCanvas");
                  let ctxFirma = firmaCanvas.getContext("2d");
                  let firmando = false; */

                  let firmaCanvas = document.getElementById("firmaCanvas");
                  let ctxFirma = firmaCanvas.getContext("2d");
                  let firmando = false;

                  /*firmaCanvas.addEventListener("mousedown", function(e) {
                      firmando = true;
                      dibujar(e);
                      console.log('maus abajo');
                  }); */

                  firmaCanvas.addEventListener("mousedown", function(e) {
                      firmando = true;
                      dibujar(e);
                  });

                  /*firmaCanvas.addEventListener("mousemove", dibujar);

                  firmaCanvas.addEventListener("mouseup", function() {
                      firmando = false;
                      ctxFirma.beginPath();
                      console.log('maus arriba');
                  }); */

                  firmaCanvas.addEventListener("mousemove", dibujar);
                  firmaCanvas.addEventListener("mouseup", function() {
                      firmando = false;
                      ctxFirma.beginPath();
                  });

                      // Eventos para touch
                      firmaCanvas.addEventListener("touchstart", function(e) {
                          firmando = true;
                          dibujar(e.touches[0]);  // Usamos e.touches[0] para obtener el primer toque
                          e.preventDefault();     // Prevenir el comportamiento por defecto
                      });
                      firmaCanvas.addEventListener("touchmove", function(e) {
                          dibujar(e.touches[0]);  // Usamos e.touches[0] para obtener el primer toque
                          e.preventDefault();     // Prevenir el comportamiento por defecto
                      });
                      firmaCanvas.addEventListener("touchend", function() {
                          firmando = false;
                          ctxFirma.beginPath();
                      });

                  function dibujar(e) {
                      if (!firmando) return;

                      console.log('entrando en dibujo');

                      var rect = firmaCanvas.getBoundingClientRect();
                      var x = e.clientX - rect.left;
                      var y = e.clientY - rect.top;

                      ctxFirma.lineWidth = 5;  // ajustar el grosor de la línea
                      ctxFirma.lineCap = "round"; // Esto hará que la línea sea más suave
                      ctxFirma.strokeStyle = "#000";  // Color de la firma

                      ctxFirma.lineTo(x, y);
                      ctxFirma.stroke();
                      ctxFirma.beginPath();
                      ctxFirma.moveTo(x, y);

                      console.log(x, y);
                  }

                  document.getElementById("btnLimpiarFirma").addEventListener("click", function() {
                      ctxFirma.clearRect(0, 0, firmaCanvas.width, firmaCanvas.height);
                  })

                  // fotos
                  /*
                  document.getElementById('file1').addEventListener('change', function() {
                      previewImage(this, 'preview1');
                      document.querySelector('#frente').style.display = "none";
                  });

                  document.getElementById('file2').addEventListener('change', function() {
                      previewImage(this, 'preview2');
                      document.querySelector('#lado_conductor').style.display = "none";
                  });

                  document.getElementById('file3').addEventListener('change', function() {
                      previewImage(this, 'preview3');
                      document.querySelector('#maletero').style.display = "none";
                  });

                  document.getElementById('file4').addEventListener('change', function() {
                      previewImage(this, 'preview4');
                      document.querySelector('#lado_pasajero').style.display = "none";
                  });*/

                  document.getElementById('file1').addEventListener('change', function() {
                      previewImage(this, 'preview1');
                      document.querySelector('#frente').style.display = "none";
                  });

                  document.getElementById('file2').addEventListener('change', function() {
                      previewImage(this, 'preview2');
                      document.querySelector('#lado_conductor').style.display = "none";
                  });

                  document.getElementById('file3').addEventListener('change', function() {
                      previewImage(this, 'preview3');
                      document.querySelector('#maletero').style.display = "none";
                  });

                  document.getElementById('file4').addEventListener('change', function() {
                      previewImage(this, 'preview4');
                      document.querySelector('#lado_pasajero').style.display = "none";
                  });

                  function previewImage(input, previewElementId) {
                      const file = input.files[0];
                      if (file) {
                          const img = document.getElementById(previewElementId);
                          img.src = URL.createObjectURL(file);
                          img.onload = function() {
                              URL.revokeObjectURL(img.src); 
                          }
                      }
                  }

            })

            .catch(error => {   
                console.error("Hubo un problema con la operación fetch:", error);
            });
        }

        function heiker_recibe(x, ruta){

          fetch('papeleta_status.php?heiker_recibe=1&id=' + x)
          .then(response => {
              if (!response.ok) {
              throw new Error('Error de red al intentar fetch.');
              }
              return response.text();
          })
          .then(data => {

              document.querySelector("#heiker_detail_recibe").innerHTML = data;

              var canvas = document.getElementById("miCanvas");
              var ctx = canvas.getContext("2d");
              var figuraSeleccionada = null;

              var imagen = new Image();
              imagen.src = "" + ruta + "";  
              imagen.onload = function() {
              ctx.drawImage(imagen, 0, 0, canvas.width, canvas.height);
              }

              function obtenerCoordenadas(e, canvasElem) {
                  if (e.touches) { // Si es un evento táctil
                      return {
                          x: e.touches[0].clientX - canvasElem.getBoundingClientRect().left,
                          y: e.touches[0].clientY - canvasElem.getBoundingClientRect().top
                      };
                  } else { // Si es un evento de mouse
                      return {
                          x: e.clientX - canvasElem.getBoundingClientRect().left,
                          y: e.clientY - canvasElem.getBoundingClientRect().top
                      };
                  }
              }

              canvas.addEventListener("click", function(e) {
              const coords = obtenerCoordenadas(e, canvas);
              var rect = canvas.getBoundingClientRect();
              var x = e.clientX - rect.left;
              var y = e.clientY - rect.top;

              if (figuraSeleccionada === "triangulo") {
                  dibujarTriangulo(x, y);
              } else if (figuraSeleccionada === "cuadrado") {
                  dibujarCuadrado(x, y);
              } else if (figuraSeleccionada === "circulo") {
                  dibujarCirculo(x, y);
              }
              });
              function seleccionarFigura(figura) {
              figuraSeleccionada = figura;
              }
              function dibujarTriangulo(x, y) {
              ctx.beginPath();
              ctx.moveTo(x, y);
              ctx.lineTo(x + 25, y + 50);
              ctx.lineTo(x - 25, y + 50);
              ctx.closePath();
              
              ctx.lineWidth = 3;
              ctx.strokeStyle = 'blue';
              ctx.stroke();
              }
              function dibujarCuadrado(x, y) {
              ctx.beginPath();
              ctx.rect(x - 25, y - 25, 50, 50);
              
              ctx.lineWidth = 3;
              ctx.strokeStyle = 'green';
              ctx.stroke();
              }
              function dibujarCirculo(x, y) {
              ctx.beginPath();
              ctx.arc(x, y, 25, 0, Math.PI * 2);
              
              ctx.lineWidth = 3;
              ctx.strokeStyle = 'red';
              ctx.stroke();
              }
              function limpiarCanvas() {
              ctx.clearRect(0, 0, canvas.width, canvas.height);
              ctx.drawImage(imagen, 0, 0, canvas.width, canvas.height);
              }

              document.getElementById('btnTriangulo').addEventListener('click', function() {
                  seleccionarFigura('triangulo');
              });
              document.getElementById('btnCuadrado').addEventListener('click', function() {
                  seleccionarFigura('cuadrado');
              });
              document.getElementById('btnCirculo').addEventListener('click', function() {
                  seleccionarFigura('circulo');
              });
              document.getElementById('btnLimpiar').addEventListener('click', limpiarCanvas);

              // firma digital

              let firmaCanvas = document.getElementById("firmaCanvas");
              let ctxFirma = firmaCanvas.getContext("2d");
              let firmando = false;

              function obtenerCoordenadas(e, canvas) {
                  var rect = canvas.getBoundingClientRect();
                  if (e.touches) {  // Si es un evento táctil
                      return {
                          x: e.touches[0].clientX - rect.left,
                          y: e.touches[0].clientY - rect.top
                      };
                  } else {  // Si es un evento de mouse
                      return {
                          x: e.clientX - rect.left,
                          y: e.clientY - rect.top
                      };
                  }
              }

              function empezarDibujo(e) {
                  firmando = true;
                  dibujar(e);
              }

              function dibujar(e) {
                  if (!firmando) return;

                  const coords = obtenerCoordenadas(e, firmaCanvas);

                  ctxFirma.lineWidth = 5;
                  ctxFirma.lineCap = "round";
                  ctxFirma.strokeStyle = "#000";

                  ctxFirma.lineTo(coords.x, coords.y);
                  ctxFirma.stroke();
                  ctxFirma.beginPath();
                  ctxFirma.moveTo(coords.x, coords.y);

                  console.log(coords.x, coords.y);
              }

              function terminarDibujo() {
                  firmando = false;
                  ctxFirma.beginPath();
              }

              // Eventos de mouse
              firmaCanvas.addEventListener("mousedown", empezarDibujo);
              firmaCanvas.addEventListener("mousemove", dibujar);
              firmaCanvas.addEventListener("mouseup", terminarDibujo);

              // Eventos táctiles
              firmaCanvas.addEventListener("touchstart", empezarDibujo);
              firmaCanvas.addEventListener("touchmove", function(e) {
                  e.preventDefault(); // Previene el scrolling cuando se dibuja
                  dibujar(e);
              });
              firmaCanvas.addEventListener("touchend", terminarDibujo);

              document.getElementById("btnLimpiarFirma").addEventListener("click", function() {
                  ctxFirma.clearRect(0, 0, firmaCanvas.width, firmaCanvas.height);
              });

                // fotos

                document.getElementById('file1').addEventListener('change', function() {
                    previewImage(this, 'preview1');
                    document.querySelector('#frente').style.display = "none";
                });

                document.getElementById('file2').addEventListener('change', function() {
                    previewImage(this, 'preview2');
                    document.querySelector('#lado_conductor').style.display = "none";
                });

                document.getElementById('file3').addEventListener('change', function() {
                    previewImage(this, 'preview3');
                    document.querySelector('#maletero').style.display = "none";
                });

                document.getElementById('file4').addEventListener('change', function() {
                    previewImage(this, 'preview4');
                    document.querySelector('#lado_pasajero').style.display = "none";
                });

                function previewImage(input, previewElementId) {
                    const file = input.files[0];
                    if (file) {
                        const img = document.getElementById(previewElementId);
                        img.src = URL.createObjectURL(file);
                        img.onload = function() {
                            URL.revokeObjectURL(img.src); 
                        }
                    }
                }

          })

          .catch(error => {   
              console.error("Hubo un problema con la operación fetch:", error);
          });
          }

       
          function eliminar(x){
            fetch('papeleta_status.php?eliminar=1&id=' + x)
            .then(response => {
             if (!response.ok) {
                throw new Error('Error de red al intentar fetch.');
                }
                return response.text();
            })
            .then(data => {
                document.querySelector("#eliminar_detail").innerHTML = data;
            })
            .catch(error => {   
                console.error("Hubo un problema con la operación fetch:", error);
            });
        }

        async function guardarCanvas() {

            document.getElementById('enviar_correo').disabled = true;

            let canvas = document.getElementById('miCanvas');
            let firma = document.getElementById('firmaCanvas');
            let formData = new FormData();

            formData.append('imagen', canvas.toDataURL());
            formData.append('firma', firma.toDataURL());

            formData.append('email', document.getElementById('email').value);
            formData.append('contrato', document.getElementById('contrato').value);
            formData.append('sucursal', document.getElementById('sucursal').value);
            formData.append('unidad', document.getElementById('unidad').value);
            formData.append('placa', document.getElementById('placa').value);
            formData.append('odometro', document.getElementById('odometro').value);
            let combustible = document.querySelector('input[name="combustible"]:checked');
            formData.append('combustible', combustible ? combustible.value : "");

            function getCheckedValue(id) {
                let element = document.getElementById(id);
                return element ? element.checked : false;
            }

            formData.append('poliza_seguro', getCheckedValue('poliza_seguro') ? 1 : 0);
            formData.append('placa_revisado', getCheckedValue('placa_revisado') ? 1 : 0);
            formData.append('formato_danios_menores', getCheckedValue('formato_danios_menores') ? 1 : 0);
            formData.append('registro_unico_vehicula', getCheckedValue('registro_unico_vehicula') ? 1 : 0);
            formData.append('stiker_panapass', getCheckedValue('stiker_panapass') ? 1 : 0);
            formData.append('pito_claxon', getCheckedValue('pito_claxon') ? 1 : 0);
            formData.append('luces_direccionales', getCheckedValue('luces_direccionales') ? 1 : 0);
            formData.append('luces_traseras', getCheckedValue('luces_traseras') ? 1 : 0);
            formData.append('luces_delanteras', getCheckedValue('luces_delanteras') ? 1 : 0);
            formData.append('aire_acondicionado', getCheckedValue('aire_acondicionado') ? 1 : 0); 
            formData.append('limpia_parabrisas', getCheckedValue('limpia_parabrisas') ? 1 : 0);
            formData.append('alfombras', getCheckedValue('alfombras') ? 1 : 0); 
            formData.append('herramientas', getCheckedValue('herramientas') ? 1 : 0);
            formData.append('antenas', getCheckedValue('antenas') ? 1 : 0);
            formData.append('placa_pipa', getCheckedValue('placa_pipa') ? 1 : 0);
            formData.append('extintor', getCheckedValue('extintor') ? 1 : 0);
            formData.append('gato', getCheckedValue('gato') ? 1 : 0);
            formData.append('llanta_repuesto', getCheckedValue('llanta_repuesto') ? 1 : 0);
            formData.append('copas_1234', getCheckedValue('copas_1234') ? 1 : 0);
            formData.append('base_antena', getCheckedValue('base_antena') ? 1 : 0);
            formData.append('triangulo_seguridad', getCheckedValue('triangulo_seguridad') ? 1 : 0);
            /*
            formData.append('foto1', document.getElementById('file1').files[0]);
            formData.append('foto2', document.getElementById('file2').files[0]);
            formData.append('foto3', document.getElementById('file3').files[0]);
            formData.append('foto4', document.getElementById('file4').files[0]); */

            const blob1 = await getResizedImageBlob(document.getElementById('file1'), 400, 400);
            formData.append('foto1', blob1);

            const blob2 = await getResizedImageBlob(document.getElementById('file2'), 400, 400);
            formData.append('foto2', blob2);

            const blob3 = await getResizedImageBlob(document.getElementById('file3'), 400, 400);
            formData.append('foto3', blob3);

            const blob4 = await getResizedImageBlob(document.getElementById('file4'), 400, 400);
            formData.append('foto4', blob4);

            formData.append('heiker_guardar', '1');
            formData.append('id', document.getElementById('id').value);

            let respuesta = await fetch('papeleta_status.php', {
                method: 'POST',
                body: formData
            });

            if(respuesta.ok) {
                let data = await respuesta.text();
                alert('Actualizado con éxito!');
                console.log(data);
                location.reload();
            } else {
                console.error("Error en la respuesta del servidor:", respuesta.statusText);
            }
        }

        async function enviar_revicion(){

            let canvas = document.getElementById('miCanvas');
            let firma = document.getElementById('firmaCanvas');
            let formData = new FormData();

            formData.append('imagen', canvas.toDataURL());
            formData.append('firma', firma.toDataURL());

            formData.append('email', document.getElementById('email').value);
            formData.append('contrato', document.getElementById('contrato').value);
            formData.append('sucursal', document.getElementById('sucursal').value);
            formData.append('unidad', document.getElementById('unidad').value);
            formData.append('placa', document.getElementById('placa').value);
            formData.append('odometro', document.getElementById('odometro').value);
            let combustible = document.querySelector('input[name="combustible"]:checked');
            formData.append('combustible', combustible ? combustible.value : "");

            function getCheckedValue(id) {
                let element = document.getElementById(id);
                return element ? element.checked : false;
            }

            formData.append('poliza_seguro', getCheckedValue('poliza_seguro') ? 1 : 0);
            formData.append('placa_revisado', getCheckedValue('placa_revisado') ? 1 : 0);
            formData.append('formato_danios_menores', getCheckedValue('formato_danios_menores') ? 1 : 0);
            formData.append('registro_unico_vehicula', getCheckedValue('registro_unico_vehicula') ? 1 : 0);
            formData.append('stiker_panapass', getCheckedValue('stiker_panapass') ? 1 : 0);
            formData.append('pito_claxon', getCheckedValue('pito_claxon') ? 1 : 0);
            formData.append('luces_direccionales', getCheckedValue('luces_direccionales') ? 1 : 0);
            formData.append('luces_traseras', getCheckedValue('luces_traseras') ? 1 : 0);
            formData.append('luces_delanteras', getCheckedValue('luces_delanteras') ? 1 : 0);
            formData.append('aire_acondicionado', getCheckedValue('aire_acondicionado') ? 1 : 0); 
            formData.append('limpia_parabrisas', getCheckedValue('limpia_parabrisas') ? 1 : 0);
            formData.append('alfombras', getCheckedValue('alfombras') ? 1 : 0); 
            formData.append('herramientas', getCheckedValue('herramientas') ? 1 : 0);
            formData.append('antenas', getCheckedValue('antenas') ? 1 : 0);
            formData.append('placa_pipa', getCheckedValue('placa_pipa') ? 1 : 0);
            formData.append('extintor', getCheckedValue('extintor') ? 1 : 0);
            formData.append('gato', getCheckedValue('gato') ? 1 : 0);
            formData.append('llanta_repuesto', getCheckedValue('llanta_repuesto') ? 1 : 0);
            formData.append('copas_1234', getCheckedValue('copas_1234') ? 1 : 0);
            formData.append('base_antena', getCheckedValue('base_antena') ? 1 : 0);
            formData.append('triangulo_seguridad', getCheckedValue('triangulo_seguridad') ? 1 : 0);
            /*
            formData.append('foto1', document.getElementById('file1').files[0]);
            formData.append('foto2', document.getElementById('file2').files[0]);
            formData.append('foto3', document.getElementById('file3').files[0]);
            formData.append('foto4', document.getElementById('file4').files[0]);  */

            const blob1 = await getResizedImageBlob(document.getElementById('file1'), 400, 400);
            formData.append('foto1', blob1);

            const blob2 = await getResizedImageBlob(document.getElementById('file2'), 400, 400);
            formData.append('foto2', blob2);

            const blob3 = await getResizedImageBlob(document.getElementById('file3'), 400, 400);
            formData.append('foto3', blob3);

            const blob4 = await getResizedImageBlob(document.getElementById('file4'), 400, 400);
            formData.append('foto4', blob4);

            formData.append('mandar_revicion', '1');
            formData.append('id', document.getElementById('id').value);

            console.log('antes de entrar al fetch');
            let respuesta = await fetch('papeleta_status.php', {
                method: 'POST',
                body: formData
            });

            if(respuesta.ok) {
                let data = await respuesta.text();

                console.log(data);
                alert('Enviado a Revicion!');
                location.reload();
            } else {
                console.error("Error en la respuesta del servidor:", respuesta.statusText);
            }

        }

        async function finalizar() {
            let canvas = document.getElementById('miCanvas');
            let firma = document.getElementById('firmaCanvas');
            let formData = new FormData();

            formData.append('imagen', canvas.toDataURL());
            formData.append('firma', firma.toDataURL());

            formData.append('email', document.getElementById('email').value);
            formData.append('contrato', document.getElementById('contrato').value);
            formData.append('sucursal', document.getElementById('sucursal').value);
            formData.append('unidad', document.getElementById('unidad').value);
            formData.append('placa', document.getElementById('placa').value);
            formData.append('odometro', document.getElementById('odometro').value);
            let combustible = document.querySelector('input[name="combustible"]:checked');
            formData.append('combustible', combustible ? combustible.value : "");

            function getCheckedValue(id) {
                let element = document.getElementById(id);
                return element ? element.checked : false;
            }

            formData.append('poliza_seguro', getCheckedValue('poliza_seguro') ? 1 : 0);
            formData.append('placa_revisado', getCheckedValue('placa_revisado') ? 1 : 0);
            formData.append('formato_danios_menores', getCheckedValue('formato_danios_menores') ? 1 : 0);
            formData.append('registro_unico_vehicula', getCheckedValue('registro_unico_vehicula') ? 1 : 0);
            formData.append('stiker_panapass', getCheckedValue('stiker_panapass') ? 1 : 0);
            formData.append('pito_claxon', getCheckedValue('pito_claxon') ? 1 : 0);
            formData.append('luces_direccionales', getCheckedValue('luces_direccionales') ? 1 : 0);
            formData.append('luces_traseras', getCheckedValue('luces_traseras') ? 1 : 0);
            formData.append('luces_delanteras', getCheckedValue('luces_delanteras') ? 1 : 0);
            formData.append('aire_acondicionado', getCheckedValue('aire_acondicionado') ? 1 : 0); 
            formData.append('limpia_parabrisas', getCheckedValue('limpia_parabrisas') ? 1 : 0);
            formData.append('alfombras', getCheckedValue('alfombras') ? 1 : 0); 
            formData.append('herramientas', getCheckedValue('herramientas') ? 1 : 0);
            formData.append('antenas', getCheckedValue('antenas') ? 1 : 0);
            formData.append('placa_pipa', getCheckedValue('placa_pipa') ? 1 : 0);
            formData.append('extintor', getCheckedValue('extintor') ? 1 : 0);
            formData.append('gato', getCheckedValue('gato') ? 1 : 0);
            formData.append('llanta_repuesto', getCheckedValue('llanta_repuesto') ? 1 : 0);
            formData.append('copas_1234', getCheckedValue('copas_1234') ? 1 : 0);
            formData.append('base_antena', getCheckedValue('base_antena') ? 1 : 0);
            formData.append('triangulo_seguridad', getCheckedValue('triangulo_seguridad') ? 1 : 0);

            /*
            formData.append('foto1', document.getElementById('file1').files[0]);
            formData.append('foto2', document.getElementById('file2').files[0]);
            formData.append('foto3', document.getElementById('file3').files[0]);
            formData.append('foto4', document.getElementById('file4').files[0]);  */

            const blob1 = await getResizedImageBlob(document.getElementById('file1'), 400, 400);
            formData.append('foto1', blob1);

            const blob2 = await getResizedImageBlob(document.getElementById('file2'), 400, 400);
            formData.append('foto2', blob2);

            const blob3 = await getResizedImageBlob(document.getElementById('file3'), 400, 400);
            formData.append('foto3', blob3);

            const blob4 = await getResizedImageBlob(document.getElementById('file4'), 400, 400);
            formData.append('foto4', blob4);

            formData.append('finalizar', '1');
            formData.append('id', document.getElementById('id').value);

            console.log('antes de entrar al fetch');
            let respuesta = await fetch('papeleta_status.php', {
                method: 'POST',
                body: formData
            });

            if(respuesta.ok) {
                let data = await respuesta.text();
                alert('Finalizado con éxito!');
                location.reload();
            } else {
                console.error("Error en la respuesta del servidor:", respuesta.statusText);
            }
        }

        async function ver_detalles(x){

          fetch('papeleta_status.php?ver_detalles=1&id=' + x)
            .then(response => {
                
                if (!response.ok) {
                throw new Error('Error de red al intentar fetch.');
                }
                return response.text();
            })
            .then(data => {
                
                document.querySelector("#ver_detalles").innerHTML = data;
            })
            .catch(error => {
                
                console.error("Hubo un problema con la operación fetch:", error);
            });

        }

        function ver_detalles_revision(x){

          fetch('papeleta_status.php?ver_detalles_revision=1&id=' + x)
            .then(response => {
                
                if (!response.ok) {
                throw new Error('Error de red al intentar fetch.');
                }
                return response.text();
            })
            .then(data => {
                
                document.querySelector("#ver_detalles_revision").innerHTML = data;
            })
            .catch(error => {
                
                console.error("Hubo un problema con la operación fetch:", error);
            });

          }

          document.addEventListener('DOMContentLoaded', function() {
              var radios = document.querySelectorAll('input[type="radio"][name="ing_sal"]');
              
              radios.forEach(function(radio) {
                  radio.addEventListener('change', function() {
                      document.getElementById('miFormulario').submit();
                  });
              });
          });

          function previewImage(input, previewId) {
              const file = input.files[0];
              if (file) {
                  resizeImage(file, 800, 800, function (resizedImgBase64) {
                      // Muestra la imagen en la vista previa.
                      const preview = document.getElementById(previewId);
                      preview.src = resizedImgBase64;
                  });
              }
          }

          function resizeImage(file, maxWidth, maxHeight, callback) {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function (event) {
                const img = new Image();
                img.src = event.target.result;
                img.onload = function () {
                    let width = img.width;
                    let height = img.height;

                    if (width > height) {
                        if (width > maxWidth) {
                            height *= maxWidth / width;
                            width = maxWidth;
                        }
                    } else {
                        if (height > maxHeight) {
                            width *= maxHeight / height;
                            height = maxHeight;
                        }
                    }
                    
                    const canvas = document.createElement('canvas');
                    canvas.width = width;
                    canvas.height = height;
                    canvas.getContext('2d').drawImage(img, 0, 0, width, height);
                    
                    callback(canvas.toDataURL());
                }
            }
        }

        async function getResizedImageBlob(fileInput, maxWidth, maxHeight) {
          const file = fileInput.files[0];  
          console.log(file);
          return new Promise((resolve, reject) => {
              resizeImage(file, maxWidth, maxHeight, function (resizedImgBase64) {
                    const byteString = atob(resizedImgBase64.split(',')[1]);
                    const arrayBuffer = new ArrayBuffer(byteString.length);
                    const int8Array = new Uint8Array(arrayBuffer);
                    for (let i = 0; i < byteString.length; i++) {
                        int8Array[i] = byteString.charCodeAt(i);
                    }
                    const blob = new Blob([int8Array], { type: "image/jpeg" });
                    resolve(blob);
                });
            });
        }

    </script>
    </body>
</html>

