<?php
session_start();
require __DIR__ . '/../vendor/autoload.php';

use \App\Entity\Reserva;
$reservas = Reserva::getReservas();

$obReserva = new Reserva;

$id_carro = $_GET['id_carro'];

//VALIDANDO POST
if(isset($id_carro)){

    foreach ($reservas as $reserva) {
        
        if (($reserva->fk_cliente ==  $_SESSION['id_user']) && ($reserva->fk_carro == $id_carro)) {
            header('location: ../clientes/index.php?status=error ');
            exit;
        }
    }

    $obReserva->fk_cliente = $_SESSION['id_user'];
    $obReserva->fk_carro = $id_carro;
    $obReserva->cadastrar();

    header('location: ../clientes/reservasCliente.php?status=success');
    exit;
}
