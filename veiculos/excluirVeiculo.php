<?php
require __DIR__ . '/../vendor/autoload.php';

use \App\Entity\Veiculo;

if (!isset($_GET['id_carro']) or !is_numeric($_GET['id_carro'])) {

    header('location: listagemVeiculos.php?status=error');
    exit;
}

//consulta
$obCarro = Veiculo::getVeiculo($_GET['id_carro']);

if ($obCarro->estado_carro == 'alugado') {
    header('location: listagemVeiculos.php?status=error');
    exit;
}

//Valida
if (!$obCarro instanceof Veiculo) {
    header('location: listagemVeiculos.php?status=error');
    exit;
}
$obCarro->excluir();

header('location: listagemVeiculos.php?status=success');
exit;




