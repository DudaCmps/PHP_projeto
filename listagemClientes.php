<?php 
define('TITLE', 'Listagem Cliente');
include __DIR__.'/index.php';


$resultados = '';
foreach ($clientes as $cliente) {
    $resultados .= '<tr>
                        <td>'.$cliente->cliente_id.'</td>
                        <td>'.$cliente->nome.'</td>
                        <td>'.$cliente->cpf.'</td>
                        <td>'.date('d/m/Y', strtotime($cliente->data_nasc)).'</td>
                        <td>'.$cliente->telefone.'</td> 
                        <td>
                            <a href="editarCliente.php?id_cliente='.$cliente->id_cliente.'"><button type="button" class="btn btn-primary">Editar</button></a>
                            <a href="infoCliente.php?id_cliente='.$cliente->id_cliente.'"><button type="button" class="btn btn-light">Info</button></a>
                            <a href="excluirCliente.php?id_cliente='.$cliente->cliente_id.'"><button type="button" class="btn btn-danger">Excluir</button></a>
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
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">Data de Nascimento</th>
                <th scope="col">Telefone</th>
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
