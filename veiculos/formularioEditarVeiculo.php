<?php
include __DIR__.'/../includes/iniciaSessao.php';
include __DIR__ . '/../config.php';

use \App\Entity\Veiculo;

//consulta
$carro = Veiculo::getVeiculo($_GET['id_carro']);

if (!isset($carro)) {
  exit;
};

?>

<div class="d-flex flex-column flex-grow-1">
  <div class="row">

    <div class="mb-3">
      <input type="hidden" id="id_carro" value="<?=$carro->id_carro?>">
        <label for="modelo" class="form-label">Modelos</label>

        <select id="modelo" name="modelo" class="form-select">
        <option value="" disabled <?= empty($carro->fk_modelo) ? 'selected' : '' ?>>Selecione uma opção</option>
            <option value="1"  <?= $carro->fk_modelo === '1' ? 'selected' : '' ?>>Corolla</option>
            <option value="2"  <?= $carro->fk_modelo === '2' ? 'selected' : '' ?>>Yaris</option>
            <option value="3"  <?= $carro->fk_modelo === '3' ? 'selected' : '' ?>>Civic</option>
            <option value="4"  <?= $carro->fk_modelo === '4' ? 'selected' : '' ?>>Fit</option>
            <option value="5"  <?= $carro->fk_modelo === '5' ? 'selected' : '' ?>>Fiesta</option>
            <option value="6"  <?= $carro->fk_modelo === '6' ? 'selected' : '' ?>>Focus</option>
        </select>
       
        <div id="modeloError" class="text-danger small"></div>
    </div>

    <div class="input-group">

        <label for="placa" class="input-group-text" id="basic-addon1">Placa</label>
        <input type="text" id="placa" name="placa" class="form-control me-3"style="border-radius: 0px 5px 5px 0px" maxlength="10" value="<?=$carro->placa?>">
        
        <label for="ano_fabricacao"class="input-group-text" id="basic-addon1" style="border-radius: 5px 0px 0px 5px">Ano de Fabricação</label>
        <input type="text" id="ano_fabricacao" class="form-control" placeholder="YYYY" name="ano_fabricacao" value="<?=$carro->ano_fabricacao?>">
    </div>
    <div class="d-flex mb-1">
    <div id="placaError" class="text-danger small" style="margin-right: 172px;"></div>
    <div id="anoError" class="text-danger small"></div>
    </div>

    <div class="mb-3 mt-3">
        <label for="categoria" class="form-label">Categoria</label>
        <select id="categoria" name="categoria" class="form-select">
            <option value="" disabled <?= empty($carro->categoria) ? 'selected' : '' ?>>Selecione uma opção</option>
            <option value="luxo" <?= $carro->categoria === 'luxo' ? 'selected' : '' ?>>Luxo</option>
            <option value="economico" <?= $carro->categoria === 'economico' ? 'selected' : '' ?>>Econômico</option>
            <option value="suv" <?= $carro->categoria === 'suv' ? 'selected' : '' ?>>SUV</option>
        </select>

        <div id="categoriaError" class="text-danger small"></div>
    </div>
    <div class="form-text pb-3">Qualquer informação alterada deverá ser salva antes de sair da página.</div>

      <div class="input-group mb-3">
        <button onclick="atualizarVeiculo()" class="btn btn-outline-success" type="button">Salvar</button>
      </div>

  </div>
</div>