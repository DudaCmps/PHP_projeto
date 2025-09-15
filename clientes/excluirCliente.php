<?php
require __DIR__ . '/../vendor/autoload.php';

use \App\Entity\Cliente;

if (!isset($_GET['id_cliente']) or !is_numeric($_GET['id_cliente'])) {

    header('location: listagemClientes.php?status=error');
    exit;
}

//consulta
$obCliente = Cliente::getCliente($_GET['id_cliente']);

//Valida
if (!$obCliente instanceof Cliente) {

    header('location: listagemClientes.php?status=error');
    exit;
}

$obCliente->excluir();

header('location: listagemClientes.php?status=success');
exit;




