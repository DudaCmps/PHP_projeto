<?php 
include __DIR__.'/../includes/iniciaSessao.php';
include __DIR__.'/../includes/navbarAdmin.php';
include __DIR__ . '/../config.php';    
?>

<!-- MODAL ADICIONAR NOVO VEÍCULO -->
<div class="modal fade" id="carroNovoModal" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Cadastrar novo veículo</h1>
        <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form method="post">

            <div class="mb-3">
                <label for="modelo" class="form-label">Modelos</label>

                <select id="modelo" name="modelo" class="form-select">
                <option value="" disabled selected>Selecione uma opção</option>
                    <option value="1">Corolla</option>
                    <option value="2">Yaris</option>
                    <option value="3">Civic</option>
                    <option value="4">Fit</option>
                    <option value="5">Fiesta</option>
                    <option value="6">Focus</option>
                </select>
                <div id="modeloError" class="text-danger small"></div>
            </div>

            <div class="input-group">

                <label for="placa" class="input-group-text" id="basic-addon1">Placa</label>
                <input type="text" id="placa" name="placa" class="form-control me-3"style="border-radius: 0px 5px 5px 0px" maxlength="10">
                
                <label for="ano_fabricacao"class="input-group-text" id="basic-addon1" style="border-radius: 5px 0px 0px 5px">Ano de Fabricação</label>
                <input type="text" id="ano_fabricacao" class="form-control" placeholder="YYYY" name="ano_fabricacao">
            </div>
            <div class="d-flex mb-1">
            <div id="placaError" class="text-danger small" style="margin-right: 172px;"></div>
            <div id="anoError" class="text-danger small"></div>
            </div>

            <div class="mb-3 mt-3">
                <label for="categoria" class="form-label">Categoria</label>
                <select id="categoria" name="categoria" class="form-select">
                    <option value="" disabled selected>Selecione uma opção</option>
                    
                    <option value="luxo">Luxo</option>
                    <option value="economico" >Econômico</option>
                    <option value="suv">SUV</option>
                </select>
                <div id="categoriaError" class="text-danger small"></div>
            </div>

            </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-outline-danger" data-coreui-dismiss="modal">Cancelar</button>
        <input onclick="cadastrarVeiculo()" type="button" class="btn btn-sm btn-outline-success" value="Salvar">
      </div>
    </div>
  </div>
</div>
<!--FIM MODAL ADICIONAR NOVO CLIENTE -->

<!-- MODAL EDITAR VEICULO -->
<div class="modal fade" id="carroEditar" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar</h1>
        <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
      </div>
    <div class="modal-body">
        <div id="conteudoEditarVeiculo">
            
        </div>
    </div>
    </div>
  </div>
</div>
<!--FIM MODAL EDITAR VEICULO -->

<!-- MODAL MANUTENÇÃO -->
<div class="modal fade" id="manutencaoModal" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Manutenção</h1>
        <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="conteudoManutencaoVeiculo">

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-outline-danger" data-coreui-dismiss="modal">Cancelar</button>
        <input onclick="agendaManutencao()" type="button" class="btn btn-sm btn-outline-primary" value="Salvar">
      </div>
    </div>
  </div>
</div>
<!--FIM MODAL MANUTENÇÃO -->

<div class="d-flex flex-column flex-grow-1">

<div class="m-4">
<div class="row">
<div class="col-12">
          
            <div class="card">
            <div class="card-header">
            <strong>Veículos</strong>
            </div>

<div class="card-body">

<!-- BOTAO ADICIONA VEICULO -->
<div class=" d-flex justify-content-end pe-3">
    <button data-coreui-toggle="modal"
    data-coreui-target="#carroNovoModal" class="btn btn-sm btn-outline-info">Adicionar novo veículo</button>
</div>
    
<div class="example">
<div class="tab-content rounded-bottom">
<div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
    
            <table class="table table-striped border datatable dataTable table-hover">

            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col" class="text-center">Modelo / Marca</th>
                <th scope="col" class="text-center">Ano</th>
                <th scope="col" class="text-center">Placa</th>
                <th scope="col" class="text-center">Categoria</th>
                <th scope="col" class="text-center">Status</th>
                <th scope="col" class="text-center">Ativo</th>
                <th scope="col" class="text-center">Ações</th>
                </tr>
            </thead>

            <tbody id="listaCarros">
                <tr><td colspan="7" class="text-center">Carregando...</td></tr>
            </tbody>

            </table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- FECHAMENTO DA NAV -->
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../js/crudVeiculo.js"></script>

</body>
</html>