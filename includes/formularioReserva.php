<?php 
use \App\Entity\Cliente;
use App\Entity\Veiculo;

$clientes = Cliente::getClientes();
$veiculos = Veiculo::getVeiculos();

$resultadosCliente = '';
$resultadosCarro = '';

foreach ($clientes as $cliente) {
    $resultadosCliente .= '<option value="'.$cliente->id_cliente.'">'.$cliente->nome.'</option>';
}

foreach ($veiculos as $carro) {
    $resultadosCarro .= '<option value="'.$carro->id_carro.'">'.$carro->nome.'</option>';
}

?>
<!-- Conteúdo formulario-->

<div class="wrapper" style="margin-left:16rem;">
    <main class="container-fluid px-4 mt-3">

    <form method="post">
            <div class="mb-3">
                <label for="cliente" class="form-label">Clientes</label>
                
                <select name="cliente" class="form-select">
                <option value="" disabled selected>Selecione um cliente</option>
                <?=$resultadosCliente?>
                </select>
                <div id="emailHelp" class="form-text">Escolha o cliente que fará a reserva.</div>
            </div>

            <div class="mb-3">
                <label for="carro" class="form-label">Veículos</label>
                
                <select name="carro" class="form-select">
                <option value="" disabled selected>Selecione um carro</option>
                <?=$resultadosCarro?>
                </select>
                <div id="emailHelp" class="form-text">Escolha o carro para a reserva.</div>
            </div>

            <button type="submit" class="btn btn-primary">Reservar</button>

        </form>

    </main>
</div>