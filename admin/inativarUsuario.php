<?php 
require __DIR__ . '/../vendor/autoload.php';
include __DIR__.'/../includes/iniciaSessao.php';
include __DIR__.'/../includes/verificaAdmin.php';
include __DIR__.'/../config.php';
use \App\Entity\Usuario;
use \App\Entity\Aluguel;

// Pega o id do usuário pela URL
$id_user = $_GET['id_user'] ?? null;

$obUsuario = Usuario::getUsuario($id_user);

$alugueisCliente = Aluguel::getAlugueis('id_user='.$id_user);

if (empty($alugueisCliente)) {
    $alugueisCliente->ativo_aluguel = 0;
}


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
