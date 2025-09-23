<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include __DIR__.'/../includes/navbarAdmin.php';
include __DIR__ . '/../config.php';

$resultados = '';

foreach ($usuarios as $usuario) {
    
    if ($usuario->ativo_usuario == 1) {
        $botao = '<a href="inativarUsuario.php?id_user='.$usuario->id_user.'">
                            <button type="button" class="btn btn-sm me-1 btn-warning" data-coreui-toggle="tooltip" title="Inativar">
                                <i class="fa-solid fa-ban"></i>
                            </button>
                        </a>';
        $ativo = '<span class="status status-success">Sim</span>';
    }else {
        $botao = '<a href="inativarUsuario.php?id_user='.$usuario->id_user.'">
                            <button type="button" class="btn btn-sm me-1 btn-success" data-coreui-toggle="tooltip" title="Ativar">
                                <i class="cil-check-circle"></i>
                            </button>
                        </a>';
        
        $ativo = '<span class="status status-warning">Não</span>';
    }

    if ($usuario->perfil == 'cliente') {
        $resultados .= '
            <tr>
                <td>'.$usuario->id_user.'</td>
                <td class="text-center">'.$usuario->nome.'</td>
                <td class="text-center">'.$usuario->cpf.'</td>
                <td class="text-center">'.date('d/m/Y', strtotime($usuario->data_nasc)).'</td>
                <td class="text-center">'.$ativo.'</td>
                <td class="text-center">'.$usuario->telefone.'</td> 
                <td class="text-center">
                    <a href="editarCliente.php?id_user='.$usuario->id_user.'">
                        <button type="button" class="btn btn-sm me-1 btn-primary" data-coreui-toggle="tooltip" title="Editar">
                            <i style="color:black;" class="fa-regular fa-pen-to-square"></i>
                        </button>
                    </a>

                    <a href="../clientes/listagemHistorico.php?id_user='.$usuario->id_user.'">
                        <button type="button" class="btn btn-sm btn-light me-1" data-coreui-toggle="tooltip" title="Histórico">
                            <i style="color:black;" class="cil-description"></i>
                        </button>
                    </a>

                    <a href="../enderecos/listagemEnderecos.php?id_user='.$usuario->id_user.'">
                        <button type="button" class="btn btn-sm btn-info me-1" data-coreui-toggle="tooltip" title="Endereços">
                            <i style="color:black;" class="cil-house"></i>
                        </button>
                    </a>
                    
                    '.$botao.'

                    <a onclick="return confirm(\'Tem certeza que deseja deletar?\');" href="excluirCliente.php?id_user='.$usuario->id_user.'">
                        <button type="button" class="btn btn-sm me-1 btn-danger" data-coreui-toggle="tooltip" title="Excluir">
                            <i class="cil-trash"></i>
                        </button>
                    </a>
                </td>
            </tr>';
    }
   
}                 

$resultados = !empty($resultados) ? $resultados : '
    <tr>
        <td colspan="6" class="registros text-center">Sem registros</td>
    </tr>';
?>

<div class="d-flex flex-column flex-grow-1">
<?=$mensagem?>
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
                <th scope="col" class="text-center">Ativo</th>
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
<?php 
include __DIR__.'/../includes/footer.php';
?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-coreui-toggle="tooltip"]'));
    tooltipTriggerList.forEach(function (el) {
        new coreui.Tooltip(el);
    });
});
</script>