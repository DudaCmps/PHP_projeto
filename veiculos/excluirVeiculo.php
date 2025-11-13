<?php
require __DIR__ . '/../vendor/autoload.php';

use \App\Entity\Veiculo;

header('Content-Type: application/json');

if (!isset($_GET['id_carro']) or !is_numeric($_GET['id_carro'])) {
    echo json_encode([
        'status' => 'error'
    ]);
    exit;
}

//consulta
$obCarro = Veiculo::getVeiculo($_GET['id_carro']);

if ($obCarro->estado_carro == 'alugado') {
    echo json_encode([
        'status' => 'error',
        'message' => 'Esse veículo está alugado no momento!'
    ]);
    exit;
}

//Valida
if (!$obCarro instanceof Veiculo) {
    echo json_encode([
        'status' => 'error'
    ]);
    exit;
}

if ($obCarro->excluir()) {
    echo json_encode([
        'status' => 'success'
    ]);
    exit;
}

echo json_encode([
    'status' => 'error'
]);
exit;

