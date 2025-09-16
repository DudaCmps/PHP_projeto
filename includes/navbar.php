<?php 
$mensagem = '';
define('BASE_URL', '/locaFast/');

if (isset($_GET['status'])) {
  switch ($_GET['status']) {
      case 'success':
          $mensagem = '
          <div class="alert alert-success alert-dismissible fade show m-4" role="alert">
              ✅ Ação realizada com sucesso!
              <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
          </div>';
          break;
      
      case 'error':
          $mensagem = '
          <div class="alert alert-danger alert-dismissible fade show m-4" role="alert">
              ❌ Ação não realizada!
              <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
          </div>';
          break;
  }
}
date_default_timezone_set('America/Sao_Paulo');
?>

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

    <!-- Font Awesome Free -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>



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
        color:rgb(255, 255, 255);
        }
        .wrapper{
            margin-left: 16rem;
            margin-top: 4rem;
        }

        .tab-pane {
            /* background-color: #f3f4f7; */
            background-color:rgba(71, 106, 247, 0)
        }
        .cabine {
          transform: translateZ(100PX);
        }

        .status{
        
        --cui-badge-padding-x: 0.65em;
        --cui-badge-padding-y: 0.35em;
        --cui-badge-font-size: 0.85em;
        --cui-badge-font-weight: 700;
        --cui-badge-color: #fff;
        --cui-badge-border-radius: var(--cui-border-radius);
        display: inline-block;
        padding: var(--cui-badge-padding-y) var(--cui-badge-padding-x);
        font-size: var(--cui-badge-font-size);
        font-weight: var(--cui-badge-font-weight);
        line-height: 1;
        color: var(--cui-badge-color);
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: var(--cui-badge-border-radius, 0);
        }

        .status-success {
        background-color: var(--cui-success);
        }

        .status-warning {
        background-color: var(--cui-warning);
        }
        .status-info{
            background-color: var(--cui-info);
        }
        
        .registros{
            background-color:#3a3a3a;
        }

        .registrosLink {
            color:rgb(177, 177, 177);
            text-decoration: none;
        }
        
    </style>


</head>
<body>

<div class="sidebar sidebar-fixed border-end" id="sidebar">
    <div class="sidebar-header border-bottom">
      <h2><i class="cib-vlc"></i>LocaFast</h2>
    </div>

    <!-- Nav -->
    <ul class="sidebar-nav">

      <li class="nav-item">
          <a class="nav-link active" href="<?= BASE_URL ?>index2.php">
              <i class="cil-speedometer me-2"></i>Dashboard
          </a>
      </li>

      <li class="nav-title">Users</li>

      <li class="nav-item">
          <a class="nav-link" href="<?= BASE_URL ?>usuarios/cadastrarUsuario.php">
              <i class="cil-user-plus fs-5 me-2"></i> Cadastrar usuário
          </a>
      </li>

      <li class="nav-item">
          <a class="nav-link" href="<?= BASE_URL ?>usuarios/listagemUsuarios.php">
              <i class="cil-list-filter me-2"></i></i> Listar usuários
          </a>
      </li>

      <li class="nav-title">Veículos</li>

      <li class="nav-item">
        <a class="nav-link" href="<?= BASE_URL ?>veiculos/cadastrarVeiculo.php">
          <i class="me-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-car-front-fill" viewBox="0 0 16 16">
            <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2m10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17s3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z"/>
            </svg>
            </i> Cadastrar veículos
        </a>
      </li>

      <li class="nav-item">
          <a class="nav-link" href="<?= BASE_URL ?>veiculos/ListagemVeiculos.php">
            <i class="cil-list me-2"></i> Listar veículos
          </a>
      </li>

      <li class="nav-item">
          <a class="nav-link" href="<?= BASE_URL ?>manutenções/listagemManutencao.php">
            <i class="cil-settings me-2"></i> Manutenção
          </a>
      </li>

      <li class="nav-title">Reservas</li>

      <li class="nav-item">
          <a class="nav-link" href="<?= BASE_URL ?>reservas/criaReserva.php">
          <i class="cil-paperclip me-2"></i> Reservar um Veículo
          </a>
      </li>

      <li class="nav-item">
          <a class="nav-link" href="<?= BASE_URL ?>reservas/listagemReservas.php">
            <i class="cil-check-circle me-2"></i> Reservas Ativas
          </a>
      </li>

    </ul>
  </div>

  <!-- Header e conteudo -->
  <div class="wrapper min-vh-100 ">

        <header class="header header-sticky border-bottom" 
        style="position: fixed; top: 0; left: 250px; right: 0; height: 66px; ">
            <div class="container-fluid h-100 d-flex align-items-center px-4" >
                <ul class="header-nav d-none d-md-flex">

                    <li class="nav-item"><a class="nav-link" href="#" data-coreui-i18n="dashboard">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-coreui-i18n="usuarios">Usuarios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-coreui-i18n="settings">Settings</a></li>
                  </ul>
            </div>
        </header>
        