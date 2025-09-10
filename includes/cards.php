<?php 
use App\Entity\Reserva;
use App\Entity\Veiculo;
use App\Entity\Aluguel;

//CARD CLIENTE
$totalClientes = 0;
foreach ($clientes as $cliente) {
  $totalClientes++;
}

$totalReservas = 0;
foreach ($reservas as $reserva) {
  $totalReservas++;
}

//CARD VEICULO
$reservaRank = Reserva::getReservaRank();

$obCarroRank = Veiculo::getVeiculo($reservaRank->fk_carro);

//CARD VALOR ALUGUEL
$alugueis = Aluguel::getAlugueis();

$totalAluguel = 0;

foreach ($alugueis as $aluguel) {
  $totalAluguel += $aluguel->valor; 
}

//LISTAGEM ALUGUEL



?>

<div class="d-flex flex-column flex-grow-1">
<div class="m-4">
<div class="col-12">
          
    <div class="row g-4 mb-4">

            <div class="col-12 col-sm-6 col-xl-4 col-xxl-3">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                    <div class="fs-4 fw-semibold"><?=$totalClientes?></div>
                    <div>Clientes Ativos</div>
                    <div class="progress progress-white progress-thin my-2">
                        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div><small class="text-white text-opacity-75">Widget helper text</small>
                    </div>
                </div>
            </div>

            <!-- /.col-->
            <div class="col-12 col-sm-6 col-xl-4 col-xxl-3">
                        <div class="card text-white bg-warning">
                          <div class="card-body">
                            <div class="fs-4 fw-semibold"><?=$obCarroRank->nomeMarca.' '.$obCarroRank->nomeModelo.' '.$obCarroRank->ano_fabricacao?></div>
                            <div>Veículo mais alugado</div>
                            <div class="progress progress-white progress-thin my-2">
                              <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div><small class="text-white text-opacity-75">Widget helper text</small>
                          </div>
                        </div>
                      </div>
            <!-- /.col-->
            <div class="col-12 col-sm-6 col-xl-4 col-xxl-3">
                        <div class="card text-white bg-danger">
                          <div class="card-body">
                            <div class="fs-4 fw-semibold"><?='R$' . number_format($totalAluguel, 2, ",", ".")?></div>
                            <div>Valor total mensal</div>
                            <div class="progress progress-white progress-thin my-2">
                              <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div><small class="text-white text-opacity-75">Widget helper text</small>
                          </div>
                        </div>
                      </div>
            <!-- /.col-->
            <div class="col-12 col-sm-6 col-xl-4 col-xxl-3">
                        <div class="card text-white bg-info">
                          <div class="card-body">
                            <div class="fs-4 fw-semibold"><?=$totalReservas?></div>
                            <div>Reservas Ativas</div>
                            <div class="progress progress-white progress-thin my-2">
                              <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div><small class="text-white text-opacity-75">Widget helper text</small>
                          </div>
                        </div>
            </div>
            
    </div>

</div>
</div>


                
