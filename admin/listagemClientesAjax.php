<?php
include __DIR__ . '/../config.php';


$data= [];

foreach ($usuarios as $usuario) {
    $data[] = [
        'id_user' => $usuario->id_user,
        'nome' => $usuario->nome,
        'cpf' => $usuario->cpf,
        'data_nasc' => date('d/m/Y', strtotime($usuario->data_nasc)),
        'ativo' => $usuario->ativo_usuario,
        'telefone' => $usuario->telefone,
        'perfil' => $usuario->perfil
    ];
}

header('Content-Type: application/json');
echo json_encode($data);