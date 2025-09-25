<?php
require __DIR__ . '/../vendor/autoload.php';
include __DIR__.'/../includes/iniciaSessao.php';

use \App\Entity\Usuario;
use \App\Entity\Endereco;

$obEndereco = new Endereco;

if (!isset($_POST['id_user']) || empty($_POST['id_user'])) {
    header('location: ../index2.php?status=error');
    exit;
}

$client = Usuario::getUsuario($_POST['id_user']);

//VALIDANDO POST
if (isset($_POST['cidade'], $_POST['estado'], $_POST['cep'], $_POST['bairro'], $_POST['logradouro'], $_POST['numero'], $_POST['complemento'])) {

    $obEndereco->fk_cliente  = $client->id_user;
    $obEndereco->cidade      = $_POST['cidade'];
    $obEndereco->estado      = $_POST['estado'];
    $obEndereco->cep         = $_POST['cep'];
    $obEndereco->bairro      = $_POST['bairro'];
    $obEndereco->logradouro  = $_POST['logradouro'];
    $obEndereco->numero      = $_POST['numero'];
    $obEndereco->complemento = $_POST['complemento'];
    $obEndereco->cadastrar();
   
    if ($_SESSION['perfil'] === 'cliente') {
        header('location: listagemEnderecos.php?status=success');
        exit;
    }elseif($_SESSION['perfil'] === 'admin'){
        header('location: listagemEnderecos.php?id_user='.$client->id_user);
        exit;
    }
}
