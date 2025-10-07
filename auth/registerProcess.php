<?php
require __DIR__ . '/../vendor/autoload.php';

use \App\Entity\Usuario;

header('Content-Type: application/json; charset=utf-8'); // define o tipo de retorno

$obUsuario = new Usuario;
// $obEndereco = new Endereco;

//Cadastra usuario idependente do tipo
$obUsuario->nome = $_POST['nome'];
$obUsuario->email = $_POST['email'];
$obUsuario->telefone = $_POST['telefone'];
$obUsuario->cpf = $_POST['cpf'];
$obUsuario->data_nasc = $_POST['data_nasc'];
$obUsuario->senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$obUsuario->perfil = 'cliente';


if (!$obUsuario->cadastrar()) {

    echo json_encode([
        'status' => 'error',
        'message' => 'Não foi possível cadastrar.'
    ]);
    

}else{

    echo json_encode([
        'status' => 'success'
    ]);
    
    exit;
}



exit;

//Verifica se é cliente, caso seja preenche endereço 
// if ($_POST['perfil'] == 'cliente') {

//     $obEndereco->fk_cliente = $obUsuario->id_user;
//     $obEndereco->cidade = $_POST['cidade'];
//     $obEndereco->estado = $_POST['estado'];
//     $obEndereco->cep = $_POST['cep'];
//     $obEndereco->bairro = $_POST['bairro'];
//     $obEndereco->logradouro = $_POST['logradouro'];
//     $obEndereco->numero = $_POST['numero'];
//     $obEndereco->complemento = $_POST['complemento'];
    
//     $obEndereco->cadastrar();
// }