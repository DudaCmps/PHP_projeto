<?php 
include __DIR__.'/../includes/iniciaSessao.php';
include __DIR__ . '/../config.php';
use \App\Entity\Usuario;

// verificando o usuario
if (isset($_SESSION['perfil']) && $_SESSION['perfil'] === 'admin') {
  include __DIR__.'/../includes/navbarAdmin.php';
} 
include __DIR__.'/../public/header.php';

//consulta
$obUsuario = Usuario::getUsuario($_SESSION['id_user']);

$formularioTipo = null;

if (isset($_GET['sinal']) && $_GET['sinal'] == 'editar') {
  $formularioTipo = $_GET['sinal'];
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

<div style="background-color: #2B323B; border-top:1px solid black;">
      <ul class="d-flex flex-center list-unstyled justify-content-center m-0 ">
        <li class="mx-5">
          <a href="/pt-br/cliente/minhas-reservas" title="Minhas Reservas" class="d-flex btn btn-menu-header active-link  text-white">
            <img src="//static.rentcars.com/imagens/icons/icon-my-bookings.svg" alt="Minhas Reservas" class="icon-menu-header pe-2" data-cmp-info="10">
            <span class="font-weight-500 line-height-24 font-size-16"> Meu histórico </span>
          </a>
        </li>
            
              <li class="mx-5"><a href="/pt-br/minha-carteira" title="Meu Endereço" class="d-flex btn btn-menu-header  text-white"><img src="//static.rentcars.com/imagens/icons/icon-my-account-new.svg" alt="Minha carteira" class="icon-menu-header pe-2" data-cmp-info="10"> <span class="font-weight-500 line-height-24 font-size-16">
              Meus Endereços</span></a></li>
              <li class="mx-5"><a href="/pt-br/cliente/minha-conta" title="Minha Conta" class="d-flex btn btn-menu-header  text-white"><img src="//static.rentcars.com/imagens/icons/icon-my-account.svg" alt="Minha Conta" class="icon-menu-header pe-2" data-cmp-info="10"> <span class="font-weight-500 line-height-24 font-size-16">
              Minha Conta</span></a></li>
        </ul>
</div>

<div class="d-flex justify-content-center align-items-center fundo">
<div style="width: 1300px;">

<div class="d-flex flex-column flex-grow-1">
  <div class="m-4">

  <?php if (!isset($formularioTipo)) { ?>
    
    <!-- formulario fixo -->
    <div class="row"  style="height: 636px;">
      <div class="col-12"  style="height: 550px;">
        
        <div class="d-flex justify-content-between" style="height: 35px;">
          <h4>Minha conta</h4>
          <a href="editarPerfil.php?id=<?=$_SESSION['id_user']?>&sinal=editar" class="btn btn-sm btn-warning mb-2">Editar dados</a>
        </div>  
        <div class="card h-75" style="background-color:  #2B323B;">

          <div class="card-body">
            
            <form method="post" action="dadosCliente.php">

              <input type="hidden" name="id_user" value="<?=$obUsuario->id_user?>">
              <input type="hidden" name="perfil" value="<?=$obUsuario->perfil?>">

              <div class="input-group mb-3">
                <label for="nome" class="input-group-text">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required value="<?=$obUsuario->nome?>" disabled>
              </div>

              <div class="input-group mb-3">
                <label for="email" class="input-group-text">Email</label>
                <input type="email" class="form-control" id="email" name="email" required value="<?=$obUsuario->email?>" disabled>
              </div>

              <div class="input-group mb-3">
                <label for="telefone" class="input-group-text">Telefone</label>
                <input type="text" class="form-control me-3" id="telefone" name="telefone"
                value="<?=$obUsuario->telefone?>" required disabled>

                <label for="cpf" class="input-group-text">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="<?=$obUsuario->cpf?>" required maxlength="14" disabled>
              </div>

              <div class="input-group mb-3">
                <label for="data_nasc" class="input-group-text">Data de Nascimento</label>
                <input type="date" class="form-control" id="data_nasc" name="data_nasc" required value="<?=$obUsuario->data_nasc?>" disabled>
              </div>

              <div class="input-group mb-3">
                <label for="senha" class="input-group-text">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="********" disabled>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>

  <?php } elseif (isset($formularioTipo) && $formularioTipo == 'editar') { ?>

    <!-- formulario de edição -->
  <div class="row" style="height: 636px;">
      <div class="col-12"  style="height: 550px;">
        
        <div class="d-flex justify-content-between" style="height: 35px;">
          <h4>Minha conta</h4>
          <!-- <a disable class="btn btn-sm btn-warning mb-2">TEMPORARIO</a> -->

        </div>  
        <div class="card h-75" style="background-color:  #2B323B;">

          <div class="card-body">
            
            <form method="post">

              <input type="hidden" name="id_user" id="id_user" value="<?=$obUsuario->id_user?>">
              <input type="hidden" name="perfil" id="perfil" value="<?=$obUsuario->perfil?>">

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
              <div class="form-text pb-3 text-white">Qualquer informação alterada deverá ser salva antes de sair da página.</div>

              <input onclick="updateUser()" type="button" class="btn btn-sm btn-outline-success me-1" value="Salvar">

              <a href="editarPerfil.php" type="button" class="btn btn-sm btn-outline-danger">Cancelar</a>

            </form>
          </div>

        </div>
      </div>
    </div>

    <?php } ?>
  </div>
</div>

</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../js/crudUser.js"></script>

<!-- FECHAMENTO DA NAV -->
<?php 
include __DIR__.'/../public/footer.php';
?>      