<?php
require __DIR__ . '/../vendor/autoload.php';

use \App\Entity\Usuario;

if (!isset($_GET['id_user']) or !is_numeric($_GET['id_user'])) {

    header('location: listagemClientes.php?status=error');
    exit;
}

//consulta
$obUsuario = Usuario::getUsuario($_GET['id_user']);

//Valida
if (!$obUsuario instanceof Usuario) {

    header('location: listagemClientes.php?status=error');
    exit;
}

$obUsuario->excluir();

header('location: listagemClientes.php?status=success');
exit;




