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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- link para tabelas -->
    <link href="https://cdn.jsdelivr.net/npm/material-dashboard@1.0.0/dist/css/material-dashboard.css" rel="stylesheet">

    <!-- Font Awesome Free -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&display=swap" rel="stylesheet">

<style>
        @import url('https://fonts.googleapis.com/css2?family=Audiowide&display=swap');
body{
    font-family: 'Nunito Sans', sans-serif;
}

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
        .caixaUser{ 
            font-size: 14px;
            font-weight: 600;
            padding: 10px 12px;
            border-radius: 8px;
            transition: background 0.2s;
        }

        .dropdown-menu {
            box-shadow: 0px 1px 11px 1px #2323237a;
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

        <div>
            <div></div>
        </div>

      <li class="nav-title">Veículos e Aluguel</li>

      <li class="nav-item">
          <a class="nav-link" href="<?= BASE_URL ?>reservas/listagemReservas.php">
            <i class="cil-check-circle me-2"></i> Meus Alugueis
          </a>
      </li>

      <li class="nav-item">
          <a class="nav-link" href="<?= BASE_URL ?>reservas/criaReserva.php">
          <i class="cil-paperclip me-2"></i> Reservar um Veículo
          </a>
      </li>

      <li class="nav-title">Pagamentos</li>

      <li class="nav-item">
          <a class="nav-link" href="<?= BASE_URL ?>reservas/criaReserva.php">
          <i class="cil-paperclip me-2"></i> Pagamentos em aberto
          </a>
      </li>
      
    </ul>
  </div>

  <!-- Header e conteudo -->
  <div class="wrapper min-vh-100 ">

  <header class="header header-sticky border-bottom" 
        style="position: fixed; top: 0; left: 250px; right: 0; height: 66px;">
    <div class="container-fluid h-100 d-flex align-items-center px-4">

        <!-- Menu da esquerda -->
        <ul class="header-nav d-none d-md-flex">
            <li class="nav-item"><a class="nav-link" href="#" data-coreui-i18n="dashboard">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="#" data-coreui-i18n="usuarios">Usuarios</a></li>
            <li class="nav-item"><a class="nav-link" href="#" data-coreui-i18n="settings">Settings</a></li>
        </ul>

        <!-- Ícone logout alinhado à direita -->
        <div class="ms-auto d-flex flex-row align-items-center">
        <div class="dropdown">
            <button class="caixaUser d-flex align-items-center border-0 bg-transparent" 
                    type="button" 
                    data-bs-toggle="dropdown" 
                    aria-expanded="false">
            
            <!-- Avatar -->
            <img src="../imgUser.png" alt="Avatar" class="rounded-circle me-2" width="40" height="40">
            
            <!-- Nome -->
            <span>Olá, Maria Campos</span>
            
            </button>

            <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#">Editar Perfil</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#"><svg width="15" height="15" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sign-out-alt" class="svg-inline--fa fa-sign-out-alt fa-w-16 text-danger me-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"></path></svg>Logout</a></li>
            </ul>
        </div>
        </div>

    </div>
</header>

        