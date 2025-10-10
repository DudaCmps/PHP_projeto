<?php
require __DIR__ . '/../vendor/autoload.php';

use \App\Entity\Veiculo;

header('Content-Type: application/json; charset=utf-8'); // define o tipo de retorno

$obCarro = new Veiculo;

//VALIDANDO POST
if (isset($_POST['modelo'], $_POST['ano_fabricacao'], $_POST['placa'], $_POST['categoria'])) {
    
    $obCarro->fk_modelo = $_POST['modelo'];
    $obCarro->ano_fabricacao = $_POST['ano_fabricacao'];
    $obCarro->placa = $_POST['placa'];
    $obCarro->categoria = $_POST['categoria'];

    $sucesso = $obCarro->cadastrar();

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