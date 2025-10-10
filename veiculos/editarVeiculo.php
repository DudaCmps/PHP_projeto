<?php
require __DIR__ . '/../vendor/autoload.php';
define('TITLE', 'Editar Veículo');

header('Content-Type: application/json; charset=utf-8'); // define o tipo de retorno

use \App\Entity\Veiculo;

if (!isset($_POST['id_carro']) or !is_numeric($_POST['id_carro'])) {

    echo json_encode([
        'status' => 'error',
        'message' => 'ID falho.'
    ]);
    exit;
}

//consulta
$obCarro = Veiculo::getVeiculo($_POST['id_carro']);

//Valida
if (!$obCarro instanceof Veiculo) {
    echo json_encode([
        'status' => 'error'
    ]);
    exit;
}

//VALIDANDO POST
if (isset($_POST['modelo'], $_POST['ano'], $_POST['placa'], $_POST['categoria'])) {
    
    $obCarro->fk_modelo = $_POST['modelo'];
    $obCarro->ano_fabricacao = $_POST['ano'];
    $obCarro->placa = $_POST['placa'];
    $obCarro->categoria = $_POST['categoria'];
    
    $sucesso = $obCarro->atualizar();

    if (!$sucesso) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Não foi possível cadastrar.'
        ]);
    } else {
        echo json_encode([
            'status' => 'success'
        ]);
    }
    exit;
}
exit;
