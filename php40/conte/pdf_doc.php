<?php 
require_once '../vendor/autoload.php';
session_start();
include '../conn/conn.php';

// Inicializa Dompdf
use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('defaultFont', 'Arial');
$dompdf = new Dompdf($options);

$papelera = $pdo -> query("SELECT * FROM papeleta_general WHERE id = '".$_GET['id']."'");
$rows = $papelera->fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $key => $value) {

    function convertToSiNo($value) {
        if ($value == 1) {
            return "SI";
        } elseif ($value == 0 || $value == null || $value == "") {
            return "NO";
        }
        return $value; // Retornamos el valor original si no cumple con ninguna condición.
    }
    
    $poliza_seguro = convertToSiNo($value['poliza_seguro']);
    $placa_revisado = convertToSiNo($value['placa_revisado']);
    $formato_danios_menores = convertToSiNo($value['formato_danios_menores']);
    $registro_unico_vehicula = convertToSiNo($value['registro_unico_vehicula']);
    $stiker_panapass = convertToSiNo($value['stiker_panapass']);

    $pito_claxon = convertToSiNo($value['pito_claxon']);
    $luces_direccionales = convertToSiNo($value['luces_direccionales']);
    $luces_traseras = convertToSiNo($value['luces_traseras']);
    $luces_delanteras = convertToSiNo($value['luces_delanteras']);
    $aire_acondicionado = convertToSiNo($value['aire_acondicionado']);
    $limpia_parabrisas = convertToSiNo($value['limpia_parabrisas']);

    $alfombras = convertToSiNo($value['alfombras']);
    $herramientas = convertToSiNo($value['herramientas']);
    $antenas = convertToSiNo($value['antenas']);
    $placa_pipa = convertToSiNo($value['placa_pipa']);
    $extintor = convertToSiNo($value['extintor']);
    $gato = convertToSiNo($value['gato']);
    $llanta_repuesto = convertToSiNo($value['llanta_repuesto']);
    $copas_1234 = convertToSiNo($value['copas_1234']);
    $base_antena = convertToSiNo($value['base_antena']);
    $triangulo_seguridad = convertToSiNo($value['triangulo_seguridad']);

    $rutaOriginal = $value['imspeccion'];
    $rutaReemplazada = str_replace('../img/', 'img/', $rutaOriginal);

    $rutaOriginal = $value['firma_salida'];
    $firma_salida = str_replace('../img/', 'img/', $rutaOriginal);

    $rutaOriginal = $value['foto_frente'];
    $foto_frente = str_replace('../img/', 'img/', $rutaOriginal);

    $rutaOriginal = $value['foto_lado_conductor'];
    $foto_lado_conductor = str_replace('../img/', 'img/', $rutaOriginal);

    $rutaOriginal = $value['foto_mateleto'];
    $foto_mateleto = str_replace('../img/', 'img/', $rutaOriginal);

    $rutaOriginal = $value['foto_lado_pasajero'];
    $foto_lado_pasajero = str_replace('../img/', 'img/', $rutaOriginal);

$html = '
<h2>Operaciones</h2>
<table border="0">
    <tr>
        <td>Contrato</td>
        <td>..................................................'.$value['contrato'].'</td>
    </tr>
    <tr>
        <td>Sucursal</td>
        <td>..................................................'.$value['sucursal'].'</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>..................................................'.$value['email_cliente'].'</td>
    </tr>
    <tr>
        <td>Unidad</td>
        <td>..................................................'.$value['unidad'].'</td>
    </tr>
    <tr>
        <td>Placa</td>
        <td>..................................................'.$value['placa'].'</td>
    </tr>
    <tr>
        <td>Odometro</td>
        <td>..................................................'.$value['odometro'].'</td>
    </tr>
</table>
<br>
<h2>Combustible</h2>
<table border="0">
    <tr>
        <td>Combustible</td>
        <td>..................................................'.$value['combustible'].'</td>
    </tr>
</table> 
<br>
<h2>Documentacion</h2>
<table border="0">
    <tr>
        <td>Poliza de seguro</td>
        <td>..................................................'.$poliza_seguro.'</td>
    </tr>
    <tr>
        <td>Placa y Revisado</td>
        <td>..................................................'.$placa_revisado.'</td>
    </tr>
    <tr>
        <td>Formato de Daños Menores</td>
        <td>..................................................'.$formato_danios_menores.'</td>
    </tr>
    <tr>
        <td>Registro Unico Vehicular</td>
        <td>..................................................'.$registro_unico_vehicula.'</td>
    </tr>
    <tr>
        <td>Sticker de Panapass</td>
        <td>..................................................'.$stiker_panapass.'</td>
    </tr>
</table>
<br>
<h2>Operatividad</h2>
<table border="0">
    <tr>
        <td>Pito / Claxon</td>
        <td>..................................................'.$pito_claxon.'</td>
    </tr>
    <tr>
        <td>Luces Direccionales</td>
        <td>..................................................'.$luces_direccionales.'</td>
    </tr>
    <tr>
        <td>Luces Traseras</td>
        <td>..................................................'.$luces_traseras.'</td>
    </tr>
    <tr>
        <td>Luces Delanteras</td>
        <td>..................................................'.$luces_delanteras.'</td>
    </tr>
    <tr>
        <td>Aire Acondicionado</td>
        <td>..................................................'.$aire_acondicionado.'</td>
    </tr>
    <tr>
        <td>Limpia Parabrisas</td>
        <td>..................................................'.$limpia_parabrisas.'</td>
    </tr>
</table>
<br>
<h2>Operatividad</h2>
<table border="0">
    <tr>
        <td>Alfombras</td>
        <td>..................................................'.$pito_claxon.'</td>
    </tr>
    <tr>
        <td>Herramientas</td>
        <td>..................................................'.$luces_direccionales.'</td>
    </tr>
    <tr>
        <td>Antena</td>
        <td>..................................................'.$luces_traseras.'</td>
    </tr>
    <tr>
        <td>Palanca / Pipa</td>
        <td>..................................................'.$luces_delanteras.'</td>
    </tr>
    <tr>
        <td>Extintor</td>
        <td>..................................................'.$aire_acondicionado.'</td>
    </tr>
    <tr>
        <td>Gato</td>
        <td>..................................................'.$limpia_parabrisas.'</td>
    </tr>
    <tr>
        <td>Llanta de Repuesto</td>
        <td>..................................................'.$luces_traseras.'</td>
    </tr>
    <tr>
        <td>Copas 1 2 3 4</td>
        <td>..................................................'.$luces_delanteras.'</td>
    </tr>
    <tr>
        <td>Base de Antena</td>
        <td>..................................................'.$aire_acondicionado.'</td>
    </tr>
    <tr>
        <td>Triangulo de Seguridad</td>
        <td>..................................................'.$limpia_parabrisas.'</td>
    </tr>
</table>
<br>
<h2>Inspeccion</h2>
<h3><a href="http://localhost:8090/'.$rutaReemplazada.'" target="_blank">Ver Imagen</a> </h3>
<br>
<h2>Fotos</h2>
<h3><a href="http://localhost:8090/'.$foto_frente.'" target="_blank">Frente</a> </h3> <br>
<h3><a href="http://localhost:8090/'.$foto_lado_conductor.'" target="_blank">Lasdo del conductor</a> </h3> <br>
<h3><a href="http://localhost:8090/'.$foto_mateleto.'" target="_blank">Maletero</a> </h3> <br>
<h3><a href="http://localhost:8090/'.$foto_lado_pasajero.'" target="_blank">Lado del pasajero</a> </h3> <br>
<h2>Firma</h2>
<h3><a href="http://localhost:8090/'.$firma_salida.'" target="_blank">Ver Firma del Cliente</a> </h3> <br>
';

}

$dompdf->loadHtml($html);

// Establece el tamaño del papel y la orientación
$dompdf->setPaper('A4', 'portrait');

// Renderiza el HTML como PDF
$dompdf->render();

// Envía el PDF al navegador
$dompdf->stream('nombre_del_archivo.pdf', array('Attachment' => 0));
?>