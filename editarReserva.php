<?php
// echo  "<pre>"; print_r($_POST); echo "</pre>"; exit;
require __DIR__.'/vendor/autoload.php';

define('TITLE', 'Editar reserva');

use \App\Entity\Reserva;

if (!isset($_GET['id_reserva']) or !is_numeric($_GET['id_reserva'])) {

    header('location: index.php?status=error');
    exit;
}

//consulta
$obReserva= Reserva::getReserva($_GET['id_reserva']);

//Valida
if (!$obReserva instanceof Reserva) {
    header('location: index.php?status=error');
    exit;
}

if ($obReserva->estado == 'confirmada') {
     header('location: index.php?status=error');
    exit;
}

//VALIDANDO POST
if(isset($_POST['cliente'], $_POST['carro'])){

    $obReserva->fk_cliente = $_POST['cliente'];
    $obReserva->fk_carro = $_POST['carro'];
    
    $obReserva->atualizar();

    header('location: listagemReservas.php?status=success');
    exit;
}

include __DIR__.'/includes/navbar.php';
include __DIR__.'/includes/formularioReserva.php';