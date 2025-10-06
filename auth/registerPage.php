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
?>
<!DOCTYPE html>
<html lang="en" data-coreui-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.4.1/dist/css/coreui.min.css" rel="stylesheet" integrity="sha384-NlsxdkweGA8nr9s0TVc3Qu2zqhWMNsHrvzMpAjVR0yDqXgC2z+RWYoeCNG2uO2MC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/@coreui/icons/css/all.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.4.1/dist/js/coreui.bundle.min.js"></script>
</head>
<body style="background-color:#1e222a;">

    <div class="min-vh-100 d-flex flex-row align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card mb-4 mx-4">
              <div class="card-body p-4">

                <h1>Cadastre-se</h1>
                <p class="text-body-secondary">Crie sua conta</p>

                <form action="../auth/registerProcess.php" method="post">


                <div class="input-group mb-3">
                <label for="nome" class="input-group-text" id="basic-addon1">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome"  required placeholder="Nome Completo">
                <div id="nomeError" class="text-danger" style="font-size: 14px;"></div>
                </div>


              <div class="input-group mb-3">
                <label for="email" class="input-group-text" id="basic-addon1">Email</label>
                <input type="email" class="form-control" id="email" name="email" required placeholder="exemplo@gmail.com">
              </div>

                <div class="input-group mb-3">
                <label for="telefone" class="input-group-text">Telefone</label>
                <input type="text" class="form-control me-3" id="telefone" placeholder="(00) 00000-0000"
                  style="border-radius: 0px 5px 5px 0px" name="telefone" required>

                <label for="cpf" class="input-group-text" style="border-radius: 5px 0px 0px 5px">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00" required maxlength="14">
              </div>

              <div class="input-group mb-3">
                <label for="data_nasc" class="input-group-text">Data de Nascimento</label>
                <input type="date" class="form-control" id="data_nasc" name="data_nasc" max="2005" required>
              
              </div>

              <div class="input-group mb-3">
                <label for="senha" class="input-group-text" id="basic-addon1">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="********"  required>
              </div>

              <!-- <div class="input-group mb-3">
                <label for="senha" class="input-group-text" id="basic-addon1">Confirmar senha</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Repita a senha"  required>
              </div> -->

              <button onclick="registerUser()" class="btn btn-block btn-outline-warning" type="button">Criar conta</button>
              </form>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="../js/crudUser.js"></script>
    
</body>
</html>
