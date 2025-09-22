<?php 
include __DIR__.'/../includes/verificaAdmin.php';
include __DIR__.'/../includes/navbarAdmin.php';
include __DIR__ . '/../config.php';

$resultados = '';
foreach ($usuarios as $usuario) {
    $resultados .= '<tr>
                        <td>'.$usuario->id_user.'</td>
                        <td class="text-center">'.$usuario->nome.'</td>
                        <td class="text-center">'.$usuario->cpf.'</td>
                        <td class="text-center">'.date('d/m/Y', strtotime($usuario->data_nasc)).'</td>
                        <td class="text-center">'.$usuario->telefone.'</td> 
                        <td class="text-center">
                            <a href="editarUsuario.php?id_user= '.$usuario->id_user.'"><button type="button"class="btn btn-sm me-1 btn-primary" data-coreui-toggle="tooltip" data-coreui-placement="top" title="Editar"><i style="color:black;" class="fa-regular fa-pen-to-square"></i></button></a>
                            
                            <a href="listagemHistorico.php?id_user='.$usuario->id_user.'"><button type="button" class="btn btn-sm btn-secondary me-1" data-coreui-toggle="tooltip" data-coreui-placement="top" title="Histórico"><i style="color:black;" class="cil-description"></i></button></a>

                            <a href="../endereços/listagemEnderecos.php?id_user='.$usuario->id_user.'"><button type="button" class="btn btn-sm btn-warning me-1" data-coreui-toggle="tooltip" data-coreui-placement="top" title="Endereços"><i style="color:black;" class="cil-house"></i></button></a>
                           
                            <a onclientck="return confirm(\'Tem certeza que deseja deletar?\');" href="excluirUsuario.php?id_user='.$usuario->id_user.'"><button type="button" class="btn btn-sm btn-danger" data-coreui-toggle="tooltip" data-coreui-placement="top" title="Excluir"><i class="cil-trash"></i></button></a>
                        </td>
                    </tr>';
                    
}
$resultados = !empty($resultados) ? $resultados : '
                                                <tr >
                                                <td colspan="6" class="registros"><a>Sem registros</a></td>
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
            <strong>Lista de Usuarios</strong>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-coreui-toggle="tooltip"]'));
    tooltipTriggerList.forEach(function (el) {
        new coreui.Tooltip(el);
    });
});
</script>