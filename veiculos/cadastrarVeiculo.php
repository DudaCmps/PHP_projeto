<?php
require __DIR__ . '/../vendor/autoload.php';
define('TITLE', 'Cadastrar Veículo');

use \App\Entity\Veiculo;

$obCarro = new Veiculo;

//VALIDANDO POST
if (isset($_POST['modelo'], $_POST['ano_fabricacao'], $_POST['placa'], $_POST['categoria'])) {
    
    $obCarro->fk_modelo = $_POST['modelo'];
    $obCarro->ano_fabricacao = $_POST['ano_fabricacao'];
    $obCarro->placa = $_POST['placa'];
    $obCarro->categoria = $_POST['categoria'];

    $obCarro->cadastrar();

    header('location: ../index.php?status=success');
    exit;
}

include __DIR__ . '/../includes/navbar.php';
include __DIR__.'/../includes/formularioVeiculo.php';