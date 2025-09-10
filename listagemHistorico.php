<?php 
include __DIR__.'/config.php';

if (!isset($_GET['id_cliente']) or !is_numeric($_GET['id_cliente'])) {

    header('location: index.php?status=error');
    exit;
}
use \App\Entity\Cliente;
use \App\Entity\Reserva;

//consulta
$cli = Cliente::getCliente($_GET['id_cliente']);

//Valida
if (!$cli instanceof Cliente) {
    header('location: index.php?status=error');
    exit;
}

$obHistorico = Reserva::getReservaCliente($_GET['id_cliente']);

$resultados = '';
foreach ($obHistorico as $historico) {

    $resultados .= '<tr>
                        <td>'.$historico->id_reserva.'</td>
                        <td class="text-center">'.date('d/m/Y', strtotime($historico->data_inicio)).' - '.date('d/m/Y', strtotime($historico->data_final)).'</td>
                        <td class="text-center">'.$historico->valor.'</td> 
                        <td class="text-center">'.$historico->status.'</td> 
                        <td class="text-center">'.$historico->nomeMarca.' '.$historico->nome.' '.$historico->ano_fabricacao.'</td>
                        <td class="text-center">'.$historico->categoria.'</td>
            
                    </tr>';
                    
}
$resultados = !empty($resultados) ? $resultados : '
                                                <tr >
                                                <td colspan="6" class="registros"><a>Sem registros</a></td>
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

<div class="d-flex flex-column flex-grow-1">
<?=$mensagem?>
<div class="m-4">
<div class="row">
<div class="col-12">
        
<div><h3>Histórico de <?=$cli->nome?></h3></div>  

<div class="card">
            
<div class="card-body">
<div class="example">
<div class="tab-content rounded-bottom">
<div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
    
            <table class="table table-striped border datatable dataTable table-hover">

            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col" class="text-center">Data</th>
                <th scope="col" class="text-center">Valor</th>
                <th scope="col" class="text-center">Status</th>
                <th scope="col" class="text-center">Modelo</th>
                <th scope="col" class="text-center">Categoria</th>
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
