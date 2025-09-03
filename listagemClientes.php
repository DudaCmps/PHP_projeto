<?php 
include __DIR__.'/index.php';


$resultados = '';
foreach ($clientes as $cliente) {
    $resultados .= '<tr>
                        <td>'.$cliente->id_cliente.'</td>
                        <td class="text-center">'.$cliente->nome.'</td>
                        <td class="text-center">'.$cliente->cpf.'</td>
                        <td class="text-center">'.date('d/m/Y', strtotime($cliente->data_nasc)).'</td>
                        <td class="text-center">'.$cliente->telefone.'</td> 
                        <td class="text-center">
                            <a href="editarCliente.php?id_cliente= '.$cliente->id_cliente.'"><button type="button" class="btn btn-sm me-1 btn-primary">Editar</button></a>
                            <a href="infoCliente.php?id_cliente='.$cliente->id_cliente.'"><button type="button" class="btn btn-sm btn-secondary me-1">Info</button></a>
                            <a onclick="return confirm(\'Tem certeza que deseja deletar?\');" href="excluirCliente.php?id_cliente='.$cliente->id_cliente.'"><button type="button" class="btn btn-sm btn-danger">Excluir</button></a>
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
            <strong>Lista de Clientes</strong>
            </div>

<div class="card-body">
<div class="example">
<div class="tab-content rounded-bottom">
<div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
    
            <table class="table table-striped border datatable dataTable table-hover">

            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col" class="text-center">Nome</th>
                <th scope="col" class="text-center">CPF</th>
                <th scope="col" class="text-center">Data de Nascimento</th>
                <th scope="col" class="text-center">Telefone</th>
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
