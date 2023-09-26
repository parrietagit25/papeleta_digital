<?php 
session_start();
include '../conn/conn.php';

ini_set('display_errors', 1); // Desactivar/activar la visualización de errores

header('Content-Type: application/json');

$carpeta_destino = '../img/inspeccion/';
$data = json_decode(file_get_contents("php://input"));
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
} else {
    $response["error"] = 'No se ha enviado una imagen.';
}

$poliza_seguro = isset($data->poliza_seguro) && $data->poliza_seguro !== '' ? $data->poliza_seguro : null;
$placa_revisado = isset($data->placa_revisado) && $data->placa_revisado !== '' ? $data->placa_revisado : null;
$formato_danios_menores = isset($data->formato_danios_menores) && $data->formato_danios_menores !== '' ? $data->formato_danios_menores : null;
$registro_unico_vehicula = isset($data->registro_unico_vehicula) && $data->registro_unico_vehicula !== '' ? $data->registro_unico_vehicula : null;
$stiker_panapass = isset($data->stiker_panapass) && $data->stiker_panapass !== '' ? $data->stiker_panapass : null;
$pito_claxon = isset($data->pito_claxon) && $data->pito_claxon !== '' ? $data->pito_claxon : null;
$luces_direccionales = isset($data->luces_direccionales) && $data->luces_direccionales !== '' ? $data->luces_direccionales : null;
$luces_traseras = isset($data->luces_traseras) && $data->luces_traseras !== '' ? $data->luces_traseras : null;
$luces_delanteras = isset($data->luces_delanteras) && $data->luces_delanteras !== '' ? $data->luces_delanteras : null;
$aire_acondicionado = isset($data->aire_acondicionado) && $data->aire_acondicionado !== '' ? $data->aire_acondicionado : null;
$limpia_parabrisas = isset($data->limpia_parabrisas) && $data->limpia_parabrisas !== '' ? $data->limpia_parabrisas : null;
$alfombras = isset($data->alfombras) && $data->alfombras !== '' ? $data->alfombras : null;
$herramientas = isset($data->herramientas) && $data->herramientas !== '' ? $data->herramientas : null;
$antenas = isset($data->antenas) && $data->antenas !== '' ? $data->antenas : null;
$placa_pipa = isset($data->placa_pipa) && $data->placa_pipa !== '' ? $data->placa_pipa : null;
$extintor = isset($data->extintor) && $data->extintor !== '' ? $data->extintor : null;
$gato = isset($data->gato) && $data->gato !== '' ? $data->gato : null;
$llanta_repuesto = isset($data->llanta_repuesto) && $data->llanta_repuesto !== '' ? $data->llanta_repuesto : null;
$copas_1234 = isset($data->copas_1234) && $data->copas_1234 !== '' ? $data->copas_1234 : null;
$base_antena = isset($data->base_antena) && $data->base_antena !== '' ? $data->base_antena : null;
$triangulo_seguridad = isset($data->triangulo_seguridad) && $data->triangulo_seguridad !== '' ? $data->triangulo_seguridad : null;


$stmt = $pdo->query("INSERT INTO papeleta_general (imspeccion, id_user_operaciones, stat, unidad, placa, odometro, combustible, poliza_seguro, placa_revisado, formato_danios_menores, registro_unico_vehicula, stiker_panapass, pito_claxon, luces_direccionales, luces_traseras, luces_delanteras, aire_acondicionado, limpia_parabrisas, alfombras, herramientas, antenas, placa_pipa, extintor, gato, llanta_repuesto, copas_1234, base_antena, triangulo_seguridad)
VALUES ('".$carpeta_destino . $nombre_archivo."', '".$_SESSION["id"]."', 1, '".$data->unidad."', '".$data->placa."', '".$data->odometro."', '".$data->combustible."', '".$poliza_seguro."', '".$placa_revisado."', '".$formato_danios_menores."', '".$registro_unico_vehicula."', '".$stiker_panapass."', '".$pito_claxon."', '".$luces_direccionales."', '".$luces_traseras."', '".$luces_delanteras."', '".$aire_acondicionado."', '".$limpia_parabrisas."', '".$alfombras."', '".$herramientas."', '".$antenas."', '".$placa_pipa."', '".$extintor."', '".$gato."', '".$llanta_repuesto."', '".$copas_1234."', '".$base_antena."', '".$triangulo_seguridad."')");

echo json_encode($response);
?>