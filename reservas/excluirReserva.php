<?php
require __DIR__ . '/../vendor/autoload.php';
include __DIR__ . '/../config.php';


use \App\Entity\Reserva;
use \App\Entity\Aluguel;

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

//consulta alugueis
$obAlugueis = Aluguel::getAlugueis('fk_reserva='.$obReserva->id_reserva);

if ($obAlugueis != null) {

    // Manda uma página para trás sem precisar de endereço fixo
    $voltar = $_SERVER['HTTP_REFERER'];
    header('Location: ' . $voltar);
    exit;
}

$obReserva->excluir();

// Manda uma página para trás sem precisar de endereço fixo
$voltar = $_SERVER['HTTP_REFERER'];
header('Location: ' . $voltar);
exit;





