<?php
require __DIR__ . '/../vendor/autoload.php';
include __DIR__.'/../includes/iniciaSessao.php';

header('Content-Type: application/json');

use \App\Entity\Reserva;
$reservas = Reserva::getReservas();

$obReserva = new Reserva;

$id_carro = $_GET['id_carro'];

//VALIDANDO POST
if(isset($id_carro)){

    foreach ($reservas as $reserva) {
        if (($reserva->fk_cliente ==  $_SESSION['id_user']) && ($reserva->fk_carro == $id_carro) && ($reserva->estado !=  'cancelada')) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Você ja possui uma reserva com esse veículo.'
            ]);
            exit;
        }
    }

    $obReserva->fk_cliente = $_SESSION['id_user'];
    $obReserva->fk_carro = $id_carro;

    if ($obReserva->cadastrar()) {
        echo json_encode([
            'status' => 'success'
        ]);
        exit;
    }
}
echo json_encode([
    'status' => 'error'
]);
exit;