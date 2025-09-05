<?php 

include __DIR__.'/index.php';


$resultados = '';
foreach ($manutencoes as $manutencao) {
  
    $resultados .= '<tr>
                        <td >'.$manutencao->id_manutencao.'</td>
                        <td class="text-center">'.$manutencao->descricao.'</td>
                        <td class="text-center">'.$manutencao->data_manutencao.'</td> 
                        <td class="text-center">'.$manutencao->placa.'</td>
                        <td class="text-center">
                            <a href="editarVeiculo.php?id_manutencao= '.$manutencao->id_manutencao.'"><button type="button" class="btn btn-sm btn-primary me-1">Editar</button></a>
                            <a href="manutencaoVeiculo.php?id_manutencao='.$manutencao->id_manutencao.'"><button type="button" class="btn btn-sm btn-secondary me-1">Manutenção</button></a>
                            <a onclick="return confirm(\'Tem certeza que deseja deletar?\');" href="excluirManutencao.php?id_manutencao='.$manutencao->id_manutencao.'"><button type="button" class="btn btn-sm btn-danger">Excluir</button></a>
                        </td>
                    </tr>';
                    
}
$resultados = !empty($resultados) ? $resultados : '
                                                <tr >
                                                <td colspan="5" style="background-color:#f3f4f7"><a style="color:#949398;">Sem registros</a></td>
                                                </tr>
                                                ';
?>


<div class="d-flex flex-column flex-grow-1">
<div class="m-4">
<div class="row">
<div class="col-12">
          
            <div class="card">
            <div class="card-header">
            <strong>Manutenções Ativas</strong>
            </div>

<div class="card-body">
<div class="example">
<div class="tab-content rounded-bottom">
<div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
    
            <table class="table table-striped border datatable dataTable table-hover">

            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col" class="text-center">Descrição</th>
                <th scope="col" class="text-center">Data</th>
                <th scope="col" class="text-center">Placa do Veiculo</th>
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
