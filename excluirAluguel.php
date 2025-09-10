<?php
// echo  "<pre>"; print_r($_POST); echo "</pre>"; exit;
require __DIR__.'/vendor/autoload.php';

use \App\Entity\Aluguel;
use \App\Entity\Reserva;
use \App\Entity\Veiculo;


if (!isset($_GET['id_aluguel']) or !is_numeric($_GET['id_aluguel'])) {

    header('location: index.php?status=error');
    exit;
}

//consulta
$obAluguel = Aluguel::getAluguel($_GET['id_aluguel']);

//Valida
if (!$obAluguel instanceof Aluguel) {
    header('location: index.php?status=error');
    exit;
}

$obReserva = Reserva::getReserva($obAluguel->fk_reserva);
$obReserva->excluir();

$veiculo = Veiculo::getVeiculo($obReserva->fk_carro);

$veiculo->estado_carro = 'disponivel';
    $veiculo->atualizar();

$obAluguel->excluir();

header('location: index.php?status=success');
exit;




