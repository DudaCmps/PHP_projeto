<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LocaFast</title>
    <link rel="stylesheet" href="/locafast/public/custom/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">

    <!-- icon googlefonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=menu" />

    <!-- link boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .dropdown-item:hover {
        background-color: #2B323B;
        }

        .fundo {
         background-color:rgba(43, 50, 59, 0.25);    
        }

       
    </style>

</head>
<body>
    
    <!-- Bootstrap JS Bundle (com Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-VeFyAyzbfuFzD0OfIj4MDGmKrZixL+bWZjqbD9++ZoTVv7XZy4EkcF7aD1ZPP5qj" crossorigin="anonymous"></script>

    <div id="header-alert">
        <a href="#">Viaje para os EUA e Europa com ótimas OFERTAS em nossa frota Premium! - Reserve agora</a>
    </div>

    <!-- Header -->
    <div class="header-bar">

        <div id="header-logo">
      
            <h1 data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample">LocaFast</h1>
        </div>
        
        <!-- <button onclick="window.location.href='./auth/loginPage.php'" id="login-button">
            <div id="login-icon" class="p-0">
            <svg viewBox="0 0 200 200" width="20px" height="20px"  xmlns="http://www.w3.org/2000/svg"><path fill="white" d="M118.61 188.05c.7-.15 1.36-.36 2.05-.53c2.32-.55 4.62-1.13 6.87-1.85c.51-.17 1-.38 1.51-.55c2.4-.82 4.77-1.7 7.08-2.72c.31-.14.6-.3.91-.44c2.48-1.12 4.91-2.34 7.26-3.67c.14-.08.26-.16.4-.24c2.51-1.44 4.94-2.99 7.28-4.66c.01 0 .03-.02.04-.03C174.97 157.05 190 130.3 190 100c0-49.71-40.29-90-90-90s-90 40.29-90 90c0 30.31 15.03 57.06 37.99 73.36c.01 0 .03.02.04.03c2.35 1.67 4.78 3.22 7.28 4.66c.14.08.26.17.4.24c2.36 1.34 4.79 2.55 7.27 3.68c.31.14.6.3.9.43c2.31 1.01 4.68 1.9 7.08 2.72c.51.17 1 .39 1.51.55c2.25.72 4.55 1.3 6.87 1.85c.69.16 1.35.38 2.05.53c2.28.48 4.61.81 6.95 1.11c.75.1 1.48.26 2.24.34c3.1.32 6.23.5 9.42.5s6.32-.17 9.42-.5c.76-.08 1.49-.24 2.24-.34c2.34-.3 4.67-.63 6.95-1.11zM100 26.36c40.6 0 73.64 33.03 73.64 73.64c0 19.08-7.35 36.43-19.3 49.52c-14.45-12.93-33.42-20.88-54.34-20.88s-39.89 7.95-54.34 20.88c-11.94-13.09-19.3-30.44-19.3-49.52c0-40.6 33.03-73.64 73.64-73.64zM75.45 91.81V71.36c0-1.39.12-2.76.34-4.09C77.74 55.66 87.83 46.82 100 46.82c13.56 0 24.55 10.99 24.55 24.55v20.45c0 13.56-10.99 24.55-24.55 24.55s-24.55-10.99-24.55-24.55z"></path></svg>
                </div> 
            <div id="login-text">Entrar</div>
        </button> -->

        <!-- VERSAO CLIENTE LOGADO -->

        <div class="d-flex dropdown">
            <div class="d-flex justify-content-center align-items-center me-4 bg-secondary rounded-circle" style="width:42px; height:42px;" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="d-flex justify-content-center align-items-center rounded-circle text-black bg-warning" style="width:32px; height:32px; font-weight:800;font-size:16px;">F</div>
            </div>

            <ul class="dropdown-menu custom mt-1 bg-secondary text-white">
                <li><a class="dropdown-item text-white pt-2 pb-2 small" href="/locafast/aUser/editarPerfil.php">Minhas Conta</a></li>
                <li><a class="dropdown-item text-white pt-2 pb-2 small" href="/locafast/clientes/listagemVeiculos.php">Reservas</a></li>
                <li><a class="dropdown-item text-white pt-2 pb-2 small" href="/locafast/clientes/alugueisCliente.php">Alugueis</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-white pt-2 pb-2 small" href="../auth/logout.php"><svg width="15" height="15" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sign-out-alt" class="svg-inline--fa fa-sign-out-alt fa-w-16 text-danger me-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"></path></svg>Logout</a></li>

            </ul>
        </div>

    </div>

    <!-- Menu offcanvas -->
    <div class="offcanvas offcanvas-start" tabindex="-1" data-bs-backdrop="false" id="offcanvasExample" style="width: 280px;top: 102px !important;">

    <div class="offcanvas-body">

    <ul class="nav flex-column">
      <li class="nav-item">
          <a class="nav-link text-white" href="#" style="font-size: 14px;">
              Inicio
          </a>
      </li>

      <li class="nav-item">
          <a class="nav-link text-white" href="#" style="font-size: 14px;">
             Carros
          </a>
      </li>

      <li class="nav-item">
          <a class="nav-link text-white" href="#" style="font-size: 14px;">
             Reservas
          </a>
      </li>

      <li class="nav-item">
          <a class="nav-link text-white" href="#" style="font-size: 14px;">
             Alugueis
          </a>
      </li>
    </ul>
  </div>
</div>

</div>
</div>
