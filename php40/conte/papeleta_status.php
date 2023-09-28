<?php 
session_start();
include '../conn/conn.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once '../vendor/autoload.php';

if (isset($_GET['counter_detail'])) { ?>
    
<label for="">Email</label>
<input type="text" name="email_cliente" class="form-control" require>
<label for="">Contrato</label>
<input type="text" name="contrato" class="form-control" require>
<label for="">Sucursal</label>
<input type="text" name="sucursal" class="form-control">
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

<?php }elseif (isset($_GET['eliminar'])) { ?>
    <p style="color:red;">Esta seguro que desea eliminar este registro.</p>
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
<?php 

    }elseif (isset($_GET['heiker'])) { 

        $reg_pape = $pdo -> query("SELECT * FROM papeleta_general WHERE id = '".$_GET['id']."'");
        $rows = $reg_pape->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $key => $value) {
?>
    
    <div class="container">
        
        <div class="container text-center" style="border: solid 1px #df3232; padding:20px;">
        <h2>Counter</h2>
        <br>
            <div class="row">
                <div class="col-4">
                    <h4>Email del cliente</h4>
                    <input type="text" id="email" class="form-control" value="<?php echo $value['email_cliente']; ?>" readonly>
                </div>
                <div class="col-4">
                    <h4>Contrato</h4>
                    <input type="text" id="contrato" class="form-control" value="<?php echo $value['contrato']; ?>" readonly>
                </div>
                <div class="col-4">
                    <h4>Sucursal</h4>
                    <input type="text" id="sucursal" class="form-control" value="<?php echo $value['sucursal']; ?>" readonly>
                </div>
            </div>
        </div>
        <br>
        
        <div class="container text-center" style="border: solid 1px #df3232; padding:20px;">
        <h2>Operaciones</h2>
        <br>
            <div class="row">
                <div class="col-4">
                    <h4>Unidad</h4>
                    <input type="text" id="unidad" class="form-control" value="<?php echo $value['unidad']; ?>" readonly>
                </div>
                <div class="col-4">
                    <h4>Placa</h4>
                    <input type="text" id="placa" class="form-control" value="<?php echo $value['placa']; ?>" readonly>
                </div>
                <div class="col-4">
                    <h4>Odometro</h4>
                    <input type="text" id="odometro" class="form-control" value="<?php echo $value['odometro']; ?>" min="<?php echo $value['odometro']; ?>">
                </div>
            </div>
        </div>
        <br>
        
        <div class="container text-center" style="border: solid 1px #df3232; padding:20px;">
        <h2>Combustible</h2>
        <br>
            <div class="row">
                <div class="col-4">
                    <input class="form-check-input" type="radio" id="combustible" name="combustible" value="Empty" <?php echo ($value['combustible'] == "Empty" ? "checked" : ""); ?>>
                    <label>Empty</label>
                    <br><br>
                    <input class="form-check-input" type="radio" id="combustible" name="combustible" value="3/8" <?php echo ($value['combustible'] == "3/8" ? "checked" : ""); ?>>
                    <label>3/8</label>
                    <br><br>
                    <input class="form-check-input" type="radio" id="combustible" name="combustible" value="3/4" <?php echo ($value['combustible'] == "3/4" ? "checked" : ""); ?>>
                    <label>3/4</label>
                    <br><br>
                </div>
                <div class="col-4">
                    <input class="form-check-input" type="radio" id="combustible" name="combustible" value="1/8" <?php echo ($value['combustible'] == "1/8" ? "checked" : ""); ?>>
                    <label>1/8</label>
                    <br><br>
                    <input class="form-check-input" type="radio" id="combustible" name="combustible" value="1/2" <?php echo ($value['combustible'] == "1/2" ? "checked" : ""); ?>>
                    <label>1/2</label>
                    <br><br>
                    <input class="form-check-input" type="radio" id="combustible" name="combustible" value="7/8" <?php echo ($value['combustible'] == "7/8" ? "checked" : ""); ?>>
                    <label>7/8</label>
                    <br><br>
                </div>
                <div class="col-4">
                    <input class="form-check-input" type="radio" id="combustible" name="combustible" value="1/4" <?php echo ($value['combustible'] == "1/4" ? "checked" : ""); ?>>
                    <label>1/4</label>
                    <br><br>
                    <input class="form-check-input" type="radio" id="combustible" name="combustible" value="5/8" <?php echo ($value['combustible'] == "5/8" ? "checked" : ""); ?>>
                    <label>5/8</label>
                    <br><br>
                    <input class="form-check-input" type="radio" id="combustible" name="combustible" value="Full" <?php echo ($value['combustible'] == "Full" ? "checked" : ""); ?>>
                    <label>Full</label>
                    <br><br>
                </div>

            </div>
        </div>
        <br>
        <div class="container text-left" style="border: solid 1px #df3232; padding:20px;">
            <div class="row">
                <div class="col-4" style="border: solid 1px #df3232;">
                    <h2>Documentacion</h2>
                    <input class="form-check-input" type="checkbox" id="poliza_seguro" value="1" <?php echo ($value['poliza_seguro'] == 1 ? 'checked' : ''); ?>>
                    <label>Poliza de seguro</label>
                    <br><br>
                    <input class="form-check-input" type="checkbox" id="placa_revisado" value="1" <?php echo ($value['placa_revisado'] == 1 ? 'checked' : ''); ?>>
                    <label>Placa y Revisado</label>
                    <br><br>
                    <input class="form-check-input" type="checkbox" id="formato_danios_menores" value="1" <?php echo ($value['formato_danios_menores'] == 1 ? 'checked' : ''); ?>>
                    <label>Formato de Daños Menor</label>
                    <br><br>
                    <input class="form-check-input" type="checkbox" id="registro_unico_vehicula" value="1" <?php echo ($value['registro_unico_vehicula'] == 1 ? 'checked' : ''); ?>>
                    <label>Registro Unico Vehicular</label>
                    <br><br>
                    <input class="form-check-input" type="checkbox" id="stiker_panapass" value="1" <?php echo ($value['stiker_panapass'] == 1 ? 'checked' : ''); ?>>
                    <label>Sticker de Panapass</label>
                    <br><br>
                </div>
                <div class="col-4" style="border: solid 1px #df3232;">
                    <h2>Operatividad</h2>
                    
                    <input class="form-check-input" type="checkbox" id="pito_claxon" value="1" <?php echo ($value['pito_claxon'] == 1 ? 'checked' : ''); ?>>
                    <label>Pito / Claxon</label>
                    <br><br>
                    
                    <input class="form-check-input" type="checkbox" id="luces_direccionales" value="1" <?php echo ($value['luces_direccionales'] == 1 ? 'checked' : ''); ?>>
                    <label>Luces Direccionales</label>
                    <br><br>
                    
                    <input class="form-check-input" type="checkbox" id="luces_traseras" value="1" <?php echo ($value['luces_traseras'] == 1 ? 'checked' : ''); ?>>
                    <label>Luces Traseras</label>
                    <br><br>
                    
                    <input class="form-check-input" type="checkbox" id="luces_delanteras" value="1" <?php echo ($value['luces_delanteras'] == 1 ? 'checked' : ''); ?>>
                    <label>Luces Delanteras</label>
                    <br><br>
                    
                    <input class="form-check-input" type="checkbox" id="aire_acondicionado" value="1" <?php echo ($value['aire_acondicionado'] == 1 ? 'checked' : ''); ?>>
                    <label>Aire Acondicionado</label>
                    <br><br>
                    
                    <input class="form-check-input" type="checkbox" id="limpia_parabrisas" value="1" <?php echo ($value['limpia_parabrisas'] == 1 ? 'checked' : ''); ?>>
                    <label>Limpia Parabrisas</label>
                    <br><br>

                </div>
                <div class="col-4" style="border: solid 1px #df3232;">
                    <h2>Accesorios</h2>
                    
                    <input class="form-check-input" type="checkbox" id="alfombras" value="1" <?php echo ($value['alfombras'] == 1 ? 'checked' : ''); ?>>
                    <label>Alfombras</label>
                    <br><br>
                    
                    <input class="form-check-input" type="checkbox" id="herramientas" value="1" <?php echo ($value['herramientas'] == 1 ? 'checked' : ''); ?>>
                    <label>Herramientas</label>
                    <br><br>
                    
                    <input class="form-check-input" type="checkbox" id="antenas" value="1" <?php echo ($value['antenas'] == 1 ? 'checked' : ''); ?>>
                    <label>Antena</label>
                    <br><br>
                    
                    <input class="form-check-input" type="checkbox" id="placa_pipa" value="1" <?php echo ($value['placa_pipa'] == 1 ? 'checked' : ''); ?>>
                    <label>Palanca / Pipa</label>
                    <br><br>
                    
                    <input class="form-check-input" type="checkbox" id="extintor" value="1" <?php echo ($value['extintor'] == 1 ? 'checked' : ''); ?>>
                    <label>Extintor</label>
                    <br><br>
                    
                    <input class="form-check-input" type="checkbox" id="gato" value="1" <?php echo ($value['gato'] == 1 ? 'checked' : ''); ?>>
                    <label>Gato</label>
                    <br><br>
                    
                    <input class="form-check-input" type="checkbox" id="llanta_repuesto" value="1" <?php echo ($value['llanta_repuesto'] == 1 ? 'checked' : ''); ?>>
                    <label>Llanta de Repuesto</label>
                    <br><br>
                    
                    <input class="form-check-input" type="checkbox" id="copas_1234" value="1" <?php echo ($value['copas_1234'] == 1 ? 'checked' : ''); ?>>
                    <label>Copas 1 2 3 4</label>
                    <br><br>
                    
                    <input class="form-check-input" type="checkbox" id="base_antena" value="1" <?php echo ($value['base_antena'] == 1 ? 'checked' : ''); ?>>
                    <label>Base de Antena</label>
                    <br><br>
                    
                    <input class="form-check-input" type="checkbox" id="triangulo_seguridad" value="1" <?php echo ($value['triangulo_seguridad'] == 1 ? 'checked' : ''); ?>>
                    <label>Triangulo de Seguridad</label>
                    <br><br>
                </div>
            </div>
        </div>
        <br>
        <div class="container text-center" style="border: solid 1px #df3232; padding:20px;">
        <h2>Inspeccion</h2>
        <br>
            <canvas id="miCanvas" width="500" height="500" style="background-color:white;"></canvas><br>
            <button class="btn btn-secondary" id="btnTriangulo">Triángulo</button>
            <button class="btn btn-secondary" id="btnCuadrado">Cuadrado</button>
            <button class="btn btn-secondary" id="btnCirculo">Círculo</button>
            <button class="btn btn-secondary" id="btnLimpiar">Limpiar</button>
        </div>
        <br>

        <div class="row text-center" style="border: solid 1px #df3232; padding:20px;">
        <h2>Fotos de Operaciones</h2>
        <br>
            <div class="col-6" style="padding:20px;">
                <img id="" width="250" src="<?php echo $value['op_foto_frente']; ?>">
            </div>
            <div class="col-6" style="padding:20px;">
                <img id="" width="250" src="<?php echo $value['op_foto_coductor']; ?>">
            </div>
            <div class="col-6" style="padding:20px;">
                <img id="" width="250" src="<?php echo $value['op_foto_cajuela']; ?>">
            </div>
            <div class="col-6" style="padding:20px;">
                <img id="" width="250" src="<?php echo $value['op_foto_pasajero']; ?>">
            </div>
        </div>
        <br>

        <div class="row text-center" style="border: solid 1px #df3232; padding:20px;">
            <h2>Fotos Check-out</h2>
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
        <div style="text-align: center;" style="border: solid 1px #df3232; padding:20px;">
            <h2>Firma de Cliente</h2>
            <br>
            <canvas id="firmaCanvas" width="500" height="250" style="border: 1px solid #000; z-index:9999"></canvas> <br>
            <button id="btnLimpiarFirma" class="btn btn-secondary">Limpiar Firma</button>
        </div>
        <br>
        <div class="container">
            <br>
            <br>
            <button id="enviar_correo" type="button" class="btn btn-primary" style="width:100%" onclick="guardarCanvas()">Enviar</button>
            <input type="hidden" id="id" value="<?php echo $_GET['id']; ?>">
        </div>
        <br>
        <br>
    </div>

<?php }

}elseif (isset($_POST['heiker_guardar'])) {

    $rutaPapeleta = '../img/inspeccion2/';
    $rutaFirmas = '../img/firmas/';
    $fotosCarros = '../img/fotos_ins_car/';

    $uploadedFileNames = [];
    $fileFields = ['foto1', 'foto2', 'foto3', 'foto4'];

    foreach ($fileFields as $field) {
        
        if(isset($_FILES[$field])) {
            $fileName = generarCadenaAleatoria(10) . basename($_FILES[$field]["name"]);
            $targetFilePath = $fotosCarros . $fileName;
            
            if(move_uploaded_file($_FILES[$field]["tmp_name"], $targetFilePath)) {
                $uploadedFileNames[$field] = $targetFilePath;

                if ($uploadedFileNames[$field] == $uploadedFileNames['foto1']) {
                    $foto_frente = $uploadedFileNames[$field];
                }elseif ($uploadedFileNames[$field] == $uploadedFileNames['foto2']) {
                    $foto_conducto = $uploadedFileNames[$field];
                }elseif ($uploadedFileNames[$field] == $uploadedFileNames['foto3']) {
                    $foto_maletero = $uploadedFileNames[$field];
                }elseif ($uploadedFileNames[$field] == $uploadedFileNames['foto4']) {
                    $foto_pasajero = $uploadedFileNames[$field];
                }

            } else {
                echo json_encode(["message" => "Error al subir el archivo " . $field]);
                exit;
            }
        }
    }

    if (isset($_POST['imagen'])) {
        $imagen = $_POST['imagen'];
        $imagen_base64 = preg_replace('#^data:image/\w+;base64,#i', '', $imagen);
        $imagen_binaria = base64_decode($imagen_base64);
        $nombre_archivo_pape = uniqid() . '.png';
        if (file_put_contents($rutaPapeleta . $nombre_archivo_pape, $imagen_binaria)) {
            $response["success"] = true;
            $response["message"] = "Datos obtenidos con éxito";
        } else {
            $response["error"] = 'No se pudo guardar la imagen.';
        }
    } else {
        $response["error"] = 'No se ha enviado una imagen.';
    }

    if (isset($_POST['firma'])) {
        $firma = $_POST['firma'];
        $imagen_base64 = preg_replace('#^data:image/\w+;base64,#i', '', $firma);
        $imagen_binaria = base64_decode($imagen_base64);
        $nombre_archivo_firma = uniqid() . '.png';
        if (file_put_contents($rutaFirmas . $nombre_archivo_firma, $imagen_binaria)) {
            $response["success"] = true;
            $response["message"] = "Datos obtenidos con éxito";
        } else {
            $response["error"] = 'No se pudo guardar la imagen.';
        }
    } else {
        $response["error"] = 'No se ha enviado una imagen.';
    }

    $imagen = $rutaPapeleta.$nombre_archivo_pape;
    $firma = $rutaFirmas.$nombre_archivo_firma;
    $email = $_POST['email'];
    $contrato = $_POST['contrato'];
    $sucursal = $_POST['sucursal'];
    $unidad = $_POST['unidad'];
    $placa = $_POST['placa'];
    $odometro = $_POST['odometro'];
    $combustible = $_POST['combustible'];
    $poliza_seguro = $_POST['poliza_seguro'];
    $placa_revisado = $_POST['placa_revisado'];
    $formato_danios_menores = $_POST['formato_danios_menores'];
    $registro_unico_vehicula = $_POST['registro_unico_vehicula'];
    $stiker_panapass = $_POST['stiker_panapass'];
    $pito_claxon = $_POST['pito_claxon'];
    $luces_direccionales = $_POST['luces_direccionales'];
    $luces_traseras = $_POST['luces_traseras'];
    $luces_delanteras = $_POST['luces_delanteras'];
    $aire_acondicionado = $_POST['aire_acondicionado'];
    $limpia_parabrisas = $_POST['limpia_parabrisas'];
    $alfombras = $_POST['alfombras'];
    $herramientas = $_POST['herramientas'];
    $antenas = $_POST['antenas'];
    $placa_pipa = $_POST['placa_pipa'];
    $extintor = $_POST['extintor'];
    $gato = $_POST['gato'];
    $llanta_repuesto = $_POST['llanta_repuesto'];
    $copas_1234 = $_POST['copas_1234'];
    $base_antena = $_POST['base_antena'];
    $triangulo_seguridad = $_POST['triangulo_seguridad'];

    $stat = 3;

    if (isset($foto_frente) && $foto_frente != '') {
        $foto_frente = $foto_frente;
    }else {
        $foto_frente = '';
    }

    if (isset($foto_conducto) && $foto_conducto != '') {
        $foto_lado_conductor = $foto_conducto;
    }else {
        $foto_lado_conductor = '';
    }

    if (isset($foto_maletero) && $foto_maletero != '') {
        $foto_mateleto = $foto_maletero;
    }else {
        $foto_mateleto = '';
    }

    if (isset($foto_pasajero) && $foto_pasajero != '') {
        $foto_lado_pasajero = $foto_pasajero;
    }else {
        $foto_lado_pasajero = '';
    }

    $id = $_POST['id'];

    // email

    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = 2;  
        $mail->isSMTP();     
        $mail->Host       = 'smtp.office365.com';  
        $mail->SMTPAuth   = true;                   
        $mail->Username   = 'notificaciones@grupopcr.com.pa';  
        $mail->Password   = 'Noti2019.';        
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        $mail->Port       = 587;                   
        $mail->setFrom('notificaciones@grupopcr.com.pa', 'Notificaciones PCR');
        $mail->addAddress($email, 'Cliente PCR'); 

        $poliza_seguro = ($poliza_seguro == 1) ? 'SI' : 'NO';
        $placa_revisado = ($placa_revisado == 1) ? 'SI' : 'NO';
        $formato_danios_menores = ($formato_danios_menores == 1) ? 'SI' : 'NO';
        $registro_unico_vehicula = ($registro_unico_vehicula == 1) ? 'SI' : 'NO';
        $stiker_panapass = ($stiker_panapass == 1) ? 'SI' : 'NO';
        $pito_claxon = ($pito_claxon == 1) ? 'SI' : 'NO';
        $luces_direccionales = ($luces_direccionales == 1) ? 'SI' : 'NO';
        $luces_traseras = ($luces_traseras == 1) ? 'SI' : 'NO';
        $luces_delanteras = ($luces_delanteras == 1) ? 'SI' : 'NO';
        $aire_acondicionado = ($aire_acondicionado == 1) ? 'SI' : 'NO';
        $limpia_parabrisas = ($limpia_parabrisas == 1) ? 'SI' : 'NO';
        $alfombras = ($alfombras == 1) ? 'SI' : 'NO';
        $herramientas = ($herramientas == 1) ? 'SI' : 'NO';
        $antenas = ($antenas == 1) ? 'SI' : 'NO';
        $placa_pipa = ($placa_pipa == 1) ? 'SI' : 'NO';
        $extintor = ($extintor == 1) ? 'SI' : 'NO';
        $gato = ($gato == 1) ? 'SI' : 'NO';
        $llanta_repuesto = ($llanta_repuesto == 1) ? 'SI' : 'NO';
        $copas_1234 = ($copas_1234 == 1) ? 'SI' : 'NO';
        $base_antena = ($base_antena == 1) ? 'SI' : 'NO';
        $triangulo_seguridad = ($triangulo_seguridad == 1) ? 'SI' : 'NO';

        $papeletaExists = ($imagen != '') ? true : false;
        $fotoFrenteExists = ($foto_frente != '') ? true : false;
        $fotoConductorExists = ($foto_lado_conductor != '') ? true : false;
        $fotoMaleteroExists = ($foto_maletero != '') ? true : false;
        $fotoPasajeroExists = ($foto_lado_pasajero != '') ? true : false;
        $firmaExists = ($firma != '') ? true : false;
  
        $mail->CharSet = 'UTF-8';
        $mail->isHTML(true);  
        $mail->Subject = 'Dollar Panama Hoja de Inspeccion';
        $mail->Body    = '
            <img src="cid:logogrupopcr" width="250" alt="Logo 1" />
            <p>Su papeleta de inspeccion de salida para el contrato '.$contrato.'</p>
            <p>Estimado cliente,</p>
            <p>¡Bienvenido y gracias por elegir nuestros servicios de alquiler de vehículos! Estamos 
            comprometidos en ofrecerte una experiencia excepcional y asegurarnos de que tu viaje sea seguro y cómodo.</p>
            <p>A continuación, te proporcionamos los detalles de tu alquiler para que puedas revisar toda la información pertinente:</p>

    <div style="display: flex; justify-content: space-between;">
        <div style="flex: 1; margin-right: 10px;">
            <table style="border-collapse: collapse; width: 100%;">
                <thead>
                    <tr>
                        <th style="border: 1px solid #df3232;">Contrato</th>
                        <th style="border: 1px solid #df3232;">Sucursal</th>
                        <th style="border: 1px solid #df3232;">Placa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="border: 1px solid #df3232;">'.$contrato.'</td>
                        <td style="border: 1px solid #df3232;">'.$sucursal.'</td>
                        <td style="border: 1px solid #df3232;">'.$placa.'</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="flex: 1;">
            <table style="border-collapse: collapse; width: 100%;">
                <thead>
                    <tr>
                        <th style="border: 1px solid #df3232;">Unidad</th>
                        <th style="border: 1px solid #df3232;">Odómetro</th>
                        <th style="border: 1px solid #df3232;">Combustible</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="border: 1px solid #df3232;">'.$unidad.'</td>
                        <td style="border: 1px solid #df3232;">'.$odometro.'</td>
                        <td style="border: 1px solid #df3232;">'.$combustible.'</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
                <br>

    <div style="display: flex; justify-content: space-between;">
        <div style="flex: 1; margin-right: 10px;">
            <table style="border-collapse: collapse; width: 100%;">
                <thead>
                    <tr>
                        <th style="border: 1px solid #df3232;" colspan="2">Documentacion</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="border: 1px solid #df3232;">Poliza de seguro</td>
                        <td style="border: 1px solid #df3232;">'.$poliza_seguro.'</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #df3232;">Placa Revisado</td>
                        <td style="border: 1px solid #df3232;">'.$placa_revisado.'</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #df3232;">Formato daños menores</td>
                        <td style="border: 1px solid #df3232;">'.$formato_danios_menores.'</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #df3232;">Registro Unico Vehicular</td>
                        <td style="border: 1px solid #df3232;">'.$registro_unico_vehicula.'</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #df3232;">Sticker de Panapass</td>
                        <td style="border: 1px solid #df3232;">'.$stiker_panapass.'</td>
                    </tr>
                </tbody>
            </table>
        </div>   
        <div style="flex: 1; margin-right: 10px;">
            <table style="border-collapse: collapse; width: 100%;">
                <thead>
                    <tr>
                        <th style="border: 1px solid #df3232;" colspan="2">Operatividad</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="border: 1px solid #df3232;">Pito / Claxon</td>
                        <td style="border: 1px solid #df3232;">'.$pito_claxon.'</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #df3232;">Luces Direccionales</td>
                        <td style="border: 1px solid #df3232;">'.$luces_direccionales.'</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #df3232;">Luces Traseras</td>
                        <td style="border: 1px solid #df3232;">'.$luces_traseras.'</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #df3232;">Luces Delanteras</td>
                        <td style="border: 1px solid #df3232;">'.$luces_delanteras.'</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #df3232;">Aire Acondicionado</td>
                        <td style="border: 1px solid #df3232;">'.$aire_acondicionado.'</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #df3232;">Limpia Parabrisas</td>
                        <td style="border: 1px solid #df3232;">'.$limpia_parabrisas.'</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div style="flex: 1;">
            <table style="border-collapse: collapse; width: 100%;">
                <thead>
                    <tr>
                        <th style="border: 1px solid #df3232;" colspan="2">Accesorios</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="border: 1px solid #df3232;">Pito / Claxon</td>
                        <td style="border: 1px solid #df3232;">'.$alfombras.'</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #df3232;">Luces Direccionales</td>
                        <td style="border: 1px solid #df3232;">'.$herramientas.'</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #df3232;">Luces Traseras</td>
                        <td style="border: 1px solid #df3232;">'.$antenas.'</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #df3232;">Luces Delanteras</td>
                        <td style="border: 1px solid #df3232;">'.$placa_pipa.'</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #df3232;">Aire Acondicionado</td>
                        <td style="border: 1px solid #df3232;">'.$extintor.'</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #df3232;">Limpia Parabrisas</td>
                        <td style="border: 1px solid #df3232;">'.$gato.'</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #df3232;">Luces Traseras</td>
                        <td style="border: 1px solid #df3232;">'.$llanta_repuesto.'</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #df3232;">Luces Delanteras</td>
                        <td style="border: 1px solid #df3232;">'.$copas_1234.'</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #df3232;">Aire Acondicionado</td>
                        <td style="border: 1px solid #df3232;">'.$base_antena.'</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #df3232;">Limpia Parabrisas</td>
                        <td style="border: 1px solid #df3232;">'.$triangulo_seguridad.'</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <br>

    <p><b>Inspección antes de la entrega:</b></p>'
    . ($papeletaExists ? '<img src="cid:papeleta" width="250" alt="Inspección" />' : '') . '
    <p><b>Fotos:</b></p>'
    . ($fotoFrenteExists ? '<img src="cid:foto_frente" width="250" alt="Foto Frente" />' : '')
    . ($fotoConductorExists ? '<img src="cid:foto_conductor" width="250" alt="Foto Lado Conductor" />' : '')
    . ($fotoMaleteroExists ? '<img src="cid:foto_maletero" width="250" alt="Foto Maletero" />' : '')
    . ($fotoPasajeroExists ? '<img src="cid:foto_pasajero" width="250" alt="Foto Lado Pasajero" />' : '') . '
    <p><b>Firma:</b></p>'
    . ($firmaExists ? '<img src="cid:firma" width="250" alt="Firma" />' : '') . '
        ';

        if ($papeletaExists) {
            $mail->AddEmbeddedImage($imagen, 'papeleta');
        }
        
        if ($fotoFrenteExists) {
            $mail->AddEmbeddedImage($foto_frente, 'foto_frente');
        }
        
        if ($fotoConductorExists) {
            $mail->AddEmbeddedImage($foto_lado_conductor, 'foto_conductor');
        }
        
        if ($fotoMaleteroExists) {
            $mail->AddEmbeddedImage($foto_maletero, 'foto_maletero');
        }
        
        if ($fotoPasajeroExists) {
            $mail->AddEmbeddedImage($foto_lado_pasajero, 'foto_pasajero');
        }
        
        if ($firmaExists) {
            $mail->AddEmbeddedImage($firma, 'firma');
        }

        $mail->AddEmbeddedImage('../img/290x128.png', 'logogrupopcr');

        /*
        $mail->AddEmbeddedImage('../img/290x128.png', 'logogrupopcr');
        $mail->AddEmbeddedImage($imagen, 'papeleta');
        $mail->AddEmbeddedImage($foto_frente, 'foto_frente');
        $mail->AddEmbeddedImage($foto_lado_conductor, 'foto_conductor');
        $mail->AddEmbeddedImage($foto_mateleto, 'foto_maletero');
        $mail->AddEmbeddedImage($foto_lado_pasajero, 'foto_pasajero');
        $mail->AddEmbeddedImage($firma, 'firma'); */

        $mail->AltBody = '';

        $mail->send();
        echo 'Mensaje enviado';
    } catch (Exception $e) {
        echo "Mensaje no enviado. Error de Mailer: {$mail->ErrorInfo}";
    }

    // fin email

    $stmt = $pdo->query("UPDATE papeleta_general SET imspeccion2 = '".$imagen."',
                                                        email_cliente = '".$email."',
                                                        contrato = '".$contrato."',
                                                        sucursal = '".$sucursal."',
                                                        unidad = '".$unidad."',
                                                        placa = '".$placa."',
                                                        odometro = '".$odometro."',
                                                        combustible = '".$combustible."',
                                                        poliza_seguro = '".$poliza_seguro."',
                                                        placa_revisado = '".$placa_revisado."',
                                                        formato_danios_menores = '".$formato_danios_menores."',
                                                        registro_unico_vehicula = '".$registro_unico_vehicula."',
                                                        stiker_panapass = '".$stiker_panapass."',
                                                        pito_claxon = '".$pito_claxon."',
                                                        luces_direccionales = '".$luces_direccionales."',
                                                        luces_traseras = '".$luces_traseras."',
                                                        luces_delanteras = '".$luces_delanteras."',
                                                        aire_acondicionado = '".$aire_acondicionado."',
                                                        limpia_parabrisas = '".$limpia_parabrisas."',
                                                        alfombras = '".$alfombras."',
                                                        herramientas = '".$herramientas."',
                                                        antenas = '".$antenas."',
                                                        placa_pipa = '".$placa_pipa."',
                                                        extintor = '".$extintor."',
                                                        gato = '".$gato."',
                                                        llanta_repuesto = '".$llanta_repuesto."',
                                                        copas_1234 = '".$copas_1234."',
                                                        base_antena = '".$base_antena."',
                                                        triangulo_seguridad = '".$triangulo_seguridad."',
                                                        foto_frente = '".$foto_frente."',
                                                        foto_lado_conductor = '".$foto_lado_conductor."',
                                                        foto_mateleto = '".$foto_mateleto."',
                                                        foto_lado_pasajero = '".$foto_lado_pasajero."',
                                                        stat = '".$stat."',
                                                        firma_salida = '".$firma."', 
                                                        id_user_heiker = '".$_SESSION["id"]."'
                             WHERE id = '".$id."'");

    
}elseif (isset($_GET['heiker_recibe'])) {
    $reg_pape = $pdo -> query("SELECT * FROM papeleta_general WHERE id = '".$_GET['id']."'");
    $rows = $reg_pape->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $key => $value) {
?>

<div class="container">
    
    <div class="container text-center" style="border: solid 1px #df3232; padding:20px;">
    <h2>Counter</h2>
    <br>
        <div class="row">
            <div class="col-4">
                <h4>Email</h4>
                <input type="text" id="email" class="form-control" value="<?php echo $value['email_cliente']; ?>" readonly>
            </div>
            <div class="col-4">
                <h4>Contrato</h4>
                <input type="text" id="contrato" class="form-control" value="<?php echo $value['contrato']; ?>" readonly>
            </div>
            <div class="col-4">
                <h4>Sucursal</h4>
                <input type="text" id="sucursal" class="form-control" value="<?php echo $value['sucursal']; ?>" readonly>
            </div>
        </div>
    </div>
    <br>
   
    <div class="container text-center" style="border: solid 1px #df3232; padding:20px;">
    <h2>Operaciones</h2>
    <br>
        <div class="row">
            <div class="col-4">
                <h4>Unidad</h4>
                <input type="text" id="unidad" class="form-control" value="<?php echo $value['unidad']; ?>" readonly>
            </div>
            <div class="col-4">
                <h4>Placa</h4>
                <input type="text" id="placa" class="form-control" value="<?php echo $value['placa']; ?>" readonly>
            </div>
            <div class="col-4">
                <h4>Odometro</h4>
                <input type="text" id="odometro" class="form-control" value="<?php echo $value['odometro']; ?>" min="<?php echo $value['odometro']; ?>">
            </div>
        </div>
    </div>
    <br>
    
    <div class="container text-center" style="border: solid 1px #df3232; padding:20px;">
    <h2>Combustible</h2>
    <br>
        <div class="row">
            <div class="col-4">
                
                <input class="form-check-input" type="radio" id="combustible" name="combustible" value="Empty" <?php echo ($value['combustible'] == "Empty" ? "checked" : ""); ?>>
                <label>Empty</label>
                <br><br>
                
                <input class="form-check-input" type="radio" id="combustible" name="combustible" value="3/8" <?php echo ($value['combustible'] == "3/8" ? "checked" : ""); ?>>
                <label>3/8</label>
                <br><br>
                
                <input class="form-check-input" type="radio" id="combustible" name="combustible" value="3/4" <?php echo ($value['combustible'] == "3/4" ? "checked" : ""); ?>>
                <label>3/4</label>
                <br><br>
            </div>
            <div class="col-4">
                <input class="form-check-input" type="radio" id="combustible" name="combustible" value="1/8" <?php echo ($value['combustible'] == "1/8" ? "checked" : ""); ?>>
                <label>1/8</label>
                <br><br>
                <input class="form-check-input" type="radio" id="combustible" name="combustible" value="1/2" <?php echo ($value['combustible'] == "1/2" ? "checked" : ""); ?>>
                <label>1/2</label>
                <br><br>
                <input class="form-check-input" type="radio" id="combustible" name="combustible" value="7/8" <?php echo ($value['combustible'] == "7/8" ? "checked" : ""); ?>>
                <label>7/8</label>
                <br><br>
            </div>
            <div class="col-4">
                <input class="form-check-input" type="radio" id="combustible" name="combustible" value="1/4" <?php echo ($value['combustible'] == "1/4" ? "checked" : ""); ?>>
                <label>1/4</label>
                <br><br>
                <input class="form-check-input" type="radio" id="combustible" name="combustible" value="5/8" <?php echo ($value['combustible'] == "5/8" ? "checked" : ""); ?>>
                <label>5/8</label>
                <br><br>
                <input class="form-check-input" type="radio" id="combustible" name="combustible" value="Full" <?php echo ($value['combustible'] == "Full" ? "checked" : ""); ?>>
                <label>Full</label>
                <br><br>
            </div>

        </div>
    </div>
    <br>
    <div class="container text-left" style="border: solid 1px #df3232; padding:20px;">
        <div class="row">
            <div class="col-4" style="border: solid 1px #df3232;">
                <h2>Documentacion</h2>
                
                <input class="form-check-input" type="checkbox" id="poliza_seguro" value="1" <?php echo ($value['poliza_seguro'] == 'SI' ? 'checked' : ''); ?>>
                <label>Poliza de seguro</label>
                <br><br>
                
                <input class="form-check-input" type="checkbox" id="placa_revisado" value="1" <?php echo ($value['placa_revisado'] == 'SI' ? 'checked' : ''); ?>>
                <label>Placa y Revisado</label>
                <br><br>
                
                <input class="form-check-input" type="checkbox" id="formato_danios_menores" value="1" <?php echo ($value['formato_danios_menores'] == 'SI' ? 'checked' : ''); ?>>
                <label>Formato de Daños Menor</label>
                <br><br>
                
                <input class="form-check-input" type="checkbox" id="registro_unico_vehicula" value="1" <?php echo ($value['registro_unico_vehicula'] == 'SI' ? 'checked' : ''); ?>>
                <label>Registro Unico Vehicular</label>
                <br><br>
                
                <input class="form-check-input" type="checkbox" id="stiker_panapass" value="1" <?php echo ($value['stiker_panapass'] == 'SI' ? 'checked' : ''); ?>>
                <label>Sticker de Panapass</label>
                <br><br>
            </div>
            <div class="col-4" style="border: solid 1px #df3232;">
                <h2>Operatividad</h2>
                
                <input class="form-check-input" type="checkbox" id="pito_claxon" value="1" <?php echo ($value['pito_claxon'] == 'SI' ? 'checked' : ''); ?>>
                <label>Pito / Claxon</label>
                <br><br>
                
                <input class="form-check-input" type="checkbox" id="luces_direccionales" value="1" <?php echo ($value['luces_direccionales'] == 'SI' ? 'checked' : ''); ?>>
                <label>Luces Direccionales</label>
                <br><br>
                
                <input class="form-check-input" type="checkbox" id="luces_traseras" value="1" <?php echo ($value['luces_traseras'] == 'SI' ? 'checked' : ''); ?>>
                <label>Luces Traseras</label>
                <br><br>
                
                <input class="form-check-input" type="checkbox" id="luces_delanteras" value="1" <?php echo ($value['luces_delanteras'] == 'SI' ? 'checked' : ''); ?>>
                <label>Luces Delanteras</label>
                <br><br>
                
                <input class="form-check-input" type="checkbox" id="aire_acondicionado" value="1" <?php echo ($value['aire_acondicionado'] == 'SI' ? 'checked' : ''); ?>>
                <label>Aire Acondicionado</label>
                <br><br>
                
                <input class="form-check-input" type="checkbox" id="limpia_parabrisas" value="1" <?php echo ($value['limpia_parabrisas'] == 'SI' ? 'checked' : ''); ?>>
                <label>Limpia Parabrisas</label>
                <br><br>

            </div>
            <div class="col-4" style="border: solid 1px #df3232;">
                <h2>Accesorios</h2>
                
                <input class="form-check-input" type="checkbox" id="alfombras" value="1" <?php echo ($value['alfombras'] == 'SI' ? 'checked' : ''); ?>>
                <label>Alfombras</label>
                <br><br>
                
                <input class="form-check-input" type="checkbox" id="herramientas" value="1" <?php echo ($value['herramientas'] == 'SI' ? 'checked' : ''); ?>>
                <label>Herramientas</label>
                <br><br>
                
                <input class="form-check-input" type="checkbox" id="antenas" value="1" <?php echo ($value['antenas'] == 'SI' ? 'checked' : ''); ?>>
                <label>Antena</label>
                <br><br>
                
                <input class="form-check-input" type="checkbox" id="placa_pipa" value="1" <?php echo ($value['placa_pipa'] == 'SI' ? 'checked' : ''); ?>>
                <label>Palanca / Pipa</label>
                <br><br>
                
                <input class="form-check-input" type="checkbox" id="extintor" value="1" <?php echo ($value['extintor'] == 'SI' ? 'checked' : ''); ?>>
                <label>Extintor</label>
                <br><br>
                
                <input class="form-check-input" type="checkbox" id="gato" value="1" <?php echo ($value['gato'] == 'SI' ? 'checked' : ''); ?>>
                <label>Gato</label>
                <br><br>
                
                <input class="form-check-input" type="checkbox" id="llanta_repuesto" value="1" <?php echo ($value['llanta_repuesto'] == 'SI' ? 'checked' : ''); ?>>
                <label>Llanta de Repuesto</label>
                <br><br>
                
                <input class="form-check-input" type="checkbox" id="copas_1234" value="1" <?php echo ($value['copas_1234'] == 'SI' ? 'checked' : ''); ?>>
                <label>Copas 1 2 3 4</label>
                <br><br>
                
                <input class="form-check-input" type="checkbox" id="base_antena" value="1" <?php echo ($value['base_antena'] == 'SI' ? 'checked' : ''); ?>>
                <label>Base de Antena</label>
                <br><br>
                
                <input class="form-check-input" type="checkbox" id="triangulo_seguridad" value="1" <?php echo ($value['triangulo_seguridad'] == 'SI' ? 'checked' : ''); ?>>
                <label>Triangulo de Seguridad</label>
                <br><br>
            </div>
        </div>
    </div>
    <br>
    
    <div class="container text-center" style="border: solid 1px #df3232; padding:20px;">
    <h2>Inspeccion</h2>
    <br>
        <canvas id="miCanvas" width="500" height="500" style="background-color:white;"></canvas><br>
        <button class="btn btn-secondary" id="btnTriangulo">Triángulo</button>
        <button class="btn btn-secondary" id="btnCuadrado">Cuadrado</button>
        <button class="btn btn-secondary" id="btnCirculo">Círculo</button>
        <button class="btn btn-secondary" id="btnLimpiar">Limpiar</button>
    </div>
    <br>
    <div class="row text-center" style="border: solid 1px #df3232; padding:20px;">
    <h2>Fotos de Operaciones</h2>
    <br>
        <div class="col-6" style="padding:20px;">
            <img id="" width="250" src="<?php echo $value['op_foto_frente']; ?>">
        </div>
        <div class="col-6" style="padding:20px;">
            <img id="" width="250" src="<?php echo $value['op_foto_coductor']; ?>">
        </div>
        <div class="col-6" style="padding:20px;">
            <img id="" width="250" src="<?php echo $value['op_foto_cajuela']; ?>">
        </div>
        <div class="col-6" style="padding:20px;">
            <img id="" width="250" src="<?php echo $value['op_foto_pasajero']; ?>">
        </div>
    </div>
    <br>
    <div class="row text-center" style="border: solid 1px #df3232; padding:20px;">
    <h2>Fotos de Check-out</h2>
    <br>
        <div class="col-6" style="padding:20px;">
            <img id="" width="250" src="<?php echo $value['foto_frente']; ?>">
        </div>
        <div class="col-6" style="padding:20px;">
            <img id="" width="250" src="<?php echo $value['foto_lado_conductor']; ?>">
        </div>
        <div class="col-6" style="padding:20px;">
            <img id="" width="250" src="<?php echo $value['foto_mateleto']; ?>">
        </div>
        <div class="col-6" style="padding:20px;">
            <img id="" width="250" src="<?php echo $value['foto_lado_pasajero']; ?>">
        </div>
    </div>
    <br>
    <div class="row text-center" style="border: solid 1px #df3232; padding:20px;">
        <h2>Fotos de Check in</h2>
        <br>
        <div class="col-6" style="padding:20px;">
        <label for="file1" class="custom-file-upload">
            <i class="camera-icon"></i>
        </label>
        <input type="file" id="file1" accept="image/*" class="hidden-file">
        <p id="frente" style="display:block"> FRENTE</p> 
            <img id="preview1" width="150">
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
    <div style="text-align: center;">
    <h2>Firma de Cliente Conforme</h2>
    <br>
        <canvas id="firmaCanvas" width="500" height="250" style="border: 1px solid #000; z-index:9999"></canvas> <br>
        <button id="btnLimpiarFirma" class="btn btn-secondary">Limpiar Firma</button>
    <br>
    </div>
    <div class="container">
        <br>
        <br>
        <a class="btn btn-danger" style="width:100%" onclick="enviar_revicion()">Enviar a Revision</a>
        <br>
        <br>
        <a class="btn btn-success" style="width:100%" onclick="finalizar()">Finalizar</a>
        <input type="hidden" id="id" value="<?php echo $_GET['id']; ?>">
    </div>
    <br>
    <br>
</div> 

<?php } 

}elseif (isset($_POST['finalizar'])) {

    $rutaPapeleta = '../img/inspeccion3/';
    $rutaFirmas = '../img/firma_recibido/';
    $rutaFotosRes = '../img/fotos_ins_car_res/';

    if (isset($_POST['imagen'])) {
        $imagen = $_POST['imagen'];
        $imagen_base64 = preg_replace('#^data:image/\w+;base64,#i', '', $imagen);
        $imagen_binaria = base64_decode($imagen_base64);
        $nombre_archivo_pape = uniqid() . '.png';
        if (file_put_contents($rutaPapeleta . $nombre_archivo_pape, $imagen_binaria)) {
            $response["success"] = true;
            $response["message"] = "Datos obtenidos con éxito";
        } else {
            $response["error"] = 'No se pudo guardar la imagen.';
        }
    } else {
        $response["error"] = 'No se ha enviado una imagen.';
    }

    if (isset($_POST['firma'])) {
        $firma = $_POST['firma'];
        $imagen_base64 = preg_replace('#^data:image/\w+;base64,#i', '', $firma);
        $imagen_binaria = base64_decode($imagen_base64);
        $nombre_archivo_firma = uniqid() . '.png';
        if (file_put_contents($rutaFirmas . $nombre_archivo_firma, $imagen_binaria)) {
            $response["success"] = true;
            $response["message"] = "Datos obtenidos con éxito";
        } else {
            $response["error"] = 'No se pudo guardar la imagen.';
        }
    } else {
        $response["error"] = 'No se ha enviado una imagen.';
    }

    // 4 imagenes de ingreso

    $uploadedFileNames = [];
    $fileFields = ['foto1', 'foto2', 'foto3', 'foto4'];

    foreach ($fileFields as $field) {
        if(isset($_FILES[$field])) {
            $fileName = generarCadenaAleatoria(10) . basename($_FILES[$field]["name"]);
            $targetFilePath = $rutaFotosRes . $fileName;
            
            if(move_uploaded_file($_FILES[$field]["tmp_name"], $targetFilePath)) {
                $uploadedFileNames[$field] = $targetFilePath;

                if ($uploadedFileNames[$field] == $uploadedFileNames['foto1']) {
                    $foto_frente = $uploadedFileNames[$field];
                }elseif ($uploadedFileNames[$field] == $uploadedFileNames['foto2']) {
                    $foto_conducto = $uploadedFileNames[$field];
                }elseif ($uploadedFileNames[$field] == $uploadedFileNames['foto3']) {
                    $foto_maletero = $uploadedFileNames[$field];
                }elseif ($uploadedFileNames[$field] == $uploadedFileNames['foto4']) {
                    $foto_pasajero = $uploadedFileNames[$field];
                }

            } else {
                echo json_encode(["message" => "Error al subir el archivo " . $field]);
                exit;
            }
        }
    }
   if (isset($foto_frente) && $foto_frente != '') {
        $foto_frente = $foto_frente;
    }else {
        $foto_frente = '';
    }

    if (isset($foto_conducto) && $foto_conducto != '') {
        $foto_lado_conductor = $foto_conducto;
    }else {
        $foto_lado_conductor = '';
    }

    if (isset($foto_maletero) && $foto_maletero != '') {
        $foto_mateleto = $foto_maletero;
    }else {
        $foto_mateleto = '';
    }

    if (isset($foto_pasajero) && $foto_pasajero != '') {
        $foto_lado_pasajero = $foto_pasajero;
    }else {
        $foto_lado_pasajero = '';
    }

    // fin de integro de imagenes

    $imagen = $rutaPapeleta.$nombre_archivo_pape;
    $firma = $rutaFirmas.$nombre_archivo_firma;
    $email = $_POST['email'];
    $contrato = $_POST['contrato'];
    $sucursal = $_POST['sucursal'];
    $unidad = $_POST['unidad'];
    $placa = $_POST['placa'];
    $odometro = $_POST['odometro'];
    $combustible = $_POST['combustible'];
    $poliza_seguro = $_POST['poliza_seguro'];
    $placa_revisado = $_POST['placa_revisado'];
    $formato_danios_menores = $_POST['formato_danios_menores'];
    $registro_unico_vehicula = $_POST['registro_unico_vehicula'];
    $stiker_panapass = $_POST['stiker_panapass'];
    $pito_claxon = $_POST['pito_claxon'];
    $luces_direccionales = $_POST['luces_direccionales'];
    $luces_traseras = $_POST['luces_traseras'];
    $luces_delanteras = $_POST['luces_delanteras'];
    $aire_acondicionado = $_POST['aire_acondicionado'];
    $limpia_parabrisas = $_POST['limpia_parabrisas'];
    $alfombras = $_POST['alfombras'];
    $herramientas = $_POST['herramientas'];
    $antenas = $_POST['antenas'];
    $placa_pipa = $_POST['placa_pipa'];
    $extintor = $_POST['extintor'];
    $gato = $_POST['gato'];
    $llanta_repuesto = $_POST['llanta_repuesto'];
    $copas_1234 = $_POST['copas_1234'];
    $base_antena = $_POST['base_antena'];
    $triangulo_seguridad = $_POST['triangulo_seguridad'];

    $stat = 4;

    $id = $_POST['id'];

    $stmt = $pdo->query("UPDATE papeleta_general SET imspeccion3 = '".$imagen."',
                                                        email_cliente = '".$email."',
                                                        contrato = '".$contrato."',
                                                        sucursal = '".$sucursal."',
                                                        unidad = '".$unidad."',
                                                        placa = '".$placa."',
                                                        odometro = '".$odometro."',
                                                        combustible = '".$combustible."',
                                                        poliza_seguro = '".$poliza_seguro."',
                                                        placa_revisado = '".$placa_revisado."',
                                                        formato_danios_menores = '".$formato_danios_menores."',
                                                        registro_unico_vehicula = '".$registro_unico_vehicula."',
                                                        stiker_panapass = '".$stiker_panapass."',
                                                        pito_claxon = '".$pito_claxon."',
                                                        luces_direccionales = '".$luces_direccionales."',
                                                        luces_traseras = '".$luces_traseras."',
                                                        luces_delanteras = '".$luces_delanteras."',
                                                        aire_acondicionado = '".$aire_acondicionado."',
                                                        limpia_parabrisas = '".$limpia_parabrisas."',
                                                        alfombras = '".$alfombras."',
                                                        herramientas = '".$herramientas."',
                                                        antenas = '".$antenas."',
                                                        placa_pipa = '".$placa_pipa."',
                                                        extintor = '".$extintor."',
                                                        gato = '".$gato."',
                                                        llanta_repuesto = '".$llanta_repuesto."',
                                                        copas_1234 = '".$copas_1234."',
                                                        base_antena = '".$base_antena."',
                                                        triangulo_seguridad = '".$triangulo_seguridad."',
                                                        stat = '".$stat."',
                                                        firma_ingreso = '".$firma."', 
                                                        id_user_heiker_fin = '".$_SESSION["id"]."', 
                                                        foto_frente_ing = '".$foto_frente."', 
                                                        foto_conductor_ing = '".$foto_lado_conductor."', 
                                                        foto_maletero_ing = '".$foto_mateleto."', 
                                                        foto_pasajero_ing ='".$foto_lado_pasajero."'
                             WHERE id = '".$id."'");

}elseif (isset($_POST['mandar_revicion'])) {

    $rutaPapeleta = '../img/inspeccion4/';
    $rutaFirmas = '../img/firma_revicion/';
    $rutaFotosRes = '../img/fotos_ins_car_res/';

    if (isset($_POST['imagen'])) {
        $imagen = $_POST['imagen'];
        $imagen_base64 = preg_replace('#^data:image/\w+;base64,#i', '', $imagen);
        $imagen_binaria = base64_decode($imagen_base64);
        $nombre_archivo_pape = uniqid() . '.png';
        if (file_put_contents($rutaPapeleta . $nombre_archivo_pape, $imagen_binaria)) {
            $response["success"] = true;
            $response["message"] = "Datos obtenidos con éxito";
        } else {
            $response["error"] = 'No se pudo guardar la imagen.';
        }
    } else {
        $response["error"] = 'No se ha enviado una imagen.';
    }

    if (isset($_POST['firma'])) {
        $firma = $_POST['firma'];
        $imagen_base64 = preg_replace('#^data:image/\w+;base64,#i', '', $firma);
        $imagen_binaria = base64_decode($imagen_base64);
        $nombre_archivo_firma = uniqid() . '.png';
        if (file_put_contents($rutaFirmas . $nombre_archivo_firma, $imagen_binaria)) {
            $response["success"] = true;
            $response["message"] = "Datos obtenidos con éxito";
        } else {
            $response["error"] = 'No se pudo guardar la imagen.';
        }
    } else {
        $response["error"] = 'No se ha enviado una imagen.';
    }

    // 4 imagenes de ingreso

    $uploadedFileNames = [];
    $fileFields = ['foto1', 'foto2', 'foto3', 'foto4'];

    foreach ($fileFields as $field) {
        if(isset($_FILES[$field])) {
            $fileName = time() . basename($_FILES[$field]["name"]);
            $targetFilePath = $rutaFotosRes . $fileName;
            
            if(move_uploaded_file($_FILES[$field]["tmp_name"], $targetFilePath)) {
                $uploadedFileNames[$field] = $targetFilePath;

                if ($uploadedFileNames[$field] == $uploadedFileNames['foto1']) {
                    $foto_frente = $uploadedFileNames[$field];
                }elseif ($uploadedFileNames[$field] == $uploadedFileNames['foto2']) {
                    $foto_conducto = $uploadedFileNames[$field];
                }elseif ($uploadedFileNames[$field] == $uploadedFileNames['foto3']) {
                    $foto_maletero = $uploadedFileNames[$field];
                }elseif ($uploadedFileNames[$field] == $uploadedFileNames['foto4']) {
                    $foto_pasajero = $uploadedFileNames[$field];
                }

            } else {
                echo json_encode(["message" => "Error al subir el archivo " . $field]);
                exit;
            }
        }
    }


    if (isset($foto_frente) && $foto_frente != '') {
        $foto_frente = $foto_frente;
    }else {
        $foto_frente = '';
    }

    if (isset($foto_conducto) && $foto_conducto != '') {
        $foto_lado_conductor = $foto_conducto;
    }else {
        $foto_lado_conductor = '';
    }

    if (isset($foto_maletero) && $foto_maletero != '') {
        $foto_mateleto = $foto_maletero;
    }else {
        $foto_mateleto = '';
    }

    if (isset($foto_pasajero) && $foto_pasajero != '') {
        $foto_lado_pasajero = $foto_pasajero;
    }else {
        $foto_lado_pasajero = '';
    }

    // fin de integro de imagenes

    $imagen = $rutaPapeleta.$nombre_archivo_pape;
    $firma = $rutaFirmas.$nombre_archivo_firma;
    $email = $_POST['email'];
    $contrato = $_POST['contrato'];
    $sucursal = $_POST['sucursal'];
    $unidad = $_POST['unidad'];
    $placa = $_POST['placa'];
    $odometro = $_POST['odometro'];
    $combustible = $_POST['combustible'];
    $poliza_seguro = $_POST['poliza_seguro'];
    $placa_revisado = $_POST['placa_revisado'];
    $formato_danios_menores = $_POST['formato_danios_menores'];
    $registro_unico_vehicula = $_POST['registro_unico_vehicula'];
    $stiker_panapass = $_POST['stiker_panapass'];
    $pito_claxon = $_POST['pito_claxon'];
    $luces_direccionales = $_POST['luces_direccionales'];
    $luces_traseras = $_POST['luces_traseras'];
    $luces_delanteras = $_POST['luces_delanteras'];
    $aire_acondicionado = $_POST['aire_acondicionado'];
    $limpia_parabrisas = $_POST['limpia_parabrisas'];
    $alfombras = $_POST['alfombras'];
    $herramientas = $_POST['herramientas'];
    $antenas = $_POST['antenas'];
    $placa_pipa = $_POST['placa_pipa'];
    $extintor = $_POST['extintor'];
    $gato = $_POST['gato'];
    $llanta_repuesto = $_POST['llanta_repuesto'];
    $copas_1234 = $_POST['copas_1234'];
    $base_antena = $_POST['base_antena'];
    $triangulo_seguridad = $_POST['triangulo_seguridad'];

    $stat = 5;

    $id = $_POST['id'];
    
    $update_general = $pdo -> query("UPDATE papeleta_general 
                                        SET stat = 5, 
                                        id_user_heiker_fin = '".$_SESSION["id"]."', 
                                        foto_frente_ing = '".$foto_frente."', 
                                        foto_conductor_ing = '".$foto_lado_conductor."', 
                                        foto_maletero_ing = '".$foto_mateleto."', 
                                        foto_pasajero_ing = '".$foto_lado_pasajero."'
                                        WHERE 
                                        id = '".$id."'");
    
    $general = $pdo -> query("SELECT * FROM papeleta_general WHERE id = '".$id."'");
    $rows = $general->fetchAll(PDO::FETCH_ASSOC);

    foreach ($rows as $key => $value) {

        // inspecciones 

        $inspeccion1 = $value['imspeccion'];
        $inspeccion2 = $value['imspeccion2'];
        $inspeccion3 = $value['imspeccion3'];

        // fotos 

        $foto_frente = $value['foto_frente'];
        $foto_lado_conductor = $value['foto_lado_conductor'];
        $foto_mateleto = $value['foto_mateleto'];
        $foto_lado_pasajero = $value['foto_lado_pasajero'];

        // fotos res

        $foto_frente_res = $value['foto_frente_ing'];
        $foto_lado_conductor_res = $value['foto_conductor_ing'];
        $foto_mateleto_res = $value['foto_maletero_ing'];
        $foto_lado_pasajero_res = $value['foto_pasajero_ing'];

        /// firma 
        
        $firma_salida = $value['firma_salida'];
        $firma_ingreso = $value['firma_ingreso'];

        // usuarios

        $usuario_operaciones = $value['id_user_operaciones'];
        $usuario_counter = $value['id_user_counter'];
        $usuario_heaker = $value['id_user_heiker'];

        // fotos opera

        $op_foto_frente = $value['op_foto_frente'];
        $op_foto_coductor = $value['op_foto_coductor'];
        $op_foto_cajuela = $value['op_foto_cajuela'];
        $op_foto_pasajero = $value['op_foto_pasajero'];

    }

    if (!isset($foto_frente_res) || is_null($foto_frente_res)) {
        $foto_frente_res = '';
    }

    if (!isset($foto_lado_conductor_res) || is_null($foto_lado_conductor_res)) {
        $foto_lado_conductor_res = '';
    }

    if (!isset($foto_mateleto_res) || is_null($foto_mateleto_res)) {
        $foto_mateleto_res = '';
    }

    if (!isset($foto_lado_pasajero_res) || is_null($foto_lado_pasajero_res)) {
        $foto_lado_pasajero_res = '';
    }

    if (!isset($inspeccion1) || is_null($inspeccion1)) {
        $inspeccion1 = '';
    }

    if (!isset($inspeccion2) || is_null($inspeccion2)) {
        $inspeccion2 = '';
    }

    if (!isset($inspeccion3) || is_null($inspeccion3)) {
        $inspeccion3 = '';
    }

    if (!isset($inspeccion4) || is_null($inspeccion4)) {
        $inspeccion4 = '';
    }

    if (!isset($foto_frente) || is_null($foto_frente)) {
        $foto_frente = '';
    }

    if (!isset($foto_lado_conductor) || is_null($foto_lado_conductor)) {
        $foto_lado_conductor = '';
    }

    if (!isset($foto_mateleto) || is_null($foto_mateleto)) {
        $foto_mateleto = '';
    }

    if (!isset($foto_lado_pasajero) || is_null($foto_lado_pasajero)) {
        $foto_lado_pasajero = '';
    }

    if (!isset($firma_salida) || is_null($firma_salida)) {
        $firma_salida = '';
    }

    if (!isset($firma_ingreso) || is_null($firma_ingreso)) {
        $firma_ingreso = '';
    }

    if (!isset($usuario_operaciones) || is_null($usuario_operaciones)) {
        $usuario_operaciones = '';
    }

    if (!isset($usuario_counter) || is_null($usuario_counter)) {
        $usuario_counter = '';
    }

    if (!isset($usuario_heaker) || is_null($usuario_heaker)) {
        $usuario_heaker = '';
    }

    if (!isset($op_foto_frente) || is_null($op_foto_frente)) {
        $op_foto_frente = '';
    }

    if (!isset($op_foto_coductor) || is_null($op_foto_coductor)) {
        $op_foto_coductor = '';
    }

    if (!isset($op_foto_cajuela) || is_null($op_foto_cajuela)) {
        $op_foto_cajuela = '';
    }

    if (!isset($op_foto_pasajero) || is_null($op_foto_pasajero)) {
        $op_foto_pasajero = '';
    }


    $stmt = $pdo->query("INSERT INTO papeleta_revicion (inspeccion4, 
                                                        imspeccion,
                                                        imspeccion2,
                                                        imspeccion3,
                                                        foto_frente,
                                                        foto_lado_conductor,
                                                        foto_mateleto,
                                                        foto_lado_pasajero,
                                                        email_cliente, 
                                                        contrato, 
                                                        sucursal, 
                                                        unidad, 
                                                        placa, 
                                                        odometro, 
                                                        combustible, 
                                                        poliza_seguro, 
                                                        placa_revisado, 
                                                        formato_danios_menores, 
                                                        registro_unico_vehicula, 
                                                        stiker_panapass, 
                                                        pito_claxon, 
                                                        luces_direccionales, 
                                                        luces_traseras, 
                                                        luces_delanteras, 
                                                        aire_acondicionado, 
                                                        limpia_parabrisas, 
                                                        alfombras, 
                                                        herramientas, 
                                                        antenas, 
                                                        placa_pipa, 
                                                        extintor, 
                                                        gato, 
                                                        llanta_repuesto, 
                                                        copas_1234, 
                                                        base_antena, 
                                                        triangulo_seguridad, 
                                                        stat, 
                                                        firma_revicion, 
                                                        firma_salida,
                                                        firma_ingreso,
                                                        id_user_heiker_fin, 
                                                        id_papeleta_general, 
                                                        id_user_operaciones,
                                                        id_user_counter,
                                                        id_user_heiker, 
                                                        foto_frente_ing, 
                                                        foto_conductor_ing, 
                                                        foto_maletero_ing, 
                                                        foto_pasajero_ing, 
                                                        op_foto_frente,
                                                        op_foto_coductor,
                                                        op_foto_cajuela,
                                                        op_foto_pasajero)VALUES(
                                                        '".$imagen."',
                                                        '".$inspeccion1."' ,
                                                        '".$inspeccion2."' ,
                                                        '".$inspeccion3."' ,
                                                        '".$foto_frente."' ,
                                                        '".$foto_lado_conductor."' ,
                                                        '".$foto_mateleto."' ,
                                                        '".$foto_lado_pasajero."' ,
                                                        '".$email."',
                                                        '".$contrato."',
                                                        '".$sucursal."',
                                                        '".$unidad."',
                                                        '".$placa."',
                                                        '".$odometro."',
                                                        '".$combustible."',
                                                        '".$poliza_seguro."',
                                                        '".$placa_revisado."',
                                                        '".$formato_danios_menores."',
                                                        '".$registro_unico_vehicula."',
                                                        '".$stiker_panapass."',
                                                        '".$pito_claxon."',
                                                        '".$luces_direccionales."',
                                                        '".$luces_traseras."',
                                                        '".$luces_delanteras."',
                                                        '".$aire_acondicionado."',
                                                        '".$limpia_parabrisas."',
                                                        '".$alfombras."',
                                                        '".$herramientas."',
                                                        '".$antenas."',
                                                        '".$placa_pipa."',
                                                        '".$extintor."',
                                                        '".$gato."',
                                                        '".$llanta_repuesto."',
                                                        '".$copas_1234."',
                                                        '".$base_antena."',
                                                        '".$triangulo_seguridad."',
                                                        '".$stat."',
                                                        '".$firma."',
                                                        '".$firma_salida."',
                                                        '".$firma_ingreso."',
                                                        '".$_SESSION["id"]."', 
                                                        '".$id."', 
                                                        '".$usuario_operaciones."', 
                                                        '".$usuario_counter."', 
                                                        '".$usuario_heaker."', 
                                                        '".$foto_frente_res."', 
                                                        '".$foto_lado_conductor_res."', 
                                                        '".$foto_mateleto_res."', 
                                                        '".$foto_lado_pasajero_res."', 
                                                        '".$op_foto_frente."', 
                                                        '".$op_foto_coductor."', 
                                                        '".$op_foto_cajuela."', 
                                                        '".$op_foto_pasajero."')");
    
}elseif (isset($_GET['ver_detalles'])) { 
    
    $reg_pape = $pdo -> query("SELECT * FROM papeleta_general WHERE id = '".$_GET['id']."' and stat in(3,4)");
    $rows = $reg_pape->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $key => $value) {
    
    ?>

<div class="container">
    <h1>Resumen</h1>
    <br>
    <div class="container text-center" style="border: solid 1px #df3232; padding:20px;">
        <h2>Bitacora de Usuarios</h2>
        <br>
        <p><b>Usuario Operaciones</b>:  <?php echo get_usuarios($value['id_user_operaciones']); ?></p>
        <p><b>Usuario Counter</b>:  <?php echo get_usuarios($value['id_user_counter']); ?></p>
        <p><b>Usuario Hiker Check-out</b>:  <?php echo get_usuarios($value['id_user_heiker']); ?></p>
        <?php if ($value['id_user_heiker_fin'] == '' || is_null($value['id_user_heiker_fin'])) {
            echo '<p>Usuario no asignado</p>';
        }else{ ?>
        <p><b>Usuario Hiker Check-In</b>:  <?php echo get_usuarios($value['id_user_heiker_fin']); ?></p>
        <?php } ?>
    </div>
    <br>
    <div class="container text-center" style="border: solid 1px #df3232; padding:20px;">
    <h2>Counter</h2>
    <br>
        <div class="row">
            <div class="col-4">
                <h4>Email</h4>
                <input type="text" id="email" class="form-control" value="<?php echo $value['email_cliente']; ?>" readonly>
            </div>
            <div class="col-4">
                <h4>Contrato</h4>
                <input type="text" id="contrato" class="form-control" value="<?php echo $value['contrato']; ?>" readonly>
            </div>
            <div class="col-4">
                <h4>Sucursal</h4>
                <input type="text" id="sucursal" class="form-control" value="<?php echo $value['sucursal']; ?>" readonly>
            </div>
        </div>
    </div>
    <br>
    <div class="container text-center" style="border: solid 1px #df3232; padding:20px;">
    <h2>Operaciones</h2>
    <br>
        <div class="row">
            <div class="col-4">
                <h4>Unidad</h4>
                <input type="text" id="unidad" class="form-control" value="<?php echo $value['unidad']; ?>" readonly>
            </div>
            <div class="col-4">
                <h4>Placa</h4>
                <input type="text" id="placa" class="form-control" value="<?php echo $value['placa']; ?>" readonly>
            </div>
            <div class="col-4">
                <h4>Odometro</h4>
                <input type="text" id="odometro" class="form-control" value="<?php echo $value['odometro']; ?>" readonly>
            </div>
        </div>
    </div>
    <br>
    
    <div class="container text-center" style="border: solid 1px #df3232; padding:20px;">
        <h2>Combustible</h2>
        <br>
        <div class="row">
            <div class="col-4">
                
                <input class="form-check-input" disabled type="radio" id="combustible" name="combustible" value="Empty" <?php echo ($value['combustible'] == "Empty" ? "checked" : ""); ?>>
                <label>Empty</label>
                <br><br>
                
                <input class="form-check-input" disabled type="radio" id="combustible" name="combustible" value="3/8" <?php echo ($value['combustible'] == "3/8" ? "checked" : ""); ?>>
                <label>3/8</label>
                <br><br>
                
                <input class="form-check-input" disabled type="radio" id="combustible" name="combustible" value="3/4" <?php echo ($value['combustible'] == "3/4" ? "checked" : ""); ?>>
                <label>3/4</label>
                <br><br>
            </div>
            <div class="col-4">
                
                <input class="form-check-input" disabled type="radio" id="combustible" name="combustible" value="1/8" <?php echo ($value['combustible'] == "1/8" ? "checked" : ""); ?>>
                <label>1/8</label>
                <br><br>
                
                <input class="form-check-input" disabled type="radio" id="combustible" name="combustible" value="1/2" <?php echo ($value['combustible'] == "1/2" ? "checked" : ""); ?>>
                <label>1/2</label>
                <br><br>
                
                <input class="form-check-input" disabled type="radio" id="combustible" name="combustible" value="7/8" <?php echo ($value['combustible'] == "7/8" ? "checked" : ""); ?>>
                <label>7/8</label>
                <br><br>
            </div>
            <div class="col-4">
                
                <input class="form-check-input" disabled type="radio" id="combustible" name="combustible" value="1/4" <?php echo ($value['combustible'] == "1/4" ? "checked" : ""); ?>>
                <label>1/4</label>
                <br><br>
                
                <input class="form-check-input" disabled type="radio" id="combustible" name="combustible" value="5/8" <?php echo ($value['combustible'] == "5/8" ? "checked" : ""); ?>>
                <label>5/8</label>
                <br><br>
                
                <input class="form-check-input" disabled type="radio" id="combustible" name="combustible" value="Full" <?php echo ($value['combustible'] == "Full" ? "checked" : ""); ?>>
                <label>Full</label>
                <br><br>
            </div>

        </div>
    </div>
    <br>
    <div class="container text-left" style="border: solid 1px #df3232; padding:20px;">
        <div class="row">
            <div class="col-4" style="border: solid 1px #df3232;">
                <h2>Documentacion</h2>
                
                <input class="form-check-input" onclick="return false;" type="checkbox" id="poliza_seguro" value="1" <?php echo ($value['poliza_seguro'] == 1 ? 'checked' : ''); ?>>
                <label>Poliza de seguro</label>
                <br><br>
                
                <input class="form-check-input" onclick="return false;" type="checkbox" id="placa_revisado" value="1" <?php echo ($value['placa_revisado'] == 1 ? 'checked' : ''); ?>>
                <label>Placa y Revisado</label>
                <br><br>
                
                <input class="form-check-input" onclick="return false;" type="checkbox" id="formato_danios_menores" value="1" <?php echo ($value['formato_danios_menores'] == 1 ? 'checked' : ''); ?>>
                <label>Formato de Daños Menor</label>
                <br><br>
                
                <input class="form-check-input" onclick="return false;" type="checkbox" id="registro_unico_vehicula" value="1" <?php echo ($value['registro_unico_vehicula'] == 1 ? 'checked' : ''); ?>>
                <label>Registro Unico Vehicular</label>
                <br><br>
                
                <input class="form-check-input" onclick="return false;" type="checkbox" id="stiker_panapass" value="1" <?php echo ($value['stiker_panapass'] == 1 ? 'checked' : ''); ?>>
                <label>Sticker de Panapass</label>
                <br><br>
            </div>
            <div class="col-4" style="border: solid 1px #df3232;">
                <h2>Operatividad</h2>
                
                <input class="form-check-input" onclick="return false;" type="checkbox" id="pito_claxon" value="1" <?php echo ($value['pito_claxon'] == 1 ? 'checked' : ''); ?>>
                <label>Pito / Claxon</label>
                <br><br>
                
                <input class="form-check-input" onclick="return false;" type="checkbox" id="luces_direccionales" value="1" <?php echo ($value['luces_direccionales'] == 1 ? 'checked' : ''); ?>>
                <label>Luces Direccionales</label>
                <br><br>
                
                <input class="form-check-input" onclick="return false;" type="checkbox" id="luces_traseras" value="1" <?php echo ($value['luces_traseras'] == 1 ? 'checked' : ''); ?>>
                <label>Luces Traseras</label>
                <br><br>
                
                <input class="form-check-input" onclick="return false;" type="checkbox" id="luces_delanteras" value="1" <?php echo ($value['luces_delanteras'] == 1 ? 'checked' : ''); ?>>
                <label>Luces Delanteras</label>
                <br><br>
                
                <input class="form-check-input" onclick="return false;" type="checkbox" id="aire_acondicionado" value="1" <?php echo ($value['aire_acondicionado'] == 1 ? 'checked' : ''); ?>>
                <label>Aire Acondicionado</label>
                <br><br>
                
                <input class="form-check-input" onclick="return false;" type="checkbox" id="limpia_parabrisas" value="1" <?php echo ($value['limpia_parabrisas'] == 1 ? 'checked' : ''); ?>>
                <label>Limpia Parabrisas</label>
                <br><br>
            </div>
            <div class="col-4" style="border: solid 1px #df3232;">
                <h2>Accesorios</h2>
                
                <input class="form-check-input" onclick="return false;" type="checkbox" id="alfombras" value="1" <?php echo ($value['alfombras'] == 1 ? 'checked' : ''); ?>>
                <label>Alfombras</label>
                <br><br>
                
                <input class="form-check-input" onclick="return false;" type="checkbox" id="herramientas" value="1" <?php echo ($value['herramientas'] == 1 ? 'checked' : ''); ?>>
                <label>Herramientas</label>
                <br><br>
                
                <input class="form-check-input" onclick="return false;" type="checkbox" id="antenas" value="1" <?php echo ($value['antenas'] == 1 ? 'checked' : ''); ?>>
                <label>Antena</label>
                <br><br>
                
                <input class="form-check-input" onclick="return false;" type="checkbox" id="placa_pipa" value="1" <?php echo ($value['placa_pipa'] == 1 ? 'checked' : ''); ?>>
                <label>Palanca / Pipa</label>
                <br><br>
                
                <input class="form-check-input" onclick="return false;" type="checkbox" id="extintor" value="1" <?php echo ($value['extintor'] == 1 ? 'checked' : ''); ?>>
                <label>Extintor</label>
                <br><br>
                
                <input class="form-check-input" onclick="return false;" type="checkbox" id="gato" value="1" <?php echo ($value['gato'] == 1 ? 'checked' : ''); ?>>
                <label>Gato</label>
                <br><br>
                
                <input class="form-check-input" onclick="return false;" type="checkbox" id="llanta_repuesto" value="1" <?php echo ($value['llanta_repuesto'] == 1 ? 'checked' : ''); ?>>
                <label>Llanta de Repuesto</label>
                <br><br>
                
                <input class="form-check-input" onclick="return false;" type="checkbox" id="copas_1234" value="1" <?php echo ($value['copas_1234'] == 1 ? 'checked' : ''); ?>>
                <label>Copas 1 2 3 4</label>
                <br><br>
                
                <input class="form-check-input" onclick="return false;" type="checkbox" id="base_antena" value="1" <?php echo ($value['base_antena'] == 1 ? 'checked' : ''); ?>>
                <label>Base de Antena</label>
                <br><br>
                
                <input class="form-check-input" onclick="return false;" type="checkbox" id="triangulo_seguridad" value="1" <?php echo ($value['triangulo_seguridad'] == 1 ? 'checked' : ''); ?>>
                <label>Triangulo de Seguridad</label>
                <br><br>
            </div>
        </div>
    </div>
    <br>

    <div class="container text-center" style="border: solid 1px #df3232; padding:20px;">
    <h2>Inspeccion Operaciones</h2>
    <br>
        <img src="<?php echo $value['imspeccion']; ?>" alt="" srcset="">
    </div>
    <br>

    <div class="container text-center" style="border: solid 1px #df3232; padding:20px;">
    <h2>Inspeccion Hiker Check-out</h2>
    <br>
        <img src="<?php echo $value['imspeccion2']; ?>" alt="" srcset="">
    </div>
    <br>

    <div class="container text-center" style="border: solid 1px #df3232; padding:20px;">
    <h2>Inspeccion Hiker Check-In</h2>
    <br>
        <img src="<?php echo $value['imspeccion3']; ?>" alt="" srcset="">
    </div>
    <br>
    <div class="row text-center" style="border: solid 1px #df3232; padding:20px;">
        <h2>Fotos de Operaciones</h2>
        <br>
        <div class="col-6" style="padding:20px;">
            <img id="" width="250" src="<?php echo $value['op_foto_frente']; ?>">
        </div>
        <div class="col-6" style="padding:20px;">
            <img id="" width="250" src="<?php echo $value['op_foto_coductor']; ?>">
        </div>
        <div class="col-6" style="padding:20px;">
            <img id="" width="250" src="<?php echo $value['op_foto_cajuela']; ?>">
        </div>
        <div class="col-6" style="padding:20px;">
            <img id="" width="250" src="<?php echo $value['op_foto_pasajero']; ?>">
        </div>
    </div>
    <br>
    <div class="row text-center" style="border: solid 1px #df3232; padding:20px;">
        <h2>Fotos Check-out</h2>
        <br>
        <div class="col-6" style="padding:20px;">
            <img id="" width="250" src="<?php echo $value['foto_frente']; ?>" >
        </div>
        <div class="col-6" style="padding:20px;">
            <img id="" width="250" src="<?php echo $value['foto_lado_conductor']; ?>">
        </div>
        <div class="col-6" style="padding:20px;">
            <img id="" width="250" src="<?php echo $value['foto_mateleto']; ?>">
        </div>
        <div class="col-6" style="padding:20px;">
            <img id="" width="250" src="<?php echo $value['foto_lado_pasajero']; ?>">
        </div>
    </div>
    <br>
    <div class="row text-center" style="border: solid 1px #df3232; padding:20px;">
        <h2>Fotos Check-in</h2>
        <br>
        <div class="col-6" style="padding:20px;">
            <img id="" width="250" src="<?php echo $value['foto_frente_ing']; ?>" >
        </div>
        <div class="col-6" style="padding:20px;">
            <img id="" width="250" src="<?php echo $value['foto_conductor_ing']; ?>">
        </div>
        <div class="col-6" style="padding:20px;">
            <img id="" width="250" src="<?php echo $value['foto_maletero_ing']; ?>">
        </div>
        <div class="col-6" style="padding:20px;">
            <img id="" width="250" src="<?php echo $value['foto_pasajero_ing']; ?>">
        </div>
    </div>
    <br>
    <div class="container text-center">
    <h2>Firma Check-out</h2>
    <br>
        <img src="<?php echo $value['firma_salida']; ?>" style="border: solid 1px #df3232; padding:20px;">
    </div>
    <br>
    <div class="container text-center">
    <h2>Firma Conforme</h2>
    <br>
        <img src="<?php echo $value['firma_ingreso']; ?>" style="border: solid 1px #df3232; padding:20px;">
    </div>
    <br>
    <br>
    <br>
</div> 
    
<?php } 

}elseif(isset($_GET['ver_detalles_revision'])){ 

    
    $reg_pape = $pdo -> query("SELECT * FROM papeleta_revicion WHERE id_papeleta_general = '".$_GET['id']."' and stat = 5");
    $rows = $reg_pape->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $key => $value) {
    
    ?>

<div class="container">
    <h1 style="color:red;">REVISION</h1>
    <br>
    <div class="container text-center" style="border: solid 1px #df3232; padding:20px;">
        <h2>Bitacora de Usuarios</h2>
        <br>
        <p><b>Usuario Operaciones</b>:  <?php echo get_usuarios($value['id_user_operaciones']); ?></p>
        <p><b>Usuario Counter</b>:  <?php echo get_usuarios($value['id_user_counter']); ?></p>
        <p><b>Usuario Hiker Check-out</b>:  <?php echo get_usuarios($value['id_user_heiker']); ?></p>
        <p><b>Usuario Hiker Check-In</b>:  <?php echo get_usuarios($value['id_user_heiker_fin']); ?></p>
    </div>
    <br>
    
    <div class="container text-center" style="border: solid 1px #df3232; padding:20px;">
        <h2>Counter</h2>
        <br>
        <div class="row">
            <div class="col-4">
                <h4>Email</h4>
                <input type="text" id="email" class="form-control" value="<?php echo $value['email_cliente']; ?>" readonly>
            </div>
            <div class="col-4">
                <h4>Contrato</h4>
                <input type="text" id="contrato" class="form-control" value="<?php echo $value['contrato']; ?>" readonly>
            </div>
            <div class="col-4">
                <h4>Sucursal</h4>
                <input type="text" id="sucursal" class="form-control" value="<?php echo $value['sucursal']; ?>" readonly>
            </div>
        </div>
    </div>
    <br>
 
    <div class="container text-center" style="border: solid 1px #df3232; padding:20px;">
    <h2>Operaciones</h2>
    <br>
        <div class="row">
            <div class="col-4">
                <h4>Unidad</h4>
                <input type="text" id="unidad" class="form-control" value="<?php echo $value['unidad']; ?>" readonly>
            </div>
            <div class="col-4">
                <h4>Placa</h4>
                <input type="text" id="placa" class="form-control" value="<?php echo $value['placa']; ?>" readonly>
            </div>
            <div class="col-4">
                <h4>Odometro</h4>
                <input type="text" id="odometro" class="form-control" value="<?php echo $value['odometro']; ?>" readonly>
            </div>
        </div>
    </div>
    <br>
   
    <div class="container text-center" style="border: solid 1px #df3232; padding:20px;">
    <h2>Combustible</h2>
    <br>
        <div class="row">
            <div class="col-4">
                <label>Empty</label>
                <input class="form-check-input" disabled type="radio" id="combustible" name="combustible" value="Empty" <?php echo ($value['combustible'] == "Empty" ? "checked" : ""); ?>><br><br>
                <label>3/8</label>
                <input class="form-check-input" disabled type="radio" id="combustible" name="combustible" value="3/8" <?php echo ($value['combustible'] == "3/8" ? "checked" : ""); ?>><br><br>
                <label>3/4</label>
                <input class="form-check-input" disabled type="radio" id="combustible" name="combustible" value="3/4" <?php echo ($value['combustible'] == "3/4" ? "checked" : ""); ?>><br><br>
            </div>
            <div class="col-4">
                <label>1/8</label>
                <input class="form-check-input" disabled type="radio" id="combustible" name="combustible" value="1/8" <?php echo ($value['combustible'] == "1/8" ? "checked" : ""); ?>><br><br>
                <label>1/2</label>
                <input class="form-check-input" disabled type="radio" id="combustible" name="combustible" value="1/2" <?php echo ($value['combustible'] == "1/2" ? "checked" : ""); ?>><br><br>
                <label>7/8</label>
                <input class="form-check-input" disabled type="radio" id="combustible" name="combustible" value="7/8" <?php echo ($value['combustible'] == "7/8" ? "checked" : ""); ?>><br><br>
            </div>
            <div class="col-4">
                <label>1/4</label>
                <input class="form-check-input" disabled type="radio" id="combustible" name="combustible" value="1/4" <?php echo ($value['combustible'] == "1/4" ? "checked" : ""); ?>><br><br>
                <label>5/8</label>
                <input class="form-check-input" disabled type="radio" id="combustible" name="combustible" value="5/8" <?php echo ($value['combustible'] == "5/8" ? "checked" : ""); ?>><br><br>
                <label>Full</label>
                <input class="form-check-input" disabled type="radio" id="combustible" name="combustible" value="Full" <?php echo ($value['combustible'] == "Full" ? "checked" : ""); ?>><br><br>
            </div>

        </div>
    </div>
    <br>
    <div class="container text-left" style="border: solid 1px #df3232; padding:20px;">
        <div class="row">
            <div class="col-4" style="border: solid 1px #df3232;">
                <h2>Documentacion</h2>
                <label>Poliza de seguro</label>
                <input class="form-check-input" onclick="return false;" type="checkbox" id="poliza_seguro" value="1" <?php echo ($value['poliza_seguro'] == 1 ? 'checked' : ''); ?>><br><br>
                <label>Placa y Revisado</label>
                <input class="form-check-input" onclick="return false;" type="checkbox" id="placa_revisado" value="1" <?php echo ($value['placa_revisado'] == 1 ? 'checked' : ''); ?>><br><br>
                <label>Formato de Daños Menores</label>
                <input class="form-check-input" onclick="return false;" type="checkbox" id="formato_danios_menores" value="1" <?php echo ($value['formato_danios_menores'] == 1 ? 'checked' : ''); ?>><br><br>
                <label>Registro Unico Vehicular</label>
                <input class="form-check-input" onclick="return false;" type="checkbox" id="registro_unico_vehicula" value="1" <?php echo ($value['registro_unico_vehicula'] == 1 ? 'checked' : ''); ?>><br><br>
                <label>Sticker de Panapass</label>
                <input class="form-check-input" onclick="return false;" type="checkbox" id="stiker_panapass" value="1" <?php echo ($value['stiker_panapass'] == 1 ? 'checked' : ''); ?>><br><br>
            </div>
            <div class="col-4" style="border: solid 1px #df3232;">
                <h2>Operatividad</h2>
                <label>Pito / Claxon</label>
                <input class="form-check-input" onclick="return false;" type="checkbox" id="pito_claxon" value="1" <?php echo ($value['pito_claxon'] == 1 ? 'checked' : ''); ?>><br><br>
                <label>Luces Direccionales</label>
                <input class="form-check-input" onclick="return false;" type="checkbox" id="luces_direccionales" value="1" <?php echo ($value['luces_direccionales'] == 1 ? 'checked' : ''); ?>><br><br>
                <label>Luces Traseras</label>
                <input class="form-check-input" onclick="return false;" type="checkbox" id="luces_traseras" value="1" <?php echo ($value['luces_traseras'] == 1 ? 'checked' : ''); ?>><br><br>
                <label>Luces Delanteras</label>
                <input class="form-check-input" onclick="return false;" type="checkbox" id="luces_delanteras" value="1" <?php echo ($value['luces_delanteras'] == 1 ? 'checked' : ''); ?>><br><br>
                <label>Aire Acondicionado</label>
                <input class="form-check-input" onclick="return false;" type="checkbox" id="aire_acondicinado" value="1" <?php echo ($value['aire_acondicinado'] == 1 ? 'checked' : ''); ?>><br><br>
                <label>Limpia Parabrisas</label>
                <input class="form-check-input" onclick="return false;" type="checkbox" id="limpia_parabrisas" value="1" <?php echo ($value['limpia_parabrisas'] == 1 ? 'checked' : ''); ?>><br><br>
            </div>
            <div class="col-4" style="border: solid 1px #df3232;">
                <h2>Accesorios</h2>
                <label>Alfombras</label>
                <input class="form-check-input" onclick="return false;" type="checkbox" id="alfombras" value="1" <?php echo ($value['alfombras'] == 1 ? 'checked' : ''); ?>><br><br>
                <label>Herramientas</label>
                <input class="form-check-input" onclick="return false;" type="checkbox" id="herramientas" value="1" <?php echo ($value['herramientas'] == 1 ? 'checked' : ''); ?>><br><br>
                <label>Antena</label>
                <input class="form-check-input" onclick="return false;" type="checkbox" id="antenas" value="1" <?php echo ($value['antenas'] == 1 ? 'checked' : ''); ?>><br><br>
                <label>Palanca / Pipa</label>
                <input class="form-check-input" onclick="return false;" type="checkbox" id="placa_pipa" value="1" <?php echo ($value['placa_pipa'] == 1 ? 'checked' : ''); ?>><br><br>
                <label>Extintor</label>
                <input class="form-check-input" onclick="return false;" type="checkbox" id="extintor" value="1" <?php echo ($value['extintor'] == 1 ? 'checked' : ''); ?>><br><br>
                <label>Gato</label>
                <input class="form-check-input" onclick="return false;" type="checkbox" id="gato" value="1" <?php echo ($value['gato'] == 1 ? 'checked' : ''); ?>><br><br>
                <label>Llanta de Repuesto</label>
                <input class="form-check-input" onclick="return false;" type="checkbox" id="llanta_repuesto" value="1" <?php echo ($value['llanta_repuesto'] == 1 ? 'checked' : ''); ?>><br><br>
                <label>Copas 1 2 3 4</label>
                <input class="form-check-input" onclick="return false;" type="checkbox" id="copas_1234" value="1" <?php echo ($value['copas_1234'] == 1 ? 'checked' : ''); ?>><br><br>
                <label>Base de Antena</label>
                <input class="form-check-input" onclick="return false;" type="checkbox" id="base_antena" value="1" <?php echo ($value['base_antena'] == 1 ? 'checked' : ''); ?>><br><br>
                <label>Triangulo de Seguridad</label>
                <input class="form-check-input" onclick="return false;" type="checkbox" id="triangulo_seguridad" value="1" <?php echo ($value['triangulo_seguridad'] == 1 ? 'checked' : ''); ?>><br><br>
            </div>
        </div>
    </div>
    <br>
    
    <div class="container text-center" style="border: solid 1px #df3232; padding:20px;">
        <h2>Inspeccion Operaciones</h2>
        <br>
        <img src="<?php echo $value['imspeccion']; ?>" alt="" srcset="">
    </div>
    <br>
    
    <div class="container text-center" style="border: solid 1px #df3232; padding:20px;">
        <h2>Inspeccion Hiker Check-out</h2>
        <br>
        <img src="<?php echo $value['imspeccion2']; ?>" alt="" srcset="">
    </div>
    <br>
    
    <div class="container text-center" style="border: solid 1px #df3232; padding:20px;">
        <h2>Inspeccion Hiker Check-In</h2>
        <br>
        <img src="<?php echo $value['inspeccion4']; ?>" alt="" srcset="">
    </div>
    <br>

    <div class="row text-center" style="border: solid 1px #df3232; padding:20px;">
        <h2>Fotos de Operaciones</h2>
        <br>
        <div class="col-6" style="padding:20px;">
            <img id="" width="250" src="<?php echo $value['op_foto_frente']; ?>">
        </div>
        <div class="col-6" style="padding:20px;">
            <img id="" width="250" src="<?php echo $value['op_foto_coductor']; ?>">
        </div>
        <div class="col-6" style="padding:20px;">
            <img id="" width="250" src="<?php echo $value['op_foto_cajuela']; ?>">
        </div>
        <div class="col-6" style="padding:20px;">
            <img id="" width="250" src="<?php echo $value['op_foto_pasajero']; ?>">
        </div>
    </div>
    <br>
    
    <div class="row text-center" style="border: solid 1px #df3232; padding:20px;">
        <h2>Fotos Check-out</h2>
        <br>
        <div class="col-6" style="padding:20px;">
            <img id="" width="250" src="<?php echo $value['foto_frente']; ?>">
        </div>
        <div class="col-6" style="padding:20px;">
            <img id="" width="250" src="<?php echo $value['foto_lado_conductor']; ?>">
        </div>
        <div class="col-6" style="padding:20px;">
            <img id="" width="250" src="<?php echo $value['foto_mateleto']; ?>">
        </div>
        <div class="col-6" style="padding:20px;">
            <img id="" width="250" src="<?php echo $value['foto_lado_pasajero']; ?>">
        </div>
    </div>
    <br>
    <div class="row text-center" style="border: solid 1px #df3232; padding:20px;">
        <h2>Fotos Check in</h2>
        <br>
        <div class="col-6" style="padding:20px;">
            <img id="" width="250" src="<?php echo $value['foto_frente_ing']; ?>">
        </div>
        <div class="col-6" style="padding:20px;">
            <img id="" width="250" src="<?php echo $value['foto_conductor_ing']; ?>">
        </div>
        <div class="col-6" style="padding:20px;">
            <img id="" width="250" src="<?php echo $value['foto_maletero_ing']; ?>">
        </div>
        <div class="col-6" style="padding:20px;">
            <img id="" width="250" src="<?php echo $value['foto_pasajero_ing']; ?>">
        </div>
    </div>
    <div class="container text-center">
    <h2>Firma Check-out</h2>
    <br>
        <img src="<?php echo $value['firma_salida']; ?>" alt="" srcset="" style="border: solid 1px #df3232; padding:20px;">
    </div>
    <br>
    <div class="container text-center">
    <h2>Firma Revision</h2>
    <br>
        <img src="<?php echo $value['firma_revicion']; ?>" alt="" srcset="" style="border: solid 1px #df3232; padding:20px;">
    </div>
    <br>
    <br>
    <br>
</div> 
<input type="hidden" value="<?php echo $_GET['id']; ?>" name="id_revicion">
    
<?php } 

}elseif (isset($_POST['placa_papeleta'])) {

    $reg_pape = $pdo -> query("SELECT imspeccion3 FROM papeleta_general WHERE 
                                id = (SELECT 
                                        max(id)
                                        FROM 
                                        papeleta_general 
                                        WHERE 
                                        placa = '".$_POST['placa']."' 
                                        and 
                                        stat = 4) AND placa = '".$_POST['placa']."' AND stat = 4");

    $rows = $reg_pape->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $key => $value) {
        echo $value['imspeccion3'];
     }
    
} ?>