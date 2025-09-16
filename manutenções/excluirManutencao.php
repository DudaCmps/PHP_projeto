<?php
require __DIR__ . '/../vendor/autoload.php';

use \App\Entity\Manutencao;
use \App\Entity\Veiculo;

if (!isset($_GET['id_manutencao']) or !is_numeric($_GET['id_manutencao'])) {

    header('location: ../index2.php?status=error');
    exit;
}

//consulta
$obManutencao = Manutencao::getManutencao($_GET['id_manutencao']);
$obCarro = Veiculo::getVeiculo($obManutencao->fk_carro);

//Valida
if (!$obManutencao instanceof Manutencao) {
    header('location: ../index2.php?status=error');
    exit;
}

$obCarro->estado_carro = 'disponivel';
$obCarro->atualizar();

$obManutencao->excluir();

header('location: listagemManutencao.php?status=success');
exit;




