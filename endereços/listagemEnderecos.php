<?php 
include __DIR__.'/../includes/iniciaSessao.php';

include __DIR__ . '/../config.php';
use \App\Entity\Usuario;
use \App\Entity\Endereco;

// verificando o usuario
if (isset($_SESSION['perfil']) && $_SESSION['perfil'] === 'admin') {
    include __DIR__.'/../includes/navbarAdmin.php';
    
    //consulta
    $client = Usuario::getUsuario($_GET['id_user']);

} else {
    include __DIR__.'/../includes/navbarCliente.php';

    //consulta
    $client = Usuario::getUsuario($_SESSION['id_user']);
}

$enderecos = Endereco::getEnderecos($client->id_user);

$botao = '<a href="formularioCadastrarEndereco.php?id_user='.$client->id_user.'"><button type="button"class=" btn mt-3 btn-primary">Adicionar novo endereço</i></button></a>';

$resultados = '';
foreach ($enderecos as $endereco) {
    
    $resultados .= '<tr>
                        <td>'.$endereco->id_endereco.'</td>
                        <td class="text-center">'.$endereco->cidade.'</td>
                        <td class="text-center">'.$endereco->estado.'</td>
                        <td class="text-center">'.$endereco->cep.'</td>
                        <td class="text-center">'.$endereco->bairro.'</td> 
                        <td class="text-center">'.$endereco->logradouro.'</td> 
                        <td class="text-center">'.$endereco->numero.'</td> 
                        <td class="text-center">'.$endereco->complemento.'</td> 
                        <td class="text-center">
                            <a href="formularioEndereco.php?id_endereco= '.$endereco->id_endereco.'"><button type="button"class="btn btn-sm me-1 btn-primary" data-coreui-toggle="tooltip" data-coreui-placement="top" title="Editar"><i style="color:black;" class="fa-regular fa-pen-to-square"></i></button></a>
                            
                           
                            <a onclick="return confirm(\'Tem certeza que deseja deletar?\');" href="excluirEndereco.php?id_endereco='.$endereco->id_endereco.'"><button type="button" class="btn btn-sm btn-danger" data-coreui-toggle="tooltip" data-coreui-placement="top" title="Excluir"><i class="cil-trash"></i></button></a>
                        </td>
                    </tr>';
                    
}
$resultados = !empty($resultados) ? $resultados : '
                                                <tr >
                                                <td colspan="8" class="registros"><a style="color:#949398;">Sem registros</a></td>
                                                </tr>
                                                ';
?>

<div class="d-flex flex-column flex-grow-1">

<div class="m-4">
<div class="row">
<div class="col-12">
          
            <div class="card">
            <div class="card-header">
            <strong>Endereços</strong>
            </div>

<div class="card-body">
<div class="example">
<div class="tab-content rounded-bottom">
<div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
    
            <table class="table table-striped border datatable dataTable table-hover">

            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col" class="text-center">Cidade</th>
                <th scope="col" class="text-center">Estado</th>
                <th scope="col" class="text-center">CEP</th>
                <th scope="col" class="text-center">Bairro</th>
                <th scope="col" class="text-center">Logradouro</th>
                <th scope="col" class="text-center">Número</th>
                <th scope="col" class="text-center">Complemento</th>
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
<div>
    <?=$botao;?>
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