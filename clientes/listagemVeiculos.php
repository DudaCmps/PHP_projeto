<?php 
include __DIR__.'/../includes/iniciaSessao.php';
include __DIR__.'/../includes/navbarCliente.php';
include __DIR__ . '/../config.php';

$resultados = '';
foreach ($veiculos as $carro) {

    switch ($carro->estado_carro) {
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

    if (($carro->estado_carro == 'disponivel') && ($carro->ativo_carro == 1)) {
        $resultados .= '<tr>
        <td>'.$carro->id_carro.'</td>
        <td class="text-center">'.$carro->nome_modelos.'</td>
        <td class="text-center">'.$carro->ano_fabricacao.'</td> 
        <td class="text-center">'.$carro->placa.'</td>
        <td class="text-center">'.$categoria.'</td>
        <td class="text-center">'.$status.'</td>
        <td class="text-center">
            <a href="../reservas/criaReserva.php?id_carro='.$carro->id_carro.'"><button type="button" class="btn btn-sm btn-success me-1" data-coreui-toggle="tooltip" data-coreui-placement="top" title="Reservar">Reservar</button></a>
        </td>
        </tr>';
    
    }

    
}
$resultados = !empty($resultados) ? $resultados : '
                                                <tr >
                                                <td colspan="7" class="registros"><a>Sem veículos disponiveis.</a></td>
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
