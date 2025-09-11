<?php
require __DIR__.'/vendor/autoload.php';
use App\Entity\Endereco;

$idEndereco = isset($_GET['id_endereco']) ? (int) $_GET['id_endereco'] : 0;
$idCliente  = isset($_GET['id_cliente']) ? (int) $_GET['id_cliente'] : 0;

if ($idEndereco <= 0 || $idCliente <= 0) {
    header('location: index.php?status=error');
    exit;
}

$obEndereco = Endereco::getEndereco($idEndereco);
if (!$obEndereco instanceof Endereco) {
    header('location: index.php?status=error');
    exit;
}

$obEndereco->excluir();


header('location: listagemEnderecos.php?id_cliente=' . $idCliente . '&status=success');
exit;
