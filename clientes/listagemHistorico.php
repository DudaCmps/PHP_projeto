<?php 
include __DIR__.'/../includes/iniciaSessao.php';
include __DIR__ . '/../config.php';

if (!isset($_GET['id_user']) or !is_numeric($_GET['id_user'])) {
    header('location: ../index2.php?status=error');
    exit;
}

use \App\Entity\Usuario;
use \App\Entity\Reserva;

//consulta
$client = Usuario::getUsuario($_GET['id_user']);

//Valida
if (!$client instanceof Usuario) {
    header('location: ../index2.php?status=error');
    exit;
}

$obHistorico = Reserva::getReservaUsuario($_GET['id_user']);

$resultados = '';
foreach ($obHistorico as $historico) {
    
echo '<script>alert("'.$historico->valor.'");</script>';
    $resultados .= '<tr>
                        <td>'.$historico->id_reserva.'</td>
                        <td class="text-center">'.date('d/m/Y', strtotime($historico->data_inicio)).' - '.date('d/m/Y', strtotime($historico->data_final)).'</td>
                        <td class="text-center">'.$historico->valor.'</td> 
                        <td class="text-center">'.$historico->status.'</td> 
                        <td class="text-center">'.$historico->nome_marca.' '.$historico->nome_modelo.' '.$historico->ano_fabricacao.'</td>
                        <td class="text-center">'.$historico->categoria.'</td>
                    </tr>';
}
$resultados = !empty($resultados) ? $resultados : '
                                                <tr>
                                                <td colspan="6" class="registros"><a>Sem registros</a></td>
                                                </tr>
                                                ';
?>

<div class="d-flex flex-column flex-grow-1">

<div class="m-4">
<div class="row">
<div class="col-12">
        
<div><h5>Histórico de alugueis</h5></div>  

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