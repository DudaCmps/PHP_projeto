<?php 
define('TITLE', 'Listagem Veículos');
include __DIR__.'/index.php';


$resultados = '';
foreach ($veiculos as $carro) {
    $resultados .= '<tr>
                        <td>'.$carro->id_carro.'</td>
                        <td>'.$carro->nome.'</td>
                        <td>'.$carro->ano_fabricacao.'</td> 
                        <td>'.$carro->placa.'</td>
                        <td>'.$carro->categoria.'</td>
                        <td>'.$carro->estado.'</td>
                        <td>
                            <a href="editarVeiculo.php?id_carro= '.$carro->id_carro.'"><button type="button" class="btn btn-primary">Editar</button></a>
                            <a href="infoVeiculo.php?id_carro='.$carro->id_carro.'"><button type="button" class="btn btn-light">Info</button></a>
                            <a onclick="return confirm(\'Tem certeza que deseja deletar?\');" href="excluirVeiculo.php?id_carro='.$carro->id_carro.'"><button type="button" class="btn btn-danger">Excluir</button></a>
                        </td>
                    </tr>';
                    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div class="wrapper" style="margin:3rem 3rem 3rem 18rem;">

        <table class="table table-striped table-hover">

            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Modelo</th>
                <th scope="col">Ano</th>
                <th scope="col">Placa</th>
                <th scope="col">Categoria</th>
                <th scope="col">Status</th>
                <th scope="col">Ações</th>
                </tr>
            </thead>

            <tbody>
                <?=$resultados?>
            </tbody>

        </table>

    </div>
    
</body>
</html>
