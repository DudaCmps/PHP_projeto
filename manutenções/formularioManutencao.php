<?php 
include __DIR__.'/../includes/iniciaSessao.php';

include __DIR__ . '/../includes/navbarAdmin.php';

$id_carro = isset($_GET['id_carro']) ? (int) $_GET['id_carro'] : 0;

$dataAtual = new DateTime();
$dataFormatada = $dataAtual->format('Y-m-d'); 

?>

<div class="d-flex flex-column flex-grow-1">

  <div class="m-4">
    <div class="row">
      <div class="col-12">
        <div class="card">

          <div class="card-header">
            <strong>Agendamento para Manutenção</strong>
          </div>

          <div class="card-body">
            <form method="post" action="processaManutencao.php">

            <input type="hidden" name="id_carro" value="<?= $id_carro ?>">

            <div class="mb-3">
                <label class="form-label" for="exampleFormControlTextarea1">Descrição</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="descricao"></textarea>
            </div>

              
              <div class="input-group mb-3">
                <label for="data_manutencao" class="input-group-text">Data da Manutenção</label>
                <input type="date" class="form-control" id="data_manutencao" name="data_manutencao" 
                 min="<?=$dataFormatada ?>" required>
              </div>

              
              <button type="submit" class="btn btn-outline-primary mb-3 mt-2">Agendar</button>
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
