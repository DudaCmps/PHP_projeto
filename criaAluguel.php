<?php
require __DIR__.'/vendor/autoload.php';

use \App\Entity\Aluguel;
use \App\Entity\Reserva;
use \App\Entity\Veiculo;

if(!isset($_GET['id_reserva']) or !is_numeric($_GET['id_reserva'])){
    header('location: index.php?status=error');
    exit;
}

$obReserva = Reserva::getReserva($_GET['id_reserva']);
$veiculo = Veiculo::getVeiculo($obReserva->fk_carro);

$obAluguel = new Aluguel;

//VALIDANDO POST
if (isset($_POST['data_inicio'], $_POST['data_final'])) {

    //converte datas
    date_default_timezone_set('America/Sao_Paulo');
    $categoria = $veiculo->categoria;

    $data_ini = date_create($_POST['data_inicio']);
    $data_fin = date_create($_POST['data_final']);

    $obAluguel->data_inicio = $data_ini;
    $obAluguel->data_final = $data_fin;

    $totalValor = $obAluguel->calcularValor($categoria);
    $obAluguel->fk_reserva = $obReserva->id_reserva;
    $obAluguel->valor = $totalValor;
    
    $obAluguel->cadastrar();

    $obReserva->estado = 'confirmada';
    $obReserva->atualizar();

    $veiculo->estado_carro = 'alugado';
    $veiculo->atualizar();

    header('location: index.php?status=success');
    exit;
}

include __DIR__.'/includes/navbar.php';
include __DIR__.'/includes/formularioAluguel.php';