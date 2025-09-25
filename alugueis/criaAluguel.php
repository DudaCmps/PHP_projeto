<?php
require __DIR__ . '/../vendor/autoload.php';

use \App\Entity\Aluguel;
use \App\Entity\Reserva;
use \App\Entity\Veiculo;


if (!isset($_POST['id_reserva']) || !is_numeric($_POST['id_reserva'])) {
    header('Location: formularioAluguel.php?status=error');
    exit;
}

$obReserva = Reserva::getReserva($_POST['id_reserva']);
$veiculo   = Veiculo::getVeiculo($obReserva->fk_carro);

if ($veiculo->estado_carro == 'alugado') {
    header('location: ../reservas/listagemReservas.php?status=error');
    exit;

}

$obAluguel = new Aluguel;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['data_inicio'], $_POST['data_final'])) {

   
    date_default_timezone_set('America/Sao_Paulo');
    $dataInicio = new DateTime($_POST['data_inicio']);
    $dataFinal  = new DateTime($_POST['data_final']);

    if ($dataFinal < $dataInicio) {
        header('location: ../reservas/listagemReservas.php?status=error');
        exit;
    }

    $categoria = $veiculo->categoria;
    $obAluguel->data_inicio = $dataInicio;
    $obAluguel->data_final  = $dataFinal;
    $obAluguel->fk_reserva  = $obReserva->id_reserva;
    $obAluguel->valor       = $obAluguel->calcularValor($categoria);
    $obAluguel->ativo_aluguel  = 1;

    if ($veiculo->estado_carro == 'manutencao') {
        header('location: ../reservas/listagemReservas.php?status=error');       
        exit;
    }

    $obAluguel->cadastrar();

    $obReserva->estado      = 'confirmada';
    $obReserva->atualizar();

    $veiculo->estado_carro  = 'alugado';
    $veiculo->atualizar();

    header('location: ../clientes/alugueisCliente.php?status=success');
    exit;
}
