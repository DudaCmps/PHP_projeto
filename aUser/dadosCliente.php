<?php
session_start();
require __DIR__ . '/../vendor/autoload.php';

use \App\Entity\Usuario;

//consulta
$obUsuario = Usuario::getUsuario($_POST['id_user']);

//Valida
if (!$obUsuario instanceof Usuario) {
    header('location: listagemUsuarios.php?status=error');
    exit;
}
//Utilizando a mesma senha anterior
if (!empty($_POST['senha'])) {
    $obUsuario->senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
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


    header('location: editarPerfil.php?status=success');
    exit;
}
