<?php 
session_start();
include '../conn/conn.php';

ini_set('display_errors', 1); // Desactivar/activar la visualización de errores

header('Content-Type: application/json');

$carpeta_destino = '../img/inspeccion/';
/*$data = json_decode(file_get_contents("php://input"));
$response = ["success" => false];

 if (isset($data->imagen)) {
    $imagen = $data->imagen;

    $imagen_base64 = preg_replace('#^data:image/\w+;base64,#i', '', $imagen);

    $imagen_binaria = base64_decode($imagen_base64);
    
    $nombre_archivo = uniqid() . '.png';

    if (file_put_contents($carpeta_destino . $nombre_archivo, $imagen_binaria)) {
        $response["success"] = true;
        $response["message"] = "Datos obtenidos con éxito";
        $response["payload"] = [
            "unidad" => $data->unidad,
            "placa" => $data->placa,
        ];
    } else {
        $response["error"] = 'No se pudo guardar la imagen.';
    }
} */


if (isset($_POST['imagen'])) {
    $dataUrl = $_POST['imagen'];
    $parts = explode(',', $dataUrl);

    // Check if it's base64 encoded
    if (count($parts) == 2 && strpos($parts[0], 'base64') !== false) {
        $base64 = $parts[1];
        $data = base64_decode($base64);

        // Define the file name and path
        $nombre_archivo = uniqid() . '.png';

        // Save the decoded base64 data as an image
        if (file_put_contents($carpeta_destino . $nombre_archivo, $data)) {
            $response["success"] = true;
            $response["message"] = "Datos obtenidos con éxito";
            $response["payload"] = [
                "unidad" => $_POST['unidad'],
                "placa" => $_POST['placa'],
            ];
        } else {
            $response["error"] = 'No se pudo guardar la imagen.';
        }
    } else {
        $response["error"] = 'Formato de imagen no válido.';
    }
} else {
    $response["error"] = 'No se ha enviado una imagen.';
}

    $unidad = $_POST['unidad'];
    $placa = $_POST['placa'];
    $odometro = $_POST['odometro'];
    $combustible = $_POST['combustible'];
    $poliza_seguro = isset($_POST['poliza_seguro']) ? $_POST['poliza_seguro'] : null;
    $placa_revisado = isset($_POST['placa_revisado']) ? $_POST['placa_revisado'] : null;
    $formato_danios_menores = isset($_POST['formato_danios_menores']) ? $_POST['formato_danios_menores'] : null;
    $registro_unico_vehicula = isset($_POST['registro_unico_vehicula']) ? $_POST['registro_unico_vehicula'] : null;
    $stiker_panapass = isset($_POST['stiker_panapass']) ? $_POST['stiker_panapass'] : null;
    $pito_claxon = isset($_POST['pito_claxon']) ? $_POST['pito_claxon'] : null;
    $luces_direccionales = isset($_POST['luces_direccionales']) ? $_POST['luces_direccionales'] : null;
    $luces_traseras = isset($_POST['luces_traseras']) ? $_POST['luces_traseras'] : null;
    $luces_delanteras = isset($_POST['luces_delanteras']) ? $_POST['luces_delanteras'] : null;
    $aire_acondicionado = isset($_POST['aire_acondicionado']) ? $_POST['aire_acondicionado'] : null;
    $limpia_parabrisas = isset($_POST['limpia_parabrisas']) ? $_POST['limpia_parabrisas'] : null;
    $alfombras = isset($_POST['alfombras']) ? $_POST['alfombras'] : null;
    $herramientas = isset($_POST['herramientas']) ? $_POST['herramientas'] : null;
    $antenas = isset($_POST['antenas']) ? $_POST['antenas'] : null;
    $placa_pipa = isset($_POST['placa_pipa']) ? $_POST['placa_pipa'] : null;
    $extintor = isset($_POST['extintor']) ? $_POST['extintor'] : null;
    $gato = isset($_POST['gato']) ? $_POST['gato'] : null;
    $llanta_repuesto = isset($_POST['llanta_repuesto']) ? $_POST['llanta_repuesto'] : null;
    $copas_1234 = isset($_POST['copas_1234']) ? $_POST['copas_1234'] : null;
    $base_antena = isset($_POST['base_antena']) ? $_POST['base_antena'] : null;
    $triangulo_seguridad = isset($_POST['triangulo_seguridad']) ? $_POST['triangulo_seguridad'] : null;

    // 4 imagenes de operacioens

    $rutaFotosRes = '../img/fotos_car_opera/';

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

    $stmt = $pdo->query("INSERT INTO papeleta_general 
    (op_foto_frente, op_foto_coductor, op_foto_cajuela, op_foto_pasajero, 
    imspeccion, id_user_operaciones, stat, unidad, placa, odometro, combustible, 
    poliza_seguro, placa_revisado, formato_danios_menores, registro_unico_vehicula, 
    stiker_panapass, pito_claxon, luces_direccionales, luces_traseras, luces_delanteras, 
    aire_acondicionado, limpia_parabrisas, alfombras, herramientas, antenas, placa_pipa, 
    extintor, gato, llanta_repuesto, copas_1234, base_antena, triangulo_seguridad)VALUES ('".$foto_frente."', '".$foto_conducto."',
    '".$foto_maletero."', '".$foto_pasajero."', '".$carpeta_destino . $nombre_archivo."',
    '".$_SESSION['id']."', 1,  '".$unidad."', '".$placa."', '".$odometro."', '".$combustible."', '".$poliza_seguro."',
    '".$placa_revisado."', '".$formato_danios_menores."', '".$registro_unico_vehicula."', '".$stiker_panapass."', '".$pito_claxon."', 
    '".$luces_direccionales."', '".$luces_traseras."',
    '".$luces_delanteras."', '".$aire_acondicionado."', '".$limpia_parabrisas."', '".$alfombras."', '".$herramientas."', '".$antenas."', '".$placa_pipa."', '".$extintor."',
    '".$gato."', '".$llanta_repuesto."', '".$copas_1234."', '".$base_antena."', '".$triangulo_seguridad."')");
    
    
    
    
    
    
echo json_encode($response);
?>