<!DOCTYPE html>
<html lang="en" data-coreui-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LocaFast</title>
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.4.1/dist/css/coreui.min.css" rel="stylesheet" integrity="sha384-NlsxdkweGA8nr9s0TVc3Qu2zqhWMNsHrvzMpAjVR0yDqXgC2z+RWYoeCNG2uO2MC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/@coreui/icons/css/all.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.4.1/dist/js/coreui.bundle.min.js"></script>
    
    <!-- link para tabelas -->
    <link href="https://cdn.jsdelivr.net/npm/material-dashboard@1.0.0/dist/css/material-dashboard.css" rel="stylesheet">


    <style>

        .sidebar-nav .nav-link i {
        color: #495057;      /* cinza escuro */
        font-weight: lighter;     /* mais fino */
        transition: color 0.2s;
        }
        .sidebar-nav .nav-link:hover i,
        .sidebar-nav .nav-link.active i {
        color: #ffffff;       /* branco */
        }
        .header-big {
        height: 79px;              /* altura fixa */
        display: flex;
        align-items: center;       /* centraliza conteúdo */
}

    </style>


</head>
<body>

<!-- header.php -->
<header class="header bg-dark text-light header-big border-bottom" style="margin-left:16em; border-bottom: 1px solid #3c3f41;">
  <div class="container-fluid px-4">
    <h5><?php 
            if (!defined("TITLE")) {
              define('TITLE', 'Dashboard'); 
              echo TITLE;
            }else{
              echo TITLE;
            }
    ?></h5>
    <!-- <ul class="header-nav d-none d-lg-flex">
      <li class="nav-item"><a class="nav-link text-white" href="#">Dashboard</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="#">Users</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="#">Settings</a></li>
    </ul> -->
    <!-- Caso decida colocar icone no final da header -->
    <!-- <ul class="header-nav ms-auto">
      <li class="nav-item"><a class="nav-link" href="#">
          <svg class="icon icon-lg">
            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
          </svg></a>
      </li>
    </ul> -->
  </div>
</header>

  <div class="sidebar sidebar-dark sidebar-fixed border-end" id="sidebar">
    <!-- Cabeçalho da sidebar -->
    <div class="sidebar-header border-bottom">
      <h2>LocaFast</h2>
    </div>

    <!-- Nav -->
    <ul class="sidebar-nav">
      <li class="nav-item">
            <a class="nav-link active" href="index.php">
                <i class="cil-speedometer me-2"></i>Dashboard
            </a>
      </li>
      <li class="nav-title">Clientes</li>
      <li class="nav-item">
            <a class="nav-link" href="cadastrarCliente.php">
                <i class="cil-user-plus fs-5 me-2"></i> Cadastrar cliente
            </a>
      </li>
      <li class="nav-item">
            <a class="nav-link" href="listagemClientes.php">
                <i class="cil-task me-2 "></i> Listar usuários
            </a>
      </li>
      <li class="nav-title">Veículos</li>
      <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="cil-description me-2"></i> Cadastrar
            </a>
      </li>
      <li class="nav-item">
            <a class="nav-link" href="cadastrarVeiculo.php">
            <i class="cil-list me-2"></i> Listar
            </a>
      </li>
      <li class="nav-item">
            <a class="nav-link" href="#">
            <i class="cil-settings me-2"></i> Manutenção
            </a>
      </li>
    </ul>
  </div>

</body>
</html>

