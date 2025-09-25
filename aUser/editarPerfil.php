<?php 
include __DIR__.'/../includes/iniciaSessao.php';


include __DIR__ . '/../config.php';
use \App\Entity\Usuario;

// verificando o usuario
if (isset($_SESSION['perfil']) && $_SESSION['perfil'] === 'admin') {
  include __DIR__.'/../includes/navbarAdmin.php';
} else {
  include __DIR__.'/../includes/navbarCliente.php';
}

//consulta
$obUsuario = Usuario::getUsuario($_SESSION['id_user']);

$estados = [
    'AC'=>'Acre','AL'=>'Alagoas','AP'=>'Amapá','AM'=>'Amazonas','BA'=>'Bahia',
    'CE'=>'Ceará','DF'=>'Distrito Federal','ES'=>'Espírito Santo','GO'=>'Goiás',
    'MA'=>'Maranhão','MT'=>'Mato Grosso','MS'=>'Mato Grosso do Sul','MG'=>'Minas Gerais',
    'PA'=>'Pará','PB'=>'Paraíba','PR'=>'Paraná','PE'=>'Pernambuco','PI'=>'Piauí',
    'RJ'=>'Rio de Janeiro','RN'=>'Rio Grande do Norte','RS'=>'Rio Grande do Sul',
    'RO'=>'Rondônia','RR'=>'Roraima','SC'=>'Santa Catarina','SP'=>'São Paulo',
    'SE'=>'Sergipe','TO'=>'Tocantins'
];
?>

<div class="d-flex flex-column flex-grow-1">
  <div class="m-4">
    <div class="row">
      <div class="col-12">
        
        <div><h4>Editar meus dados</h4></div>  
        <div class="card">

          <div class="card-body">
            
            <form method="post" action="dadosCliente.php">

              <input type="hidden" name="id_user" value="<?=$obUsuario->id_user?>">
              <input type="hidden" name="perfil" value="<?=$obUsuario->perfil?>">

              <div class="input-group mb-3">
                <label for="nome" class="input-group-text">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required value="<?=$obUsuario->nome?>">
              </div>

              <div class="input-group mb-3">
                <label for="email" class="input-group-text">Email</label>
                <input type="email" class="form-control" id="email" name="email" required value="<?=$obUsuario->email?>">
              </div>

              <div class="input-group mb-3">
                <label for="telefone" class="input-group-text">Telefone</label>
                <input type="text" class="form-control me-3" id="telefone" name="telefone"
                value="<?=$obUsuario->telefone?>" required>

                <label for="cpf" class="input-group-text">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="<?=$obUsuario->cpf?>" required maxlength="14">
              </div>

              <div class="input-group mb-3">
                <label for="data_nasc" class="input-group-text">Data de Nascimento</label>
                <input type="date" class="form-control" id="data_nasc" name="data_nasc" required value="<?=$obUsuario->data_nasc?>">
              </div>

              <div class="input-group mb-3">
                <label for="senha" class="input-group-text">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="********">
              </div>
              <div class="form-text pb-3">Qualquer informação alterada deverá ser salva antes de sair da página.</div>
              <button class="btn btn-outline-success" type="submit">Salvar</button>
            </form>
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