<?php 
require __DIR__ . '/../vendor/autoload.php';
use \App\Entity\Usuario;


if (!isset($_POST['email'], $_POST['senha']) && !empty($_POST['email']) && !empty($_POST['senha'])) {

    header('Location: /index.php?status=error');
} 

$obUsuario = Usuario::getUsuarioEmail($_POST['email']);
    
if ($obUsuario && password_verify($_POST['senha'], $obUsuario->senha)) {
    if ($obUsuario->perfil === 'admin') {
        //Inicia sessão de admin
        header('Location: ../clientes/index.php');
    }else{
        //Inicia sessão de cliente
        $_SESSION['id_user'] = $obUsuario->id_user;
        
    }
    
}else {
    header('Location: ../index.php?status=error');
}