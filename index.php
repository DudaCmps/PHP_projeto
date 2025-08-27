<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Cliente;
use App\Entity\Endereco;

$clientes = Cliente::getClientes();

include __DIR__.'/includes/navbar.php';