<?php 
include __DIR__.'/../includes/iniciaSessao.php';
include __DIR__.'/../includes/navbarAdmin.php';

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
        <div class="card">

          <div class="card-header">
            <strong>Cadastrar novo cliente</strong>
          </div>

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

              <h4 class="p-2">Endereço</h4>

              <div class="input-group mb-3">
                <label for="cep" class="input-group-text">CEP</label>
                <input type="text" class="form-control me-3" id="cep" name="cep" placeholder="00000-000">

                <label for="numero" class="input-group-text">N°</label>
                <input type="text" class="form-control flex-grow-0" id="numero" name="numero" style="width: 150px;">
              </div>

              <div class="input-group mb-3">
                <label for="cidade" class="input-group-text">Cidade</label>
                <input type="text" class="form-control me-3" id="cidade" name="cidade">

                <label for="estado" class="input-group-text">Estado</label>
                <select class="form-select" id="estado" name="estado">
                  <option value="" disabled selected>Selecione</option>
                  <?php foreach ($estados as $sigla => $nome): ?>
                    <option value="<?= $sigla ?>"><?= $nome ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="input-group mb-3">
                <label for="bairro" class="input-group-text">Bairro</label>
                <input type="text" class="form-control me-3" id="bairro" name="bairro">

                <label for="logradouro" class="input-group-text">Logradouro</label>
                <input type="text" class="form-control" id="logradouro" name="logradouro">
              </div>

              <div class="input-group mb-3">
                <label for="complemento" class="input-group-text">Complemento</label>
                <input type="text" class="form-control" id="complemento" name="complemento">
              </div>

              <button class="btn btn-outline-primary" type="submit">Cadastrar Cliente</button>
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

