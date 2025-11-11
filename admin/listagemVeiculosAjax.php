<?php 
include __DIR__ .'/../config.php';

$data=[];

foreach ($veiculos as $carro) {
    $data[] = [
        'id_carro' => $carro->id_carro,
        'nome_modelos' => $carro->nome_modelos,
        'ano_fabricacao' => $carro->ano_fabricacao,
        'placa' => $carro->placa,
        'categoria' => $carro->categoria,
        'status' => $carro->estado_carro,
        'ativo' => $carro->ativo_carro,
        'nomeMarca' => $carro->nomeMarca,
    ];
}

header('Content-Type: application/json');
echo json_encode($data);