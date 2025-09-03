<?php
require __DIR__.'/vendor/autoload.php';

use \App\Entity\Manutencao;

$obManutencao = new Manutencao;


//VALIDANDO POST
if(isset($_POST['id_carro'], $_POST['descricao'], $_POST['data_manutencao'])){

    $obManutencao->fk_carro = $_POST['id_carro'];
    $obManutencao->descricao = $_POST['descricao'];
    $obManutencao->data_manutencao = $_POST['data_manutencao'];
    
    $obManutencao->cadastrar();
    
    header('location: index.php?status=success');
    exit;
}

include __DIR__.'/includes/navbar.php';
include __DIR__.'/includes/formularioManutencao.php';