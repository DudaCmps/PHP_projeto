<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE', 'Cadastrar Veículo');

use \App\Entity\Veiculo;
$obVeiculo = new Veiculo;

//VALIDANDO POST
if (isset($_POST['modelo'], $_POST['ano_fabricacao'], $_POST['placa'], $_POST['categoria'], $_POST['status'])) {
    
    $obVeiculo->id_modelo = $_POST['modelo'];
    $obVeiculo->ano_fabricacao = $_POST['ano_fabricacao'];
    $obVeiculo->placa = $_POST['placa'];
    $obVeiculo->categoria = $_POST['categoria'];
    $obVeiculo->estado = $_POST['status'];
    $obVeiculo->cadastrar();

    header('location : index.php?status=success');
    exit;
}


include __DIR__.'/includes/navbar.php';
include __DIR__.'/includes/formularioVeiculo.php';