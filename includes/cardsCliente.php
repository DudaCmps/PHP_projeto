<?php 
use App\Entity\Reserva;
use App\Entity\Veiculo;
use App\Entity\Aluguel;

include __DIR__ . '/../config.php';

//CARD RESERVAS
$minhasReservas = Reserva::getReservas('fk_cliente='.$_SESSION['id_user']);

$totalReservas = 0;
foreach ($minhasReservas as $reserva) {
  $totalReservas++;
}

//PROXIMA RESERVA

$reservaTemp = Reserva::getReservaUsuario($_SESSION['id_user'],null ,null,  null, 'reserva.id_reserva', 1);
foreach ($reservaTemp as $reserva) {
  $nextReserva = $reserva;
}


if (empty($nextReserva)) {
  $nextReserva = 'Nenhuma reserva proxima.';
}

//CARD VALOR GASTO
$meusalugueis = Aluguel::getAlugueis('fk_cliente ='. $_SESSION['id_user']);


$totalAluguel = 0;

foreach ($meusalugueis as $aluguel) {
  $totalAluguel += $aluguel->valor; 
}

?>

<div class="row g-4 m-4">
  <div class="p-4 bg-dark rounded position-relative flex-wrap" style="box-shadow: 0px 0px 19px -4px #00000075;">
    
    <!-- Botão de fechar -->
    <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-2" aria-label="Close" onclick="this.parentElement.style.display='none'"></button>
    
    <h3 class="fw-bold text-primary mb-1" style="font-family: 'Nunito', sans-serif;">
      Bem-vindo(a) ao Locafast!
    </h3>
    <p class="text-white-50 mb-0" style="font-family: 'Inter', sans-serif;">
      Lorem ipsum dolor sit amet consectetur adi.
    </p>
  </div>
</div>


<div class="d-flex flex-column flex-grow-1">
  <div class="m-4">
    <div class="row g-4 mb-4">

      <!-- Card Reservas Ativas -->
      <div class="col-12 col-sm-6 col-xl-4">
        <div class="card text-white bg-primary">
          <div class="card-body">
            <div class="fs-2 fw-bold"><?=$totalReservas?></div>
            <div class="text-white-50">Reservas Ativas</div>
            <div class="progress progress-white progress-thin my-2">
              <div class="progress-bar" role="progressbar" style="width: 70%"></div>
            </div>
            <small class="text-white text-opacity-75">Crescimento mensal</small>
          </div>
        </div>
      </div>

      <!-- Card Reservas Totais -->
      <div class="col-12 col-sm-6 col-xl-4">
        <div class="card text-white bg-warning">
          <div class="card-body">
            <div class="fs-2 fw-bold"><?=$nextReserva->nome_marca.' '.$nextReserva->nome_modelos?> – <?=$nextReserva->placa?></div>
            <div class="text-white-50">Próxima reserva</div>
            <div class="progress progress-white progress-thin my-2">
              <div class="progress-bar" role="progressbar" style="width: 70%"></div>
            </div>
            <small class="text-white text-opacity-75">Crescimento mensal</small>
          </div>
        </div>
      </div>

      <!-- Card Total Gasto -->
      <div class="col-12 col-sm-6 col-xl-4">
        <div class="card text-white bg-danger">
          <div class="card-body">
            <div class="fs-2 fw-bold">R$ <?=$totalAluguel?></div>
            <div class="text-white-50">Total Gasto</div>
            <div class="progress progress-white progress-thin my-2">
              <div class="progress-bar" role="progressbar" style="width: 45%"></div>
            </div>
            <small class="text-white text-opacity-75">Últimos 30 dias</small>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>



