<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Cliente;

$clientes = Cliente::getClientes();


include __DIR__.'/includes/navbar.php';