<?php
use App\Entity\Reserva;
use App\Entity\Aluguel;

include __DIR__.'/../includes/iniciaSessao.php';

include __DIR__.'/../public/header.php';
include __DIR__ . '/../config.php';

$obReserva = Reserva::getReservas('fk_cliente='.$_SESSION['id_user']);

$resultados = '';
foreach ($obReserva as $reserva) {
    

    // Pula reservas já com aluguel
    $obAluguel = Aluguel::getAlugueis('fk_reserva='.$reserva->id_reserva);
    if ($obAluguel != null) {
        continue; // pula o objeto
    }

    // redefine variáveis
    $status = '';
    $botaoAluguel = '';
    $botaoCancelar = '';
    $botaoStatus = '';

    switch ($reserva->estado) {
        case 'confirmada':

            $aluguelConfirmado = Aluguel::getAlugueis('id_user='.$_SESSION['id_user']);

            if ($aluguelConfirmado != null) {
            $botaoStatus = '<span class="status status-warning">Finalize o aluguel ativo antes de iniciar outro.</span>';
            }else {
                $botaoAluguel = '<a href="../alugueis/formularioAluguel.php?id_reserva='.$reserva->id_reserva.'">
                <button type="button" class="btn btn-sm me-1 btn-primary" title="Iniciar aluguel">
                    <i class="cil-calendar-check"></i>
                </button>
            </a>';
            $botaoCancelar = '<a onclick="return confirm(\'Tem certeza que deseja cancelar?\');" href="../reservas/inativarReserva.php?id_reserva='.$reserva->id_reserva.'">
                <button type="button" class="btn btn-sm btn-danger" title="Cancelar">
                    <i class="cil-trash"></i>
                </button>
            </a>';
            }
            
            $status .= '<span class="status status-success">'.$reserva->estado.'</span>';
            break;

        case 'pendente':
            $botaoCancelar = '<a onclick="return confirm(\'Tem certeza que deseja cancelar?\');" href="../reservas/inativarReserva.php?id_reserva='.$reserva->id_reserva.'">
                <button type="button" class="btn btn-sm btn-danger" title="Cancelar">
                    <i class="cil-trash"></i>
                </button>
            </a>';
            $botaoStatus = '<span class="status status-warning">Esta reserva está em análise.</span>';
            $status .= '<span class="status status-warning">'.$reserva->estado.'</span>';
            break;

        default:
            $status .= '<span class="status status-danger">'.$reserva->estado.'</span>';
            break;
    }

    if ($reserva->estado != 'cancelada') {
        $resultados .= '<tr>
            <td>'.$reserva->id_reserva.'</td>
            <td class="text-center">'.$reserva->nome.'</td>
            <td class="text-center">'.$reserva->placa.'</td>
            <td class="text-center">'.$status.'</td>
            <td class="text-center">'.$botaoAluguel.$botaoStatus.$botaoCancelar.'</td>
        </tr>';
    }
}

$resultados = !empty($resultados) ? $resultados : '
                                                <tr >
                                                <td colspan="5" class="registros"><a>Sem registros</a></td>
                                                </tr>
                                                ';
?>



<div class="d-flex justify-content-center fundo"  style="min-height: 723px;">
<div style="width: 1300px;">
<div class="d-flex flex-column flex-grow-1">
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
</div>
</div>       
 