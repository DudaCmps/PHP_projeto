<?php
require __DIR__.'/vendor/autoload.php';

use \App\Entity\Aluguel;
use \App\Entity\Reserva;
use \App\Entity\Veiculo;


if (!isset($_GET['id_reserva']) || !is_numeric($_GET['id_reserva'])) {
    header('location: index.php?status=error');
    exit;
}

$obReserva = Reserva::getReserva($_GET['id_reserva']);
$veiculo   = Veiculo::getVeiculo($obReserva->fk_carro);

if ($veiculo->estado_carro == 'alugado') {
    header('location: listagemReservas.php?status=error');exit;
}

$obAluguel = new Aluguel;


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['data_inicio'], $_POST['data_final'])) {

   
    date_default_timezone_set('America/Sao_Paulo');
    $dataInicio = new DateTime($_POST['data_inicio']);
    $dataFinal  = new DateTime($_POST['data_final']);

    
    if ($dataFinal < $dataInicio) {
        header('location: listagemReservas.php?status=error');
        var_dump($dataFinal);exit;
        exit;
    }

    $categoria = $veiculo->categoria;
    $obAluguel->data_inicio = $dataInicio;
    $obAluguel->data_final  = $dataFinal;
    $obAluguel->fk_reserva  = $obReserva->id_reserva;
    $obAluguel->valor       = $obAluguel->calcularValor($categoria);

    if ($veiculo->estado_carro == 'manutencao') {
        header('location: listagemReservas.php?status=error');
        exit;
    }

    $obAluguel->cadastrar();



    $obReserva->estado      = 'confirmada';
    $obReserva->atualizar();
    $veiculo->estado_carro  = 'alugado';
    $veiculo->atualizar();

 
    header('location: index.php?status=success');
    exit;
}


include __DIR__.'/includes/navbar.php';
include __DIR__.'/includes/formularioAluguel.php';
