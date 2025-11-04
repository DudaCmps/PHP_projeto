<?php 
include __DIR__.'/../includes/iniciaSessao.php';
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

                    <a href="../endereços/listagemEnderecos.php?id_user='.$usuario->id_user.'">
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
        <td colspan="7" class="registros text-center">Sem registros</td>
    </tr>';
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

<!-- BOTAO ADICIONA CLIENTE -->
<div class=" d-flex justify-content-end pe-3">
    <button data-bs-toggle="modal"
    data-bs-target="#clienteNovoModal" class="btn btn-sm btn-outline-info">Adicionar novo cliente</button>
</div>

<!-- MODAL ADICIONAR NOVO CLIENTE -->
<div class="modal fade" id="clienteNovoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Cadastrar novo cliente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post">

        <div id="nome-error" class="text-danger mb-1 small"></div>
        <div class="input-group mb-3">
            <label for="nome" class="input-group-text" id="basic-addon1">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do cliente">
        </div>

        <div id="email-error" class="text-danger mb-1 small"></div>
        <div class="input-group mb-3">
                <label for="email" class="input-group-text">Email</label>
                <input type="email" class="form-control" id="email" name="email" required placeholder="exemplo@gmail.com">
              </div>
        
        <div class="d-flex mb-1 small">
            <div id="telefone-error" class="text-danger" style="width: 53%;"></div>
            <div id="cpf-error" class="text-danger" style="width: 47%;"></div>
        </div>
        <div class="input-group mb-3">
            <div id="telefone-error" class="text-danger mb-1 small"></div>
            <label for="telefone" class="input-group-text">Telefone</label>
            <input type="text" class="form-control me-3" id="telefone" placeholder="(00) 00000-0000" style="border-radius: 0px 5px 5px 0px" name="telefone" >

            <label for="cpf" class="input-group-text" style="border-radius: 5px 0px 0px 5px">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00" maxlength="14">
        </div>

        <div id="data_nasc-error" class="text-danger mb-1 small"></div>
        <div class="input-group mb-3">
            <label for="data_nasc" class="input-group-text">Data de Nascimento</label>
            <input type="date" class="form-control" id="data_nasc" name="data_nasc" max="2005" >
        </div>

        <a onclick="showAdress()" id="btnAdress" class="btn btn-sm btn-secondary small mb-2">Adicionar endereço ao cliente</a>
        
        <div id="formularioEndereco" style="display:none;">
            <h4>Endereço</h4>

            <div id="cep-error" class="text-danger mb-1 small"></div>
            <div class="input-group mb-3">
            <label for="cep" class="input-group-text">CEP</label>
            <input type="text" class="form-control" id="cep" name="cep" placeholder="00000-000" maxlength="8">
            </div>

            <div class="d-flex mb-1 small">
                <div id="cidade-error" class="text-danger" style="width: 30%;"></div>
                <div id="uf-error" class="text-danger" style="width: 35%;"></div>
                <div id="numero-error" class="text-danger" style="width: 30%;"></div>
            </div>
            <div class="input-group mb-3">
            <label for="cidade" class="input-group-text">Cidade</label>
            <input type="text" class="form-control me-3" id="cidade" name="cidade" style="border-radius: 0px 5px 5px 0px">

            <label for="uf" class="input-group-text" style="border-radius: 5px 0px 0px 5px; ">Estado</label>
            <select class="form-select me-3" id="uf" name="uf" style="border-radius: 0px 5px 5px 0px">
            <option value="" hidden selected disabled>Selecione</option>
                <?php
                $estados = [
                    'AC'=>'Acre','AL'=>'Alagoas','AP'=>'Amapá','AM'=>'Amazonas','BA'=>'Bahia',
                    'CE'=>'Ceará','DF'=>'Distrito Federal','ES'=>'Espírito Santo','GO'=>'Goiás',
                    'MA'=>'Maranhão','MT'=>'Mato Grosso','MS'=>'Mato Grosso do Sul','MG'=>'Minas Gerais',
                    'PA'=>'Pará','PB'=>'Paraíba','PR'=>'Paraná','PE'=>'Pernambuco','PI'=>'Piauí',
                    'RJ'=>'Rio de Janeiro','RN'=>'Rio Grande do Norte','RS'=>'Rio Grande do Sul',
                    'RO'=>'Rondônia','RR'=>'Roraima','SC'=>'Santa Catarina','SP'=>'São Paulo',
                    'SE'=>'Sergipe','TO'=>'Tocantins'
                ];
                
                foreach ($estados as $sigla => $nome): ?>
                    <option value="<?= $sigla ?>">
                        <?= $nome ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="numero" class="input-group-text" style="border-radius: 5px 0px 0px 5px">Número</label>
            <input type="text" class="form-control" id="numero" name="numero">
            </div>

            <div class="d-flex mb-1 small">
                <div id="bairro-error" class="text-danger" style="width: 49%;"></div>
                <div id="logradouro-error" class="text-danger" style="width: 51%;"></div>
            </div>
            <div class="input-group mb-3">
            <label for="bairro" class="input-group-text">Bairro</label>
            <input type="text" class="form-control me-3" id="bairro" name="bairro">

            <label for="logradouro" class="input-group-text" style="border-radius: 5px 0px 0px 5px">Logradouro</label>
            <input type="text" class="form-control" id="logradouro" name="logradouro">
            </div>

            <div id="complemento-error" class="text-danger mb-1 small"></div>
            <div class="input-group mb-3">
            <label for="complemento" class="input-group-text">Complemento</label>
            <input type="text" class="form-control" id="complemento" name="complemento">
            </div>
        </div>

        </form>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
        <input onclick="registerUser()" type="button" class="btn btn-sm btn-outline-success" value="Salvar">
      </div>
    </div>
  </div>
</div>
<!--FIM MODAL ADICIONAR NOVO CLIENTE -->
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../js/crudUser.js"></script>
<!-- FECHAMENTO DA NAV -->
<?php 
include __DIR__.'/../includes/footer.php';
?>