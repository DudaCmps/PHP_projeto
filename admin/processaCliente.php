<?php
require __DIR__ . '/../vendor/autoload.php';

use \App\Entity\Usuario;
use \App\Entity\Endereco;

$obCliente = new Usuario;
$obEndereco = new Endereco;

//Validanção do post basico
if (!isset($_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['cpf'], $_POST['data_nasc'], $_POST['senha'])) {

    header('location: admin/index.php?status=error');
    exit;
}

if (Usuario::getUsuarioEmail($_POST['email'])) {
    header('Location: ../admin/formularioClientes.php?status=error');
    exit;
}

//Cadastra usuario idependente do tipo
$obCliente->nome = $_POST['nome'];
$obCliente->email = $_POST['email'];
$obCliente->telefone = $_POST['telefone'];
$obCliente->cpf = $_POST['cpf'];
$obCliente->data_nasc = $_POST['data_nasc'];
$obCliente->senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$obCliente->perfil = 'cliente';

$obCliente->cadastrar();

$obEndereco->fk_cliente = $obCliente->id_user;
$obEndereco->cidade = $_POST['cidade'];
$obEndereco->estado = $_POST['estado'];
$obEndereco->cep = $_POST['cep'];
$obEndereco->bairro = $_POST['bairro'];
$obEndereco->logradouro = $_POST['logradouro'];
$obEndereco->numero = $_POST['numero'];
$obEndereco->complemento = $_POST['complemento'];

$obEndereco->cadastrar();


header('location: index.php?status=success');
exit;