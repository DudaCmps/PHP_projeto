<?php
// echo  "<pre>"; print_r($_POST); echo "</pre>"; exit;
require __DIR__.'/vendor/autoload.php';

define('TITLE', 'Editar Veículo');

use \App\Entity\Veiculo;

if (!isset($_GET['id_carro']) or !is_numeric($_GET['id_carro'])) {

    header('location: listagemVeiculos.php?status=error');
    exit;
}

//consulta
$obCarro = Veiculo::getVeiculo($_GET['id_carro']);


//Valida
if (!$obCarro instanceof Veiculo) {
    header('location: listagemVeiculos.php?status=error');
    exit;
}

//VALIDANDO POST
if (isset($_POST['modelo'], $_POST['ano_fabricacao'], $_POST['placa'], $_POST['categoria'])) {
    
    $obCarro->fk_modelo = $_POST['modelo'];
    $obCarro->ano_fabricacao = $_POST['ano_fabricacao'];
    $obCarro->placa = $_POST['placa'];
    $obCarro->categoria = $_POST['categoria'];
    
    $obCarro->atualizar();

    header('location: listagemVeiculos.php?status=success');
    exit;
}

include __DIR__.'/includes/navbar.php';
include __DIR__.'/includes/formularioVeiculo.php';