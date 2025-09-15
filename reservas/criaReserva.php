<?php
require __DIR__ . '/../vendor/autoload.php';

use \App\Entity\Reserva;
$reservas = Reserva::getReservas();

$obReserva = new Reserva;

//VALIDANDO POST
if(isset($_POST['cliente'], $_POST['carro'])){

    foreach ($reservas as $reserva) {
        
        if (($reserva->fk_cliente ==  $_POST['cliente']) && ($reserva->fk_carro == $_POST['carro'])) {
            header('location: criaReserva.php?id_reserva= '.$reserva->id_reserva);
            exit;
        }
    }

    $obReserva->fk_cliente = $_POST['cliente'];
    $obReserva->fk_carro = $_POST['carro'];
    $obReserva->cadastrar();

    header('location: listagemReservas.php?status=success');
    exit;
}

include __DIR__ . '/../includes/navbar.php';
include __DIR__ . '/../includes/formularioReserva.php';