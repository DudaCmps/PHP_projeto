<?php
session_start();

require __DIR__ . '/../vendor/autoload.php';
use \App\Entity\Usuario;

header('Content-Type: application/json; charset=utf-8'); // Define retorno JSON

// busca user pelo email
$obUsuario = Usuario::getUsuarioEmail($_POST['email']);

if ($obUsuario && $obUsuario->ativo_usuario == 1 && password_verify($_POST['senha'], $obUsuario->senha)) {

    $_SESSION['id_user'] = $obUsuario->id_user;
    $_SESSION['nome']    = $obUsuario->nome;
    $_SESSION['perfil']  = $obUsuario->perfil;

    // se der bom
    echo json_encode([
        'status' => 'success',
        'perfil' => $obUsuario->perfil
    ]);

} else {
    // se der ruim
    echo json_encode([
        'status' => 'error',
        'message' => 'Usuário ou senha inválidos.'
    ]);
}

exit;
