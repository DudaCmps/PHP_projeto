<?php
require __DIR__.'/vendor/autoload.php';

use App\Entity\Usuario;
use App\Entity\Veiculo;
use App\Entity\Manutencao;
use App\Entity\Aluguel;
use App\Entity\Reserva;


// pegar dados
$usuarios = Usuario::getUsuarios();
$veiculos = Veiculo::getVeiculos();
$manutencoes = Manutencao::getManutencoes();
$alugueis = Aluguel::getAlugueis();
$reservas = Reserva::getReservas();