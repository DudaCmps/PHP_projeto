<?php
require __DIR__ . '/../vendor/autoload.php';
use App\Entity\Endereco;

header('Content-Type: application/json');

$id_endereco = $_POST['id_endereco'];

if (!isset($id_endereco) || !is_numeric($id_endereco)) {
    echo json_encode([
        'status' => 'error'
    ]);
    exit;;
}

// Consulta
$obEndereco = Endereco::getEndereco($id_endereco);

// Valida
if (!$obEndereco instanceof Endereco) {
    echo json_encode([
        'status' => 'error'
    ]);
    exit;
}

// Processa formulário
if (isset($_POST['cidade'], $_POST['estado'], $_POST['cep'], $_POST['bairro'], $_POST['logradouro'], $_POST['numero'], $_POST['complemento'])) {
    
    $obEndereco->cidade      = $_POST['cidade'];
    $obEndereco->estado      = $_POST['estado'];
    $obEndereco->cep         = $_POST['cep'];
    $obEndereco->bairro      = $_POST['bairro'];
    $obEndereco->logradouro  = $_POST['logradouro'];
    $obEndereco->numero      = $_POST['numero'];
    $obEndereco->complemento = $_POST['complemento'];

    if ($obEndereco->atualizar()) {
        echo json_encode([
            'status' => 'success'
        ]);
        exit;
    }
}

echo json_encode([
    'status' => 'error'
]);
exit;
