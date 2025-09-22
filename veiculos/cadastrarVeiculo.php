<?php
require __DIR__ . '/../vendor/autoload.php';

use \App\Entity\Veiculo;

$obCarro = new Veiculo;

//VALIDANDO POST
if (isset($_POST['modelo'], $_POST['ano_fabricacao'], $_POST['placa'], $_POST['categoria'])) {
    
    $obCarro->fk_modelo = $_POST['modelo'];
    $obCarro->ano_fabricacao = $_POST['ano_fabricacao'];
    $obCarro->placa = $_POST['placa'];
    $obCarro->categoria = $_POST['categoria'];

    $obCarro->cadastrar();

    header('location: ../admin/index.php?status=success');
    exit;
}
