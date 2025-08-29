<?php 
define('TITLE', 'Listagem Reservas');
include __DIR__.'/index.php';


$resultados = '';
foreach ($reservas as $reserva) {
    $resultados .= '<tr>
                        <td>'.$reserva->id_reserva.'</td>
                        <td>'.$reserva->nome.'</td>
                        <td>'.$reserva->placa.'</td> 
                        <td>'.$reserva->estado.'</td>
                        <td>
                            <a href="criaAluguel.php?id_reserva= '.$reserva->id_reserva.'"><button type="button" class="btn btn-success">Aprovar</button></a>
                            <a href="infoReserva.php?id_carro='.$reserva->id_reserva.'"><button type="button" class="btn btn-light">Info</button></a>
                            <a onclick="return confirm(\'Tem certeza que deseja deletar?\');" href="excluirVeiculo.php?id_carro='.$reserva->id_reserva.'"><button type="button" class="btn btn-danger">Excluir</button></a>
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
                <th scope="col">Nome do cliente</th>
                <th scope="col">Placa do Veículo</th>
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
