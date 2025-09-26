<?php 
require __DIR__ . '/../vendor/autoload.php';
session_start();
include __DIR__.'/../includes/verificaAdmin.php';

use \App\Entity\Veiculo;

// Pega o id da reserva pela URL
$id_carro = $_GET['id_carro'] ?? null;

$obCarro = Veiculo::getVeiculo($id_carro);

//Valida o objeto reserva
 if ($obCarro instanceof Veiculo) {

    if ($obCarro->ativo_carro == 0) {
        //Se estiver desativado, ativa
        $obCarro->ativo_carro = 1;

    }elseif($obCarro->ativo_carro == 1){
        //Se estiver ativada, desativa
        $obCarro->ativo_carro = 0;
    }else{
        // Manda uma página para trás sem precisar de endereço fixo
        $voltar = $_SERVER['HTTP_REFERER'];
        header('Location: ' . $voltar.'?status=error');
        exit;
    }
    
    $obCarro->atualizar();

        // Manda uma página para trás sem precisar de endereço fixo
        $voltar = $_SERVER['HTTP_REFERER'];
        header('Location: ' . $voltar.'?status=success');
        exit;
}

// Manda uma página para trás sem precisar de endereço fixo
$voltar = $_SERVER['HTTP_REFERER'];
header('Location: ' . $voltar.'?status=error');
exit;



