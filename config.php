<?php
require __DIR__.'/vendor/autoload.php';

use App\Entity\Usuario;
use App\Entity\Veiculo;

use App\Entity\Manutencao;

// pegar dados
$usuarios = Usuario::getUsuarios();
$veiculos = Veiculo::getVeiculos();

$manutencoes = Manutencao::getManutencoes();

