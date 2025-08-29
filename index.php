<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Cliente;
use App\Entity\Veiculo;
use App\Entity\Reserva;

$clientes = Cliente::getClientes();
$veiculos = Veiculo::getVeiculos();
$reservas = Reserva::getReservas();

include __DIR__.'/includes/navbar.php';