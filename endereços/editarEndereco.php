<?php
require __DIR__ . '/../vendor/autoload.php';
use App\Entity\Endereco;

if (!isset($_GET['id_endereco']) || !is_numeric($_GET['id_endereco'])) {
    header('location: listagemEnderecos.php?status=error');
    exit;
}

// Consulta
$obEndereco = Endereco::getEndereco($_GET['id_endereco']);

// Valida
if (!$obEndereco instanceof Endereco) {
    header('location: listagemEnderecos.php?status=error');
    exit;
}

// Processa formulário
if (isset($_POST['cidade'], $_POST['estado'], $_POST['cep'], $_POST['bairro'], $_POST['logradouro'], $_POST['numero'], $_POST['complemento'])) {
    
    $obEndereco->cidade      = $_POST['cidade'];
    $obEndereco->estado      = $_POST['estado'];
    $obEndereco->cep         = $_POST['cep'];
    $obEndereco->bairro      = $_POST['bairro'];
    $obEndereco->logradouro  = $_POST['logradouro'];
    $obEndereco->numero      = $_POST['numero'];
    $obEndereco->complemento = $_POST['complemento'];

    $obEndereco->atualizar();

    // Redireciona para a lista de endereços do usuario
    header('location: listagemEnderecos.php?id_user=' . $obEndereco->fk_cliente . '&status=success');
    exit;
}

// Inclui navbar e formulário
include __DIR__ . '/../includes/navbar.php';
include __DIR__.'/../includes/formularioEndereco.php';