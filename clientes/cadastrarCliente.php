<?php
require __DIR__ . '/../vendor/autoload.php';
define('TITLE', 'Cadastrar Cliente');


use \App\Entity\Cliente;
use \App\Entity\Endereco;

$obCliente = new Cliente;
$obEndereco = new Endereco;



//VALIDANDO POST
if(isset($_POST['nome'], $_POST['cpf'], $_POST['data_nasc'], $_POST['telefone'], $_POST['cidade'], $_POST['estado'], $_POST['cep'], $_POST['bairro'], $_POST['logradouro'], $_POST['numero'], $_POST['complemento'])){
    $obCliente->nome = $_POST['nome'];
    $obCliente->cpf = $_POST['cpf'];
    $obCliente->data_nasc = $_POST['data_nasc'];
    $obCliente->telefone = $_POST['telefone'];
    $obCliente->cadastrar();

    $obEndereco->fk_cliente = $obCliente->id_cliente;
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

include __DIR__ . '/../includes/navbar.php';
include __DIR__.'/../includes/formularioClientes.php';