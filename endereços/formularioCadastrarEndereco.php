<div class="d-flex flex-column flex-grow-1">
<?php
include __DIR__.'/../includes/iniciaSessao.php';
include __DIR__ . '/../config.php';
use \App\Entity\Usuario;


// verificando o usuario
if (isset($_SESSION['perfil']) && $_SESSION['perfil'] === 'admin') {
    include __DIR__.'/../includes/navbarAdmin.php';
    $client = $_GET['id_user'];

} else {
    include __DIR__.'/../includes/navbarCliente.php';
    $client = $_SESSION['id_user'];
}

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

  <div class="m-4">
    <div class="row">
      <div class="col-12">
        <div class="card">

          <div class="card-header">
            <strong>Cadastro</strong>
          </div>

          <div class="card-body">
            <form method="post" action="cadastrarEndereco.php">
              <input type="hidden" name="id_user" value="<?=$client?>">
              
              <div class="input-group mb-3">
                <label for="cep" class="input-group-text">CEP</label>
                <input type="text" class="form-control" id="cep" name="cep" placeholder="00000-000">
              </div>

              <div class="input-group mb-3">
              <label for="cidade" class="input-group-text">Cidade</label>
              <input type="text" class="form-control me-3" id="cidade" name="cidade" style="border-radius: 0px 5px 5px 0px">

              <label for="estado" class="input-group-text" style="border-radius: 5px 0px 0px 5px">Estado</label>
              <select class="form-select me-3" id="estado" name="estado" style="border-radius: 0px 5px 5px 0px">
                  <option value="">Selecione</option>
                  <?php foreach ($estados as $sigla => $nome): ?>
                      <option value="<?= $sigla ?>">
                          <?= $nome ?>
                      </option>
                  <?php endforeach; ?>
              </select>

              <label for="numero" class="input-group-text" style="border-radius: 5px 0px 0px 5px">Número</label>
              <input type="text" class="form-control" id="numero" name="numero" >
              </div>

              <div class="input-group mb-3">
                <label for="bairro" class="input-group-text">Bairro</label>
                <input type="text" class="form-control me-3" id="bairro" name="bairro" >

                <label for="logradouro" class="input-group-text" style="border-radius: 5px 0px 0px 5px">Logradouro</label>
                <input type="text" class="form-control" id="logradouro" name="logradouro" >
              </div>

              <div class="input-group mb-3">
                <label for="complemento" class="input-group-text">Complemento</label>
                <input type="text" class="form-control" id="complemento" name="complemento" >
              </div>

              <button type="submit" class="btn btn-primary mb-3 mt-2">Cadastrar</button>
            </form>
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
