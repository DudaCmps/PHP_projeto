<?php 
include __DIR__.'/../includes/iniciaSessao.php';
include __DIR__ . '/../config.php';

$id_carro = isset($_GET['id_carro']) ? (int) $_GET['id_carro'] : 0;

if (!isset($id_carro)) {
  exit;
};

$dataAtual = new DateTime();
$dataFormatada = $dataAtual->format('Y-m-d'); 
?>

<div class="d-flex flex-column flex-grow-1">
  <div class="row">
        <input type="hidden" id="id_carro" name="id_carro" value="<?= $id_carro ?>">

          <div class="mb-3">
              <label class="form-label" for="exampleFormControlTextarea1">Descrição</label>
              <textarea class="form-control" id="descricao" rows="2" name="descricao"></textarea>
          </div>
          
          <div class="input-group mb-3">
            <label for="data_manutencao" class="input-group-text">Data da Manutenção</label>
            <input type="date" class="form-control" id="data_manutencao" name="data_manutencao" 
              min="<?=$dataFormatada ?>" required>
          </div>
        </div>
  </div>
</div>

