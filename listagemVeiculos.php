<?php 
define('TITLE', 'Listagem Veículos');
include __DIR__.'/index.php';

$resultados = '';
foreach ($veiculos as $veiculo) {
    $resultados .= '<tr>

                        <td>'.$veiculo->id_veiculo.'</td>
                        <td>'.$veiculo->id_modelo.'</td>
                        <td>'.$veiculo->ano_fabricacao.'</td>
                        <td>'.$veiculo->placa.'</td>
                        <td>'.$veiculo->categoria.'</td> 
                        <td>'.$veiculo->estado.'</td> 
                        <td>
                            <a href="editarCliente.php?id_cliente='.$veiculo->id_veiculo.'"><button type="button" class="btn btn-primary">Editar</button></a>
                            <a href="infoCliente.php?id_cliente='.$veiculo->id_veiculo.'"><button type="button" class="btn btn-light">Info</button></a>
                            
                            <a href="excluirCliente.php?id_cliente='.$veiculo->id_veiculo.'" onclick="return confirm(\'Tem certeza que deseja excluir este item?\')" ><button type="button" class="btn btn-danger">Excluir</button></a>
                        </td>
                    </tr>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Veiculos</title>
</head>
<body>
    
    <div class="wrapper" style="margin:5rem 5rem 5rem 21rem;">

        <table class="table table-striped table-hover">

            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Modelo</th>
                <th scope="col">Ano de fabricação</th>
                <th scope="col">Placa</th>
                <th scope="col">Categoria</th>
                <th scope="col">Status</th>
                </tr>
            </thead>

            <tbody>
                <?=$resultados?>
            </tbody>

        </table>

    </div>
    
</body>
</html>
