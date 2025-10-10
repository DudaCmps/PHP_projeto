<?php 
include __DIR__.'/../includes/iniciaSessao.php';
include __DIR__.'/../includes/navbarAdmin.php';
include __DIR__ . '/../config.php';

$resultados = '';

foreach ($veiculos as $carro) {

    if ($carro->ativo_carro == 1) {
        $botaoAtivo = ' <a href="inativarVeiculo.php?id_carro='.$carro->id_carro.'">
                            <button type="button" class="btn btn-sm me-1 btn-warning" data-coreui-toggle="tooltip" title="Inativar">
                                <i class="fa-solid fa-ban"></i>
                            </button>
                        </a>';

                        $botaoEditar =  '
                        <button
                            type="button"
                            class="btn btn-sm btn-primary me-1"
                            data-bs-toggle="modal"
                            data-bs-target="#editarModal"
                            data-id="'.$carro->id_carro.'"
                            data-modelo="'.$carro->fk_modelo.'"
                            data-placa="'.$carro->placa.'"
                            data-ano="'.$carro->ano_fabricacao.'"
                            data-categoria="'.$carro->categoria.'"
                            title="Editar"
                        >
                            <i class="fa-regular fa-pen-to-square" style="color: black;"></i>
                        </button>
                    ';
                    

        $botaoManutencao ='
                            <button type="button" class="btn btn-sm btn-secondary me-1" data-bs-toggle="modal"
                            data-bs-target="#manutencaoModal" title="Manutenção">
                                <i class="cil-settings" style="color: black;font-size:16px;"></i>
                            </button>
                        ';
        
        $ativo = '<span class="status status-success">Sim</span>';
    }else {
        $botaoAtivo = '<a href="inativarVeiculo.php?id_carro='.$carro->id_carro.'">
                            <button type="button" class="btn btn-sm me-1 btn-success" data-coreui-toggle="tooltip" title="Ativar">
                                <i class="cil-check-circle"></i>
                            </button>
                        </a>';

                        $botaoEditar =  ' 
                            <button type="button" class="btn btn-sm btn-primary me-1 disabled" data-coreui-toggle="tooltip" data-coreui-placement="top" title="Editar">
                                <i class="fa-regular fa-pen-to-square" style="color: black;"></i>
                            </button>';

                        $botaoManutencao ='
                            <button type="button" class="btn btn-sm btn-secondary me-1 disabled" data-coreui-toggle="tooltip" data-coreui-placement="top" title="Manutenção">
                                <i class="cil-settings" style="color: black;font-size:16px;"></i>
                            </button>';
        
        $ativo = '<span class="status status-warning">Não</span>';
    }

    switch ($carro->estado_carro) {
        case 'alugado':
            $status = '<span class="status status-info">Alugado</span>';
            break;

        case 'manutencao':
            $status = '<span class="status status-warning">Manutenção</span>';
            break;
        
        default:
        $status = '<span class="status status-success">Disponível</span>';
            break;
    }

    switch ($carro->categoria) {
        case 'luxo':
            $categoria = 'Luxo';
            break;

        case 'economico':
            $categoria = 'Econômico';
            break;
        
        case 'suv':
        $categoria = 'SUV';
            break;
    }

    $resultados .= '<tr>
                        <td>'.$carro->id_carro.'</td>
                        <td class="text-center">'.$carro->nome_modelos.'</td>
                        <td class="text-center">'.$carro->ano_fabricacao.'</td> 
                        <td class="text-center">'.$carro->placa.'</td>
                        <td class="text-center">'.$categoria.'</td>
                        <td class="text-center">'.$status.'</td>
                        <td class="text-center">'.$ativo.'</td>
                        <td class="text-center">
                            
                            '.$botaoEditar.'
                            '.$botaoManutencao.'
                            '.$botaoAtivo.'

                            <a onclick="return confirm(\'Tem certeza que deseja deletar?\');" href="excluirVeiculo.php?id_carro='.$carro->id_carro.'" data-coreui-toggle="tooltip" data-coreui-placement="top" title="Excluir"><button type="button" class="btn btn-sm btn-danger"><i class="cil-trash"></i></button></a>
                        </td>
                    </tr>';
                    
}
$resultados = !empty($resultados) ? $resultados : '
                                                <tr >
                                                <td colspan="7" class="registros"><a>Sem registros</a></td>
                                                </tr>
                                                ';
?>

<!-- MODAL EDIÇÃO -->
<div class="modal fade" id="editarModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edição de veículo</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post">
            <input type="hidden" name="id_carro" id="id_carro" value="">

            <div class="mb-3">
                <label for="modelo" class="form-label">Modelos</label>
                <select name="modelo" id="modelo" class="form-select">
                <option disabled selected>Selecione uma opção</option>
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
                <input type="text" name="placa" id="placa" class="form-control me-3" maxlength="10" value="">

                <label for="ano" class="input-group-text" id="basic-addon1">Ano de Fabricação</label>
                <input type="text" name="ano_fabricacao" id="ano" class="form-control" placeholder="YYYY" value="">
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria</label>
                <select name="categoria" id="categoria" class="form-select">
                <option value="" disabled selected>Selecione uma opção</option>
                <option value="luxo">Luxo</option>
                <option value="economico">Econômico</option>
                <option value="suv">SUV</option>
                </select>
            </div>
        </form>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
        <input onclick="editarVeiculo()" type="button" class="btn btn-sm btn-outline-success" value="Salvar">
      </div>
    </div>
  </div>
</div>
<!--FIM MODAL EDIÇÃO -->

<!-- MODAL MANUTENÇÃO -->
<div class="modal fade" id="manutencaoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Manutenção</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post">
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
        </form>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
        <input onclick="manutencaoVeiculo()" type="button" class="btn btn-sm btn-outline-success" value="Salvar">
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
<div class="example">
<div class="tab-content rounded-bottom">
<div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
    
            <table class="table table-striped border datatable dataTable table-hover">

            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col" class="text-center">Modelo</th>
                <th scope="col" class="text-center">Ano</th>
                <th scope="col" class="text-center">Placa</th>
                <th scope="col" class="text-center">Categoria</th>
                <th scope="col" class="text-center">Status</th>
                <th scope="col" class="text-center">Ativo</th>
                <th scope="col" class="text-center">Ações</th>
                </tr>
            </thead>

            <tbody>
                <?=$resultados?>
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

<script>
  var editarModal = document.getElementById('editarModal');
editarModal.addEventListener('show.bs.modal', function (event) {
  var button = event.relatedTarget;

  var id = button.getAttribute('data-id');
  var modelo = button.getAttribute('data-modelo');
  var placa = button.getAttribute('data-placa');
  var ano = button.getAttribute('data-ano');
  var categoria = button.getAttribute('data-categoria');

  document.getElementById('id_carro').value = id;
  document.getElementById('modelo').value = modelo;
  document.getElementById('placa').value = placa;
  document.getElementById('ano').value = ano;
  document.getElementById('categoria').value = categoria;
});

</script>
</body>
</html>