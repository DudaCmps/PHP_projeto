<?php 
include __DIR__.'/../includes/iniciaSessao.php';

include __DIR__.'/../includes/navbarAdmin.php';
include __DIR__ . '/../config.php';
use app\Entity\Reserva;

$resultados = '';

foreach ($reservas as $reserva) {
    $status = '';
    $id =$reserva->id_reserva;
    $reservasCarro = Reserva::getReservas('reserva.fk_carro ='.$reserva->fk_carro, 'reserva.estado= \'confirmada\'');
    
    switch ($reserva->estado) {
        case 'confirmada':
            
            $botaoInativar = '<a href="../reservas/inativarReserva.php?id_reserva='.$reserva->id_reserva.'">
                            <button type="button" class="btn btn-sm me-1 btn-warning" data-coreui-toggle="tooltip" title="Inativar">
                                <i class="fa-solid fa-ban"></i>
                            </button>
                    </a>';
            $botaoAprovar = '<button type="button" class="disabled btn btn-sm btn-success me-1" data-coreui-toggle="tooltip" data-coreui-placement="top" title="Aprovar"><i class="cil-thumb-up"></i></button>';
            
            $status .= '<span class="status status-success">'.$reserva->estado.'</span>';
            break;
        
            case 'pendente':
                if (empty($reservasCarro)) {

                    $botaoInativar = '<a href="../reservas/inativarReserva.php?id_reserva='.$reserva->id_reserva.'">
                            <button type="button" class="btn btn-sm me-1 btn-warning" data-coreui-toggle="tooltip" title="Cancelar">
                                <i class="fa-solid fa-ban"></i>
                            </button>
                    </a>';
                    $botaoAprovar = '<a href="aprovaReserva.php?id_reserva='.$reserva->id_reserva.'"><button type="button" class="btn btn-sm btn-success me-1" data-coreui-toggle="tooltip" data-coreui-placement="top" title="Aprovar"><i class="cil-thumb-up"></i></button></a>';
                }else{
                    $botaoInativar = '
                    <button type="button" class="btn btn-sm me-1 btn-warning disabled" data-coreui-toggle="tooltip" title="Cancelar">
                        <i class="fa-solid fa-ban"></i>
                    </button>';

                    $botaoAprovar = '<button type="button" class="disabled btn btn-sm btn-success me-1" data-coreui-toggle="tooltip" data-coreui-placement="top" title="Aprovar"><i class="cil-thumb-up"></i></button>';
                }

                
            $status .= '<span class="status status-warning">'.$reserva->estado.'</span>';
            break;

            case 'cancelada':
                $botaoInativar = '<a href="../reservas/inativarReserva.php?id_reserva='.$reserva->id_reserva.'">
                            <button type="button" class="btn btn-sm me-1 btn-success" data-coreui-toggle="tooltip" title="Ativar">
                                <i class="cil-check-circle"></i>
                            </button>
                        </a>';
                $botaoAprovar = '<button type="button" class="disabled btn btn-sm btn-success me-1" data-coreui-toggle="tooltip" data-coreui-placement="top" title="Aprovar"><i class="cil-thumb-up"></i></button>';
            $status .= '<span class="status status-danger">'.$reserva->estado.'</span>';
            break;
    }
    
    $resultados .= '<tr>
                        <td>'.$reserva->id_reserva.'</td>
                        <td class="text-center">'.$reserva->nome.'</td>
                        <td class="text-center">'.$reserva->placa.'</td> 
                        <td class="text-center">'.$status.'</td> 
                        <td class="text-center">

                        '.$botaoAprovar.'

                        '.$botaoInativar.'

                        <a onclick="return confirm(\'Tem certeza que deseja deletar?\');" href="excluirReserva.php?id_reserva='.$reserva->id_reserva.'"><button type="button" class="btn btn-sm btn-danger" data-coreui-toggle="tooltip" data-coreui-placement="top" title="Excluir"><i class="cil-trash"></i></button></a>
                        </td>
                    </tr>';
}
$resultados = !empty($resultados) ? $resultados : '
                                                <tr >
                                                <td colspan="5" class="registros"><a>Sem registros</a></td>
                                                </tr>
                                                ';
?>


<div class="d-flex flex-column flex-grow-1">
<?=$mensagem?>
<div class="m-4">
<div class="row">
<div class="col-12">
          
            <div class="card">
            <div class="card-header">
            <strong>Reservas ativas</strong>
            </div>

<div class="card-body">
<div class="example">
<div class="tab-content rounded-bottom">
<div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
    
            <table class="table table-striped border datatable dataTable table-hover">

            <thead>
                <th scope="col">#</th>
                <th scope="col" class="text-center">Nome do usuario</th>
                <th scope="col" class="text-center">Placa do Veículo</th>
                <th scope="col" class="text-center">Status</th>
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
<?php 
include __DIR__.'/../includes/footer.php';
?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-coreui-toggle="tooltip"]'));
    tooltipTriggerList.forEach(function (el) {
        new coreui.Tooltip(el);
    });
});
</script>