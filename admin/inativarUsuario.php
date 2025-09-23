<?php 
require __DIR__ . '/../vendor/autoload.php';
include __DIR__.'/../includes/verificaAdmin.php';
use \App\Entity\Usuario;

// Pega o id do usuário pela URL
$id_user = $_GET['id_user'] ?? null;

$obUsuario = Usuario::getUsuario($id_user);

if ($obUsuario instanceof Usuario) {
    if ($obUsuario->ativo_usuario == 0) {
        //Se estiver desativado, ativa
        $obUsuario->ativo_usuario = 1;

    }elseif ($obUsuario->ativo_usuario == 1) {
        //Se estiver ativado, desativa
        $obUsuario->ativo_usuario = 0;
    }
    $obUsuario->atualizar();
}

header('Location: listagemClientes.php');
