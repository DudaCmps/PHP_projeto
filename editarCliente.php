<?php
// echo  "<pre>"; print_r($_POST); echo "</pre>"; exit;
require __DIR__.'/vendor/autoload.php';

define('TITLE', 'Editar Cliente');

use \App\Entity\Cliente;

if (!isset($_GET['id_cliente']) or !is_numeric($_GET['id_cliente'])) {
   
    header('location: index.php?status=error');
    exit;
}

$obCliente = Cliente::getCliente($_GET['id_cliente']);

if (!$obCliente instanceof Cliente) {
    header('location: index.php?status=error');
    exit;
}


//VALIDANDO POST
if(isset($_POST['nome'], $_POST['cpf'], $_POST['data_nasc'], $_POST['telefone'])){
    
    $obCliente->nome = $_POST['nome'];
    $obCliente->cpf = $_POST['cpf'];
    $obCliente->data_nasc = $_POST['data_nasc'];
    $obCliente->telefone = $_POST['telefone'];
    $obCliente->cadastrar();

    header('location: index.php?status=success');
    exit;
}

include __DIR__.'/includes/navbar.php';
include __DIR__.'/includes/formularioClientes.php';