<?php
require __DIR__ . '/../vendor/autoload.php';

use \App\Entity\Usuario;
use \App\Entity\Endereco;

$obUsuario = new Usuario;
$obEndereco = new Endereco;

//Validanção do post basico
if (!isset($_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['cpf'], $_POST['data_nasc'], $_POST['senha'], $_POST['perfil'])) {

    header('location: ../index2.php?status=error');
    exit;
}

//Cadastra usuario idependente do tipo
$obUsuario->nome = $_POST['nome'];
$obUsuario->email = $_POST['email'];
$obUsuario->telefone = $_POST['telefone'];
$obUsuario->cpf = $_POST['cpf'];
$obUsuario->data_nasc = $_POST['data_nasc'];
$obUsuario->senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$obUsuario->cadastrar();

//Verifica se é cliente, caso seja preenche endereço 
if ($_POST['perfil'] == 'cliente') {

    $obEndereco->fk_cliente = $obUsuario->id_user;
    $obEndereco->cidade = $_POST['cidade'];
    $obEndereco->estado = $_POST['estado'];
    $obEndereco->cep = $_POST['cep'];
    $obEndereco->bairro = $_POST['bairro'];
    $obEndereco->logradouro = $_POST['logradouro'];
    $obEndereco->numero = $_POST['numero'];
    $obEndereco->complemento = $_POST['complemento'];
    
    $obEndereco->cadastrar();
}

header('location: ../index.php?status=success');
exit;


