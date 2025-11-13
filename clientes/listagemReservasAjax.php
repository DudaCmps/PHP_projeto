<?php 
include __DIR__ .'/../config.php';
include __DIR__.'/../includes/iniciaSessao.php';

use App\Entity\Reserva;
use App\Entity\Aluguel;

// Reservas do cliente
$obReserva = Reserva::getReservas('fk_cliente='.$_SESSION['id_user']);

// Verifica se existe algum aluguel ativo do usuário
$alugueisUsuario = Aluguel::getAlugueis('id_user='.$_SESSION['id_user']);
$aluguelConfirmado = !empty($alugueisUsuario);

$data = [];

foreach ($obReserva as $reserva) {

    // Verifica se a reserva já possui aluguel
    $obAluguel = Aluguel::getAlugueis('fk_reserva='.$reserva->id_reserva);
    if (!empty($obAluguel)) {
        continue; // pula esta reserva
    }

    $data[] = [
        'id_reserva' => $reserva->id_reserva,
        'nome' => $reserva->nome,
        'placa' => $reserva->placa,
        'status' => $reserva->estado,
        'aluguelConfirmado' => $aluguelConfirmado // true ou false
    ];
}

// Retorna JSON
header('Content-Type: application/json');
echo json_encode($data);
