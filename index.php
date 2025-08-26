<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Cliente;
use App\Entity\Veiculo;

$clientes = Cliente::getClientes();

$veiculos = Veiculo::getVeiculos();


include __DIR__.'/includes/navbar.php';