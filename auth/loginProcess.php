<?php
session_start(); // iniciar sessão

require __DIR__ . '/../vendor/autoload.php';
use \App\Entity\Usuario;

// Verifica se email e senha foram enviados
if (!isset($_POST['email'], $_POST['senha']) || empty($_POST['email']) || empty($_POST['senha'])) {
    header('Location: /index.php?status=error');
    exit;
}

// Busca usuário pelo email
$obUsuario = Usuario::getUsuarioEmail($_POST['email']);

// Verifica senha
if ($obUsuario && $obUsuario->ativo_usuario == 1 && password_verify($_POST['senha'], $obUsuario->senha)) {

    // Define dados da sessão
    $_SESSION['id_user'] = $obUsuario->id_user;
    $_SESSION['nome']    = $obUsuario->nome;
    $_SESSION['perfil']  = $obUsuario->perfil;
    
    // Redireciona conforme perfil
    if ($obUsuario->perfil === 'admin') {
        header('Location: ../admin/index.php');
    } else {
        header('Location: ../clientes/index.php');
    }
    exit;

} else {
    header('Location: ../index.php?status=error');
    exit;
}
