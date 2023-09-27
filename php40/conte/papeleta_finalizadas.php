<?php 
session_start();
if (!isset($_SESSION["tipo_usuario"])) {
  header("Location: ../index.php");
}


include '../conn/conn.php';
$mensaje = "";

$where = "";


if (isset($_POST['eliminar_reg'])) { 
  $actulizar_counter = $pdo -> query("DELETE FROM papeleta_general WHERE id ='".$_POST['id']."'");

    $mensaje = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Registro Eliminado</strong> Se elimino el registro.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}

$where = ' (1=1) AND stat = 4';

if ($_SESSION["tipo_usuario"] == 3) {
  $where = " (1=1) AND stat = 11 ";
}

if ($_SESSION["tipo_usuario"] == 2) {
  $where = " (1=1) AND stat = 11 ";
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
    <div class="modal fade" id="heiker" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" style="max-width:100%;" style="">
        <div class="modal-content" style="background-color:white !important;">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Heiquer</h1>
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
      <div class="modal-dialog modal-xl" style="max-width:100%;">
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
            <h2>Papeletas Finalizadas</h2>

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
                                echo 'Esperando Salida';
                              }elseif ($row['stat'] == 3) {
                                echo 'Salida';
                              }elseif ($row['stat'] == 4) {
                                echo 'Finalizado';
                              }elseif ($row['stat'] == 5) {
                                echo 'Revision';
                              }  ?></td>
                        <td>
                        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ver_detallesModal" onclick="ver_detalles(<?php echo $row['id']; ?>)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66-2.043C4.12 3.238 5.88 2 8 2c2.12 0 3.88 1.238 5.168 3.957A13.134 13.134 0 0 0 14.828 8a13.134 13.134 0 0 0-1.66 2.043C11.88 12.762 10.12 14 8 14c-2.12 0-3.88-1.238-5.168-3.957A13.134 13.134 0 0 0 1.173 8z"/>
                                <path d="M8 5a3 3 0 1 0 0 6 3 3 0 0 0 0-6zm0 4a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                            </svg>
                        </a>
                        <!--<a type="button" class="btn btn-danger btn-icon" data-bs-toggle="modal" data-bs-target="#eliminar" onclick="eliminar(<?php echo $row['id']; ?>)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                            </svg>
                        </a>-->
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

    </script>
    </body>
</html>

