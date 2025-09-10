<?php 

$resultados = '';

foreach ($alugueis as $aluguel) {


    $dataIni = date('d/m/Y H:i', strtotime($aluguel->data_inicio));
    $dataFim = date('d/m/Y H:i', strtotime($aluguel->data_final));

    $resultados .= '<tr>
                        <td>'.$aluguel->id_aluguel.'</td>
                        <td class="text-center">'.$aluguel->nome.'</td>
                        <td class="text-center">'.$aluguel->placa.'</td>
                        <td class="text-center">'.$dataIni.'</td>
                        <td class="text-center">'.$dataFim.'</td> 
                        <td class="text-center">R$'. number_format($aluguel->valor, 2, ",", ".").'</td> 
                        <td class="text-center">
                
                            <a onclick="return confirm(\'Tem certeza que deseja deletar?\');" href="excluirAluguel.php?id_aluguel='.$aluguel->id_aluguel.'" ><button type="button" class="btn btn-sm btn-danger" data-coreui-toggle="tooltip" data-coreui-placement="top" title="Excluir"><i class="cil-trash"></i></button></a>
                        </td>
                    </tr>';
}
$resultados = !empty($resultados) ? $resultados : '
                                                <tr >
                                                <td colspan="7"  class="registros"><a>Sem registros</a></td>
                                                </tr>
                                                ';
?>


<script>
document.addEventListener('DOMContentLoaded', function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-coreui-toggle="tooltip"]'));
    tooltipTriggerList.forEach(function (el) {
        new coreui.Tooltip(el);
    });
});
</script>
<div class="m-4">
<div class="row">
<div class="col-12">
          
            <div class="card">
            <div class="card-header">
            <strong>Alugueis Ativos</strong>
            </div>

<div class="card-body">
<div class="example">
<div class="tab-content rounded-bottom">
<div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
    
            <table class="table table-striped border datatable dataTable table-hover">

            <thead>
                <th scope="col">#</th>
                <th scope="col" class="text-center">Nome</th>
                <th scope="col" class="text-center">Placa</th>
                <th scope="col" class="text-center">Data de inicio</th>
                <th scope="col" class="text-center">Data de devolução</th>
                <th scope="col" class="text-center">Valor</th>
                <th scope="col" class="text-center">Ações</th>
                </thead>
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