<?php 
$carpeta_destino = '../img/inspeccion/';
$data = json_decode(file_get_contents("php://input"));

// Verificar si se ha enviado una imagen
if (isset($data->imagen)) {
    $imagen = $data->imagen;

    // Eliminar el prefijo de la imagen en Base64
    $imagen_base64 = preg_replace('#^data:image/\w+;base64,#i', '', $imagen);
    
    // Convertir Base64 a binario
    $imagen_binaria = base64_decode($imagen_base64);
    
    // Generar un nombre único para la imagen
    $nombre_archivo = uniqid() . '.png';

    // Guardar la imagen
    if (file_put_contents($carpeta_destino . $nombre_archivo, $imagen_binaria)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'No se pudo guardar la imagen.']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'No se ha enviado una imagen.']);
}
?>