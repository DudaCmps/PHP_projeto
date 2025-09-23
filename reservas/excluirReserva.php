<?php
require __DIR__ . '/../vendor/autoload.php';

use \App\Entity\Reserva;

if (!isset($_GET['id_reserva']) or !is_numeric($_GET['id_reserva'])) {

    header('location: ../clientes/reservasCliente.php?status=error');
    exit;
}

//consulta
$obReserva = Reserva::getReserva($_GET['id_reserva']);

//Valida
if (!$obReserva instanceof Reserva) {
    header('location: ../clientes/reservasCliente.php?status=error');
    exit;
}

if ($obReserva->estado == 'confirmada') {
    header('location: ../clientes/reservasCliente.php?status=error');
    exit;
}

$obReserva->excluir();

// Manda uma página para trás sem precisar de endereço fixo
$voltar = $_SERVER['HTTP_REFERER'] ?? '../index.php';
header('Location: ' . $voltar);
exit;





