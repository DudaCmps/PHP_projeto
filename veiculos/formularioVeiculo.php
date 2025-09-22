<?php 
include __DIR__.'/../includes/verificaAdmin.php';
include __DIR__.'/../includes/navbarAdmin.php';

?>

<div class="d-flex flex-column flex-grow-1">
            <div class="m-4">
              <div class="row">
                <div class="col-12">

                  <div class="card">
                    <div class="card-header">
                      <strong>Cadastrar novo veículo</strong>
                    </div>

                    <div class="card-body">

        <form method="post" action="cadastrarVeiculo.php">

            <div class="mb-3">
                <label for="modelo" class="form-label">Modelos</label>
                <select name="modelo" class="form-select">
                    
                <option value="" disabled selected>Selecione uma opção</option>
                    <option value="1">Corolla</option>
                    <option value="2">Yaris</option>
                    <option value="3">Civic</option>
                    <option value="4">Fit</option>
                    <option value="5">Fiesta</option>
                    <option value="6">Focus</option>
                </select>
            </div>
    

            <div class="input-group mb-3">

                <label for="placa" class="input-group-text" id="basic-addon1">Placa</label>
                <input type="text"  name="placa" class="form-control me-3"style="border-radius: 0px 5px 5px 0px" maxlength="10">
                
                <label for="ano_fabricacao"class="input-group-text" id="basic-addon1" style="border-radius: 5px 0px 0px 5px">Ano de Fabricação</label>
                <input type="text" class="form-control" placeholder="YYYY" name="ano_fabricacao">
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria</label>
                <select name="categoria" class="form-select">
                    <option value="" disabled selected>Selecione uma opção</option>
                    
                    <option value="luxo">Luxo</option>
                    <option value="economico" >Econômico</option>
                    <option value="suv">SUV</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary mb-3 mt-2">Enviar</button>

        </form>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- FECHAMENTO DA NAV -->
<?php 
include __DIR__.'/../includes/footer.php';
?>