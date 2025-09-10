<?php 

$resultados = '';

foreach ($alugueis as $aluguel) {
    // $status = '';
    // switch ($reserva->estado) {
    //     case 'confirmada':
    //         $status .= '<span class="status status-success">'.$reserva->estado.'</span>';
    //         break;
        
    //         default:
    //         $status .= '<span class="status status-warning">'.$reserva->estado.'</span>';
    //         break;
         
    // }

    $resultados .= '<tr>
                        <td>'.$aluguel->id_aluguel.'</td>
                        <td class="text-center">'.$aluguel->data_inicio.'</td>
                        <td class="text-center">'.$aluguel->data_final.'</td> 
                        <td class="text-center">R$'. number_format($aluguel->valor, 2, ",", ".").'</td> 
                        <td class="text-center">
                            <a href="criaAluguel.php?id_reserva='.$aluguel->id_reserva.'"><button type="button" class="btn btn-sm btn-primary me-1">Editar</button></a>
                            <a href="infoReserva.php?id_carro='.$aluguel->id_reserva.'"><button type="button" class="btn btn-sm btn-secondary me-1">Info</button></a>
                            <a onclick="return confirm(\'Tem certeza que deseja deletar?\');" href="excluirReserva.php?id_reserva='.$aluguel->id_reserva.'"><button type="button" class="btn btn-sm me-1 btn-danger">Cancelar</button></a>
                        </td>
                    </tr>';
}
$resultados = !empty($resultados) ? $resultados : '
                                                <tr >
                                                <td colspan="5" style="background-color:#f3f4f7"><a style="color:#949398;">Sem registros</a></td>
                                                </tr>
                                                ';
?>


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