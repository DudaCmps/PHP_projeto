<?php
include __DIR__.'/../includes/iniciaSessao.php';
include __DIR__ . '/../config.php';

use \App\Entity\Usuario;

//consulta
$cliente = Usuario::getUsuario($_GET['id_user']);


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
  <div class="row">
      
      <!-- <div><h4>Ficha de Felipe Dontal</h4></div>   -->

      <input type="hidden" id="id_user" value="<?=$cliente->id_user?>">
      <input type="hidden" id="perfil" value="<?=$cliente->perfil?>">
      <div class="input-group mb-3">
        <label for="nome" class="input-group-text">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome"placeholder="Nome Completo" value="<?=$cliente->nome?>">
      </div>

      <div class="input-group mb-3">
        <label for="email" class="input-group-text">Email</label>
        <input type="email" class="form-control" id="email" name="email"placeholder="exemplo@gmail.com" value="<?=$cliente->email?>">
      </div>

      <div class="input-group mb-3">
        <label for="telefone" class="input-group-text">Telefone</label>
        <input type="text" class="form-control me-3" id="telefone" name="telefone"
                placeholder="(00) 00000-0000" required  value="<?=$cliente->telefone?>">

        <label for="cpf" class="input-group-text">CPF</label>
        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00" maxlength="14" value="<?=$cliente->cpf?>">
      </div>

      <div class="input-group mb-3">
        <label for="data_nasc" class="input-group-text">Data de Nascimento</label>
        <input type="date" class="form-control" id="data_nasc" name="data_nasc" value="<?=$cliente->data_nasc?>">
      </div>

      <div class="input-group mb-3">
        <label for="senha" class="input-group-text">Senha</label>
        <input type="password" class="form-control" id="senha" name="senha" placeholder="********">
      </div>
      <div class="form-text pb-3">Qualquer informação alterada deverá ser salva antes de sair da página.</div>

      <div class="input-group mb-3">
        <button onclick="atualizarCliente()" class="btn btn-outline-success" type="button">Salvar</button>
      </div>
      
  </div>
</div>