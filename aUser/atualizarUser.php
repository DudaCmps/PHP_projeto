<?php
session_start();
require __DIR__ . '/../vendor/autoload.php';
use \App\Entity\Usuario;

//consulta
$obUsuario = Usuario::getUsuario($_POST['id_user']);

//Valida
if (!$obUsuario instanceof Usuario) {
    echo json_encode([
        'status' => 'error'
    ]);
    exit;
}

//Utilizando a mesma senha anterior
if (!empty($_POST['senha'])) {
    $obUsuario->senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
}

$obUsuarioExistente = Usuario::getUsuarioEmail($_POST['email']);

if ($obUsuarioExistente instanceof Usuario && $obUsuarioExistente->id_user != $_POST['id_user']) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Esse e-mail já está em uso.'
    ]);
    exit;
}

//VALIDANDO POST
if(isset($_POST['id_user'], $_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['cpf'], $_POST['data_nasc'], $_POST['perfil'])){

    $obUsuario->id_user = $_POST['id_user'];
    $obUsuario->nome = $_POST['nome'];
    $obUsuario->email = $_POST['email'];
    $obUsuario->telefone = $_POST['telefone'];
    $obUsuario->cpf = $_POST['cpf'];
    $obUsuario->data_nasc = $_POST['data_nasc'];
    $obUsuario->perfil = $_POST['perfil'];
    // Atualiza banco
    $obUsuario->atualizar();

    // Atualiza sessão
    $_SESSION['nome']     = $obUsuario->nome;
    $_SESSION['email']    = $obUsuario->email;

    echo json_encode([
        'status' => 'success',
        'message' => 'Atualizado com sucesso.'
    ]);
    exit;
} 

echo json_encode([
    'status' => 'error',
    'message' => 'Erro ao atualizar.'
]);
