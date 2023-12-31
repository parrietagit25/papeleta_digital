<?php 

try {
    $pdo = new PDO('mysql:host=db;dbname=papeleta_digital;charset=utf8mb4', 'root', 'rootpass');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}

function get_usuarios($id_user){

    try {
        $pdo = new PDO('mysql:host=db;dbname=papeleta_digital;charset=utf8mb4', 'root', 'rootpass');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }

    $usuario = $pdo -> query("SELECT * FROM usuarios WHERE id = '".$id_user."'");
    $rows = $usuario->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $key => $value) {
        $nombre = $value['nombre'];
    }

    return $nombre;

}

function generarCadenaAleatoria($longitud = 10) {
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numCaracteres = strlen($caracteres);
    $cadenaAleatoria = '';
    for ($i = 0; $i < $longitud; $i++) {
        $cadenaAleatoria .= $caracteres[rand(0, $numCaracteres - 1)];
    }
    return $cadenaAleatoria;
}
