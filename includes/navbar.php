<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LocaFast</title>
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.4.1/dist/css/coreui.min.css" rel="stylesheet" integrity="sha384-NlsxdkweGA8nr9s0TVc3Qu2zqhWMNsHrvzMpAjVR0yDqXgC2z+RWYoeCNG2uO2MC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/@coreui/icons/css/all.min.css" rel="stylesheet">

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
    </style>


</head>
<body>
<header class="header header-sticky mb-4 border-bottom">
    <div class="container-fluid">
      <button class="btn btn-primary d-lg-none" type="button" data-coreui-toggle="sidebar-show">
        <i class="cil-menu"></i>
      </button>
      <a class="header-brand d-lg-none" href="#">LocaFast</a>
      <ul class="header-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="#"><i class="cil-bell"></i></a></li>
        <li class="nav-item"><a class="nav-link" href="#"><i class="cil-user"></i></a></li>
      </ul>
    </div>
  </header>
  <div class="sidebar sidebar-dark sidebar-fixed border-end" id="sidebar">
    <!-- Cabeçalho da sidebar -->
    <div class="sidebar-header border-bottom">
      <h2>LocaFast</h2>
    </div>

    <!-- Navegação -->
    <ul class="sidebar-nav">
      <li class="nav-item">
            <a class="nav-link active" href="index.php">
                <i class="cil-speedometer me-2"></i>Dashboard
            </a>
      </li>
      <li class="nav-title">Clientes</li>
      <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="cil-user-plus fs-5 me-2"></i> Cadastrar cliente
            </a>
      </li>
      <li class="nav-item">
            <a class="nav-link" href="#">
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
            <a class="nav-link" href="#">
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

