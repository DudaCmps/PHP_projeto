<!DOCTYPE html>
<html lang="en" >
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
        @import url('https://fonts.googleapis.com/css2?family=Audiowide&display=swap');
        .sidebar-header {
          padding: 8.9px 1rem; 
        }
        .sidebar-header > h2 {
        font-family: "Audiowide", sans-serif;
        } 
        
        .nav-link > i{
            color: #949393;
        }

        .nav-link:hover i {
        color: #1f1f1f;
        }
        .wrapper{
            margin-left: 16rem;
            margin-top: 4rem;
        }

        .tab-pane {
            background-color: #f3f4f7;
        }
        .cabine {
 
          transform: translateZ(100PX);

        }
        
    </style>


</head>
<body>

<div class="sidebar sidebar-fixed border-end" id="sidebar">
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
              <i class="cil-user-plus fs-5 me-2"></i> Cadastrar usuário
          </a>
      </li>

      <li class="nav-item">
          <a class="nav-link" href="listagemClientes.php">
              <i class="cil-list-filter me-2"></i></i> Listar usuários
          </a>
      </li>

      <li class="nav-title">Veículos</li>

      <li class="nav-item">
          <a class="nav-link" href="cadastrarVeiculo.php">
            <i class="cil-car me-2"></i> Cadastrar veículos
          </a>
      </li>

      <li class="nav-item">
          <a class="nav-link" href="ListagemVeiculos.php">
            <i class="cil-list me-2"></i> Listar veículos
          </a>
      </li>

      <li class="nav-item">
          <a class="nav-link" href="listagemManutencao.php">
            <i class="cil-settings me-2"></i> Manutenção
          </a>
      </li>

      <li class="nav-title">Reservas</li>

      <li class="nav-item">
          <a class="nav-link" href="criaReserva.php">
            <i class="cil-key-alt me-2"></i> Reservar um Veículo
          </a>
      </li>

      <li class="nav-item">
          <a class="nav-link" href="listagemReservas.php">
            <i class="cil-check-circle me-2"></i> Reservas Ativas
          </a>
      </li>

    </ul>
  </div>

  <!-- Header e conteudo -->
  <div class="wrapper min-vh-100 ">

        <header class="header header-sticky border-bottom" 
        style="position: fixed; top: 0; left: 250px; right: 0; height: 65px; ">
            <div class="container-fluid h-100 d-flex align-items-center px-4" >
                <ul class="header-nav d-none d-md-flex">

                    <li class="nav-item"><a class="nav-link" href="#" data-coreui-i18n="dashboard">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-coreui-i18n="users">Users</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-coreui-i18n="settings">Settings</a></li>
                  </ul>
            </div>
        </header>
        