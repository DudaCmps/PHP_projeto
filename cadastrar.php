<?php
// echo  "<pre>"; print_r($_POST); echo "</pre>"; exit;
require __DIR__.'/vendor/autoload.php';

use \App\Entity\Cliente;

//VALIDANDO POST
if(isset($_POST['nome'], $_POST['cpf'], $_POST['data_nasc'], $_POST['telefone'])){
    $obCliente = new Cliente;
    $obCliente->nome = $_POST['nome'];
    $obCliente->cpf = $_POST['cpf'];
    $obCliente->data_nasc = $_POST['data_nasc'];
    $obCliente->telefone = $_POST['telefone'];
    $obCliente->cadastrar();
}

include __DIR__.'/includes/navbar.php';
include __DIR__.'/includes/formulario.php';