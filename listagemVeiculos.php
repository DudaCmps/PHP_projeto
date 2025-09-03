<?php 
define('TITLE', 'Listagem Veículos');
include __DIR__.'/index.php';


$resultados = '';
foreach ($veiculos as $carro) {
    $resultados .= '<tr>
                        <td >'.$carro->id_carro.'</td>
                        <td class="text-center">'.$carro->nome.'</td>
                        <td class="text-center">'.$carro->ano_fabricacao.'</td> 
                        <td class="text-center">'.$carro->placa.'</td>
                        <td class="text-center">'.$carro->categoria.'</td>
                        <td class="text-center">'.$carro->estado.'</td>
                        <td class="text-center">
                            <a href="editarVeiculo.php?id_carro= '.$carro->id_carro.'"><button type="button" class="btn btn-sm btn-primary me-1">Editar</button></a>
                            <a href="manutencaoVeiculo.php?id_carro='.$carro->id_carro.'"><button type="button" class="btn btn-sm btn-secondary me-1">Manutenção</button></a>
                            <a onclick="return confirm(\'Tem certeza que deseja deletar?\');" href="excluirVeiculo.php?id_carro='.$carro->id_carro.'"><button type="button" class="btn btn-sm btn-danger">Excluir</button></a>
                        </td>
                    </tr>';
                    
}
?>


<div class="d-flex flex-column flex-grow-1">
<div class="m-4">
<div class="row">
<div class="col-12">
          
            <div class="card">
            <div class="card-header">
            <strong>Lista de Clientes</strong>
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
</body>
</html>
