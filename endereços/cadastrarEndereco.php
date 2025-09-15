<?php
require __DIR__ . '/../vendor/autoload.php';
define('TITLE', 'Cadastrar Endereco');


use \App\Entity\Cliente;
use \App\Entity\Endereco;


$obEndereco = new Endereco;

if (!isset($_GET['id_cliente']) || empty($_GET['id_cliente'])) {
    header('location: ../index.php?status=error');
    exit;
}

$cli = Cliente::getCliente($_GET['id_cliente']);

//VALIDANDO POST
if(isset($_POST['cidade'], $_POST['estado'], $_POST['cep'], $_POST['bairro'], $_POST['logradouro'], $_POST['numero'], $_POST['complemento'])){

    $obEndereco->fk_cliente = $cli->id_cliente;
    $obEndereco->cidade = $_POST['cidade'];
    $obEndereco->estado = $_POST['estado'];
    $obEndereco->cep = $_POST['cep'];
    $obEndereco->bairro = $_POST['bairro'];
    $obEndereco->logradouro = $_POST['logradouro'];
    $obEndereco->numero = $_POST['numero'];
    $obEndereco->complemento = $_POST['complemento'];
    $obEndereco->cadastrar();
   
    header('location: ../index.php?status=success');
    exit;
}

include __DIR__.'/../includes/navbar.php';
include __DIR__.'/../includes/formularioEndereco.php';