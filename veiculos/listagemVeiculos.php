<?php 
include __DIR__.'/../includes/iniciaSessao.php';

include __DIR__.'/../includes/navbarAdmin.php';
include __DIR__ . '/../config.php';

$resultados = '';
foreach ($veiculos as $carro) {


    switch ($carro->estado_carro) {
        case 'alugado':
            $status = '<span class="status status-info">Alugado</span>';
            break;

        case 'manutencao':
            $status = '<span class="status status-warning">Manutenção</span>';
            break;
        
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

    $resultados .= '<tr>
                        <td>'.$carro->id_carro.'</td>
                        <td class="text-center">'.$carro->nome_modelos.'</td>
                        <td class="text-center">'.$carro->ano_fabricacao.'</td> 
                        <td class="text-center">'.$carro->placa.'</td>
                        <td class="text-center">'.$categoria.'</td>
                        <td class="text-center">'.$status.'</td>
                        <td class="text-center">
                            <a href="formularioEditarVeiculo.php?id_carro='.$carro->id_carro.'"><button type="button" class="btn btn-sm btn-primary me-1" data-coreui-toggle="tooltip" data-coreui-placement="top" title="Editar"><i class="fa-regular fa-pen-to-square" style="color: black;"></i></button></a>

                            <a href="../manutenções/formularioManutencao.php?id_carro='.$carro->id_carro.'"><button type="button" class="btn btn-sm btn-secondary me-1" data-coreui-toggle="tooltip" data-coreui-placement="top" title="Manutenção"><i class="cil-settings" style="color: black;font-size:16px;"></i></button></a>

                            <a href="inativarVeiculo.php?id_carro='.$carro->id_carro.'" data-coreui-toggle="tooltip" data-coreui-placement="top" title="Inativar"><button type="button" class="btn btn-sm btn-warning"><i class="fa-solid fa-ban"></i></button></a>

                            <a onclick="return confirm(\'Tem certeza que deseja deletar?\');" href="excluirVeiculo.php?id_carro='.$carro->id_carro.'" data-coreui-toggle="tooltip" data-coreui-placement="top" title="Excluir"><button type="button" class="btn btn-sm btn-danger"><i class="cil-trash"></i></button></a>
                        </td>
                    </tr>';
                    
}
$resultados = !empty($resultados) ? $resultados : '
                                                <tr >
                                                <td colspan="7" class="registros"><a>Sem registros</a></td>
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
