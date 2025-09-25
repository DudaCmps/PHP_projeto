<?php 
require __DIR__ . '/../vendor/autoload.php';
session_start();
use \App\Entity\Reserva;

// Pega o id da reserva pela URL
$id_reserva = $_GET['id_reserva'] ?? null;

$obReserva = Reserva::getReserva($id_reserva);

//Valida o objeto reserva
 if ($obReserva instanceof Reserva /*&& empty($obReserva)*/) {

    if ($_SESSION['perfil'] === 'admin') {
    
        if ($obReserva->estado == 'cancelada') {
            //Se estiver desativado, ativa
            $obReserva->estado = 'pendente';
    
        }elseif($obReserva->estado == 'pendente'){
            //Se estiver ativada, desativa
            $obReserva->estado = 'cancelada';
        }else{
            header('Location: ../reservas/listagemReservas.php?status=error');
        }
        $obReserva->atualizar();

        header('Location: ../reservas/listagemReservas.php');
        exit;

    }elseif ($_SESSION['perfil'] === 'cliente') {

        if ($obReserva->estado != null) {

            //Se não for nula, desativa. Para o cliente, ele deletou
            $obReserva->estado = 'cancelada';

            $obReserva->atualizar();
            header('Location:'. $_SERVER['HTTP_REFERER']);
            exit;
    
        }
    }
}



