<?php
require __DIR__.'/vendor/autoload.php';

use \App\Entity\Manutencao;
use \App\Entity\Veiculo;

$obManutencao = new Manutencao;

$obCarro = Veiculo::getVeiculo($_GET['id_carro']);

//VALIDANDO POST
if(isset($_POST['id_carro'], $_POST['descricao'], $_POST['data_manutencao'])){

    $obManutencao->fk_carro = $_POST['id_carro'];
    $obManutencao->descricao = $_POST['descricao'];
    $obManutencao->data_manutencao = $_POST['data_manutencao'];
    $obManutencao->cadastrar();

    $obCarro->estado_carro = 'manutencao';
    $obCarro->atualizar();
    header('location: formularioManutencao.php?status=success');
    exit;
}

include __DIR__.'/includes/navbar.php';
include __DIR__.'/includes/formularioManutencao.php';