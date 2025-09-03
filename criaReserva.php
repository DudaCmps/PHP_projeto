<?php
require __DIR__.'/vendor/autoload.php';

use \App\Entity\Reserva;

$obReserva= new Reserva;

//VALIDANDO POST
if(isset($_POST['cliente'], $_POST['carro'])){
    
    $obReserva->fk_cliente = $_POST['cliente'];
    $obReserva->fk_carro = $_POST['carro'];
    $obReserva->cadastrar();

    header('location: index.php?status=success');
    exit;
}

include __DIR__.'/includes/navbar.php';
include __DIR__.'/includes/formularioReserva.php';