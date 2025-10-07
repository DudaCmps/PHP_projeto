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
<body>
    <div style="background-color: #1e222a;" class=" min-vh-100 d-flex flex-row align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="card-group d-block d-md-flex row">
              <div class="card col-md-7 p-4 mb-0">

                <div class="card-body">
                  <h1>Bem vindo(a)!</h1>
                  <p class="text-body-secondary">Entre na sua conta</p>

                  <form id="formLogin" method="POST">

                  <div id="emailError" class="text-danger mb-1"></div>
                  <div class="input-group mb-3"><span class="input-group-text">
                    <i class="cil-user"></i></span>
                    <input class="form-control" type="text" placeholder="exemplo@gmail.com" id="email" name="email">
                  </div>
                  
                  <div id="senhaError" class="text-danger mb-1"></div>
                  <div class="input-group mb-4"><span class="input-group-text">
                  <i class="cil-lock-locked"></i></span>
                    <input class="form-control" type="password" placeholder="********" id="senha" name="senha">
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <input onclick="loginUser()" type="button" class="btn btn-primary px-4" value="Entrar">
                  </div>
                  

                  </form>
                    <div class="col-6 text-end">
                      <button class="btn btn-link px-0" type="button">Esqueceu a senha?</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card col-md-5 text-white bg-primary py-5">
                <div class="card-body text-center">
                  <div>
                    <h2>Cadastre-se</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <a href="registerPage.php"><button class="btn btn-lg btn-outline-light mt-3" type="button">Cadastre Agora!</button></a>
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
</body>
</html>