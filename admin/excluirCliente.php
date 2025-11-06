<?php
require __DIR__ . '/../vendor/autoload.php';

use \App\Entity\Usuario;

header('Content-Type: application/json');

if (!isset($_GET['id_user']) or !is_numeric($_GET['id_user'])) {

    echo json_encode([
        'status' => 'error'
    ]);
    exit;
}

//consulta
$obUsuario = Usuario::getUsuario($_GET['id_user']);

//Valida
if (!$obUsuario instanceof Usuario) {

    echo json_encode([
        'status' => 'error'
    ]);
    exit;
}

if ($obUsuario->excluir()) {
    echo json_encode([
        'status' => 'success'
    ]);
    exit;
}

exit;




