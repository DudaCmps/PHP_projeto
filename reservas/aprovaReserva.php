<?php 
require __DIR__ . '/../vendor/autoload.php';
include __DIR__.'/../includes/iniciaSessao.php';
include __DIR__.'/../includes/verificaAdmin.php';
use \App\Entity\Reserva;

// Pega o id da reserva pela URL
$id_reserva = $_GET['id_reserva'] ?? null;

$obReserva = Reserva::getReserva($id_reserva);

if ($obReserva instanceof Reserva) {
    if ($obReserva->estado == 'cancelada') {
        //Se estiver cancelada
        header('Location: ../reservas/listagemReservas.php?status=error');
        exit;

    }elseif ($obReserva->estado == 'confirmada') {
        //Se a reserva ja estiver confirmada
        header('Location: ../reservas/listagemReservas.php?status=error');
        exit;

    }elseif($obReserva->estado == 'pendente') {
        $obReserva->estado = 'confirmada';  
    }

    $obReserva->atualizar();
}

header('Location: ../reservas/listagemReservas.php');
