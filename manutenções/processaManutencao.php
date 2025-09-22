<?php
require __DIR__ . '/../vendor/autoload.php';

use \App\Entity\Manutencao;
use \App\Entity\Veiculo;

$obManutencao = new Manutencao;

//VALIDANDO POST
if(isset($_POST['id_carro'], $_POST['descricao'], $_POST['data_manutencao'])) {

    $id_carro = (int) $_POST['id_carro']; // pega do POST
    $obCarro = Veiculo::getVeiculo($id_carro);

    // Bloqueia manutenção se carro estiver alugado
    if ($obCarro->estado_carro == 'alugado') {
        header('location: ../veiculos/listagemVeiculos.php?status=error');
        exit;
    }

    // Cadastra manutenção
    $obManutencao->fk_carro = $id_carro;
    $obManutencao->descricao = $_POST['descricao'];
    $obManutencao->data_manutencao = $_POST['data_manutencao'];
    $obManutencao->cadastrar();

    // Atualiza estado do veículo
    $obCarro->estado_carro = 'manutencao';
    $obCarro->atualizar();

    header('location: ../veiculos/listagemVeiculos.php?status=success');
    exit;
}

// Se não veio POST válido, redireciona
header('location: ../veiculos/listagemVeiculos.php?status=error');
exit;


