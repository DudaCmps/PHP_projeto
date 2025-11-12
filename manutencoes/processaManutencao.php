<?php
require __DIR__ . '/../vendor/autoload.php';
include __DIR__.'/../includes/iniciaSessao.php';
include __DIR__ . '/../config.php';

header('Content-Type: application/json; charset=utf-8'); // define o tipo de retorno

use \App\Entity\Manutencao;
use \App\Entity\Veiculo;

$obManutencao = new Manutencao;

//VALIDANDO POST
if(isset($_POST['id_carro'], $_POST['descricao'], $_POST['data_manutencao'])) {

    $id_carro = $_POST['id_carro']; 

    $obCarro = Veiculo::getVeiculo($id_carro);

        // Bloqueia manutenção se carro estiver alugado
        if ($obCarro->estado_carro == 'alugado') {
            echo json_encode([
                'status' => 'error',
                'message' => 'Carro já alugado.'
            ]);
            exit;
        }

} else {
        
    echo json_encode([
        'status' => 'success',
        'message' => 'Dados incompletos.'
    ]);
    exit;
}
    // Cadastra manutenção
    $obManutencao->fk_carro = $id_carro;
    $obManutencao->descricao = $_POST['descricao'];
    $obManutencao->data_manutencao = $_POST['data_manutencao'];
    $obManutencao->cadastrar();

    // Atualiza estado do veículo
    $obCarro->estado_carro = 'manutencao';
    $sucesso = $obCarro->atualizar();

    if (!$sucesso) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Não foi possível atualizar.'
        ]);
        exit;

    } else {
        echo json_encode([
            'status' => 'success',
            'message' => 'Veículo atualizado com sucesso.'
        ]);
        exit;
    }