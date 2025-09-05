<?php
// echo  "<pre>"; print_r($_POST); echo "</pre>"; exit;
require __DIR__.'/vendor/autoload.php';

use \App\Entity\Manutencao;

if (!isset($_GET['id_manutencao']) or !is_numeric($_GET['id_manutencao'])) {

    header('location: index.php?status=error');
    exit;
}

//consulta
$obManutencao = Manutencao::getManutencao($_GET['id_manutencao']);

//Valida
if (!$obManutencao instanceof Manutencao) {
    header('location: index.php?status=error');
    exit;
}


$obManutencao->excluir();

header('location: listagemManutencao.php?status=success');
exit;




