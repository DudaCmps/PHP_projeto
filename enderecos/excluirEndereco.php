<?php
require __DIR__ . '/../vendor/autoload.php';
use App\Entity\Endereco;

$idEndereco = isset($_GET['id_endereco']) ? (int) $_GET['id_endereco'] : 0;

if ($idEndereco <= 0 ) {

    $voltar = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
    header('Location: ' . $voltar.'?status=error');
    exit;

}

$obEndereco = Endereco::getEndereco($idEndereco);
if (!$obEndereco instanceof Endereco) {

    $voltar = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
    header('Location: ' . $voltar.'?status=error');
    exit;
    
}

$obEndereco->excluir();

$voltar = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
header('Location: ' . $voltar);
exit;
