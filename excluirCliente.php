<?php
// echo  "<pre>"; print_r($_POST); echo "</pre>"; exit;
require __DIR__.'/vendor/autoload.php';

use \App\Entity\Cliente;

if (!isset($_GET['id_cliente']) or !is_numeric($_GET['id_cliente'])) {

    header('location: index.php?status=error');
    exit;
}

//consulta
$obCliente = Cliente::getCliente($_GET['id_cliente']);

//Valida
if (!$obCliente instanceof Cliente) {
    header('location: index.php?status=error');
    exit;
}

$obCliente->excluir();

header('location: ListagemClientes.php?status=success');
exit;




