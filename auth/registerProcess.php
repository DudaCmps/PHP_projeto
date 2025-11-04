<?php
require __DIR__ . '/../vendor/autoload.php';
use \App\Entity\Usuario;
use \App\Entity\Endereco;

header('Content-Type: application/json; charset=utf-8');

$obUsuario = new Usuario();
$obEndereco = new Endereco();

// Previne erro de undefined index
$obUsuario->nome = $_POST['nome'] ?? '';
$obUsuario->email = $_POST['email'] ?? '';
$obUsuario->telefone = $_POST['telefone'] ?? '';
$obUsuario->cpf = $_POST['cpf'] ?? '';
$obUsuario->data_nasc = $_POST['data_nasc'] ?? '';
$obUsuario->senha = password_hash($_POST['senha'] ?? '', PASSWORD_DEFAULT);
$obUsuario->perfil = 'cliente';

// Tenta cadastrar usuário
if (!$obUsuario->cadastrar()) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Não foi possível cadastrar o usuário.'
    ]);
    exit;
}

// Cadastra endereço se existir
if (isset($_POST['cep'], $_POST['cidade'], $_POST['uf'], $_POST['numero'], $_POST['bairro'], $_POST['logradouro'], $_POST['complemento'])) {
    $obEndereco->fk_cliente = $obUsuario->id_user;
    $obEndereco->cidade = $_POST['cidade'];
    $obEndereco->estado = $_POST['uf'];
    $obEndereco->cep = $_POST['cep'];
    $obEndereco->bairro = $_POST['bairro'];
    $obEndereco->logradouro = $_POST['logradouro'];
    $obEndereco->numero = $_POST['numero'];
    $obEndereco->complemento = $_POST['complemento'];
    $obEndereco->cadastrar();
}

echo json_encode([
    'status' => 'success',
    'message' => 'Usuário cadastrado com sucesso!'
]);
exit;
