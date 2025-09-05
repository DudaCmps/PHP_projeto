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
    if ($carro->estado_carro == 'disponivel') {
       $resultadosCarro .= '<option value="'.$carro->id_carro.'">'.$carro->nome.' - '.$carro->ano_fabricacao.' - '.$carro->placa.'</option>' ;
    }
   
}

?>
<!-- Conteúdo formulario-->

<div class="d-flex flex-column flex-grow-1">
            <div class="m-4">
              <div class="row">
                <div class="col-12">

                  <div class="card">
                    <div class="card-header">
                      <strong>Cadastro</strong>
                    </div>

                    <div class="card-body">

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

            <button type="submit" class="btn btn-primary mb-3 mt-2">Reservar</button>

        </form>
        </div>

</div>
</div>
</div>
</div>
</div>

<!-- FECHAMENTO DA NAV -->
</div>
</body>
</html>