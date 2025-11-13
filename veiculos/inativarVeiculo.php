<?php 
require __DIR__ . '/../vendor/autoload.php';
include __DIR__.'/../includes/iniciaSessao.php';
include __DIR__.'/../includes/verificaAdmin.php';
include __DIR__.'/../config.php';

use \App\Entity\Veiculo;

header('Content-Type: application/json');

$id_carro = $_GET['id_carro'];

$obCarro = Veiculo::getVeiculo($id_carro);


 if ($obCarro instanceof Veiculo) {

    if ($obCarro->ativo_carro == 0) {
        //Se estiver desativado, ativa
        $obCarro->ativo_carro = 1;

    }elseif($obCarro->ativo_carro == 1){
        //Se estiver ativada, desativa
        $obCarro->ativo_carro = 0;
    }

    if ($obCarro->atualizar()) {
        echo json_encode([
            'status' => 'success'
        ]);
        exit;
    }

}

echo json_encode([
    'status' => 'error'
]);
exit;