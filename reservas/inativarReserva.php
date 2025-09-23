<?php 
require __DIR__ . '/../vendor/autoload.php';
include __DIR__.'/../includes/verificaAdmin.php';
use \App\Entity\Reserva;

// Pega o id da reserva pela URL
$id_reserva = $_GET['id_reserva'] ?? null;

$obReserva = Reserva::getReserva($id_reserva);

if ($obReserva instanceof Reserva) {
    if ($obReserva->estado == 'cancelada') {
        //Se estiver desativado, ativa
        $obReserva->estado = 'pendente';

    }else{
        $obReserva->estado = 'cancelada';
    }

    $obReserva->atualizar();
}

header('Location: ../reservas/listagemReservas.php');
