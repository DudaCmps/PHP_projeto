<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Cliente;
use App\Entity\Veiculo;
use App\Entity\Reserva;
use App\Entity\Aluguel;
use App\Entity\Manutencao;


$clientes = Cliente::getClientes();
$veiculos = Veiculo::getVeiculos();
$reservas = Reserva::getReservas();
$alugueis = Aluguel::getAlugueis();
$manutencoes = Manutencao::getManutencoes();

include __DIR__.'/includes/navbar.php';
