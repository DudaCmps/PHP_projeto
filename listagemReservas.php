<?php 
include __DIR__.'/index.php';


$resultados = '';
foreach ($reservas as $reserva) {
    $resultados .= '<tr>
                        <td class="text-center">'.$reserva->id_reserva.'</td>
                        <td class="text-center">'.$reserva->nome.'</td>
                        <td class="text-center">'.$reserva->placa.'</td> 
                        <td class="text-center">'.$reserva->estado.'</td>
                        <td class="text-center">
                            <a href="criaAluguel.php?id_reserva= '.$reserva->id_reserva.'"><button type="button" class="btn btn-sm btn-success me-1">Aprovar</button></a>
                            <a href="infoReserva.php?id_carro='.$reserva->id_reserva.'"><button type="button" class="btn btn-sm btn-secondary me-1">Info</button></a>
                            <a onclick="return confirm(\'Tem certeza que deseja deletar?\');" href="excluirVeiculo.php?id_carro='.$reserva->id_reserva.'"><button type="button" class="btn btn-sm me-1 btn-danger">Excluir</button></a>
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
            <strong>Reservas</strong>
            </div>

<div class="card-body">
<div class="example">
<div class="tab-content rounded-bottom">
<div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
    
            <table class="table table-striped border datatable dataTable table-hover">

            <thead>
                <th scope="col">#</th>
                <th scope="col" class="text-center">Nome do cliente</th>
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
</div>
</body>
</html>