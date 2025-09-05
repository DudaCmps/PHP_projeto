<?php
// echo  "<pre>"; print_r($_POST); echo "</pre>"; exit;
require __DIR__.'/vendor/autoload.php';

use \App\Entity\Veiculo;

if (!isset($_GET['id_carro']) or !is_numeric($_GET['id_carro'])) {

    header('location: index.php?status=error');
    exit;
}

//consulta
$obCarro = Veiculo::getVeiculo($_GET['id_carro']);

//Valida
if (!$obCarro instanceof Veiculo) {
    header('location: index.php?status=error');
    exit;
}

//VALIDANDO POST
if (isset($_POST['modelo'], $_POST['ano_fabricacao'], $_POST['placa'], $_POST['categoria'], $_POST['status'])) {
    
    $obCarro->fk_modelo = $_POST['modelo'];
    $obCarro->ano_fabricacao = $_POST['ano_fabricacao'];
    $obCarro->placa = $_POST['placa'];
    $obCarro->categoria = $_POST['categoria'];
    $obCarro->estado = $_POST['status'];
    
    $obCarro->atualizar();

    header('location: listagemManutencao.php?status=success');
    exit;
}

include __DIR__.'/includes/navbar.php';
include __DIR__.'/includes/formularioVeiculo.php';