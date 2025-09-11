<?php
require __DIR__.'/vendor/autoload.php';
use App\Entity\Endereco;

$idEndereco = isset($_GET['id_endereco']) ? (int) $_GET['id_endereco'] : 0;

if ($idEndereco <= 0 ) {
    header('location: index.php?status=error');
    exit;
}

$obEndereco = Endereco::getEndereco($idEndereco);
if (!$obEndereco instanceof Endereco) {
    header('location: index.php?status=error');
    exit;
}

$obEndereco->excluir();

header('location: index.php?status=success');
exit;
