<?php
require __DIR__ . '/../vendor/autoload.php';

use \App\Entity\Usuario;

if (!isset($_GET['id_user']) or !is_numeric($_GET['id_user'])) {

    header('location: listagemUsuarios.php?status=error');
    exit;
}

//consulta
$obUsuario = Usuario::getUsuario($_GET['id_user']);

//Valida
if (!$obUsuario instanceof Usuario) {
    header('location: listagemUsuarios.php?status=error');
    exit;
}

//VALIDANDO POST
if(isset($_POST['nome'], $_POST['cpf'], $_POST['data_nasc'], $_POST['telefone'])){
    
    $obUsuario->nome = $_POST['nome'];
    $obUsuario->cpf = $_POST['cpf'];
    $obUsuario->data_nasc = $_POST['data_nasc'];
    $obUsuario->telefone = $_POST['telefone'];
    $obUsuario->atualizar();

    header('location: listagemUsuarios.php?status=success');
    exit;
}
