<!-- Conteúdo formulario-->
<?php 
include __DIR__.'/../includes/iniciaSessao.php';
include __DIR__.'/../includes/navbarCliente.php';

$dataAtual = new DateTime();
$dataFormatada = $dataAtual->format('Y-m-d\TH:i'); 

$id_reserva = $_GET['id_reserva'];
?>

<div class="d-flex flex-column flex-grow-1">
            <div class="m-4">
              <div class="row">
                <div class="col-12">

                  <div class="card">
                    <div class="card-header">
                      <strong>Agendamento</strong>
                    </div>

                    <div class="card-body">

    <form method="post" action="criaAluguel.php">
                
              <input type="hidden" name="id_reserva" value="<?=$id_reserva?>">

              <div class="input-group mb-3">
                <label for="data_inicio" class="input-group-text">Data de Início</label>
                <input type="datetime-local" class="form-control me-3" name="data_inicio" id="data_inicio" 
                      style="border-radius: 0px 5px 5px 0px"
                      min="<?= $dataFormatada ?>" required>

                <label for="data_final" class="input-group-text" style="border-radius: 5px 0px 0px 5px">Data de Devolução</label>
                <input type="datetime-local" class="form-control" id="data_final" name="data_final" 
                      style="border-radius: 0px 5px 5px 0px"
                      min="<?= $dataFormatada ?>" required>
              </div>
              <!-- <div class="d-grid gap-2"> -->
                <button type="submit" class="btn btn-primary mb-3 mt-2">Alugar</button>
              <!-- </div> -->
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