<?php 
include __DIR__.'/../includes/iniciaSessao.php';
include __DIR__.'/../includes/navbarAdmin.php';
include __DIR__ . '/../config.php';

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
        
        <div><h4>Ficha de Felipe Dontal</h4></div>  
        <div class="card">

          <div class="card-body">
            
            <form method="post" action="processaCliente.php">

              <div class="input-group mb-3">
                <label for="nome" class="input-group-text">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required placeholder="Nome Completo">
              </div>

              <div class="input-group mb-3">
                <label for="email" class="input-group-text">Email</label>
                <input type="email" class="form-control" id="email" name="email" required placeholder="exemplo@gmail.com">
              </div>

              <div class="input-group mb-3">
                <label for="telefone" class="input-group-text">Telefone</label>
                <input type="text" class="form-control me-3" id="telefone" name="telefone"
                       placeholder="(00) 00000-0000" required>

                <label for="cpf" class="input-group-text">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00" required maxlength="14">
              </div>

              <div class="input-group mb-3">
                <label for="data_nasc" class="input-group-text">Data de Nascimento</label>
                <input type="date" class="form-control" id="data_nasc" name="data_nasc" required>
              </div>

              <div class="input-group mb-3">
                <label for="senha" class="input-group-text">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" required placeholder="********">
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