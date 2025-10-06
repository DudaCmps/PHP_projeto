<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LocaFast</title>
    <link rel="stylesheet" href="site-nologin/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">

    <!-- icon googlefonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=menu" />

    <!-- link boostrap -->
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


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
            <!-- Botão -->
            
                <span style="color: white; cursor: pointer;" class="material-symbols-outlined" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample">
                    menu
                </span>
      
            <h1>LocaFast</h1>
        </div>

        <!-- Menu offcanvas -->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample">

            <div class="offcanvas-header">
            <h5 class="offcanvas-title">Guaraná</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
            </div>

            <div class="offcanvas-body">
            <div style="height: 50%; width: 100%; background-image: url(u.jpg); background-repeat: no-repeat;"></div>
            </div>
        </div>
        
        <button onclick="window.location.href='./auth/loginPage.php'" id="login-button">
            <div id="login-icon" class="p-0">
            <svg viewBox="0 0 200 200" width="20px" height="20px"  xmlns="http://www.w3.org/2000/svg"><path fill="white" d="M118.61 188.05c.7-.15 1.36-.36 2.05-.53c2.32-.55 4.62-1.13 6.87-1.85c.51-.17 1-.38 1.51-.55c2.4-.82 4.77-1.7 7.08-2.72c.31-.14.6-.3.91-.44c2.48-1.12 4.91-2.34 7.26-3.67c.14-.08.26-.16.4-.24c2.51-1.44 4.94-2.99 7.28-4.66c.01 0 .03-.02.04-.03C174.97 157.05 190 130.3 190 100c0-49.71-40.29-90-90-90s-90 40.29-90 90c0 30.31 15.03 57.06 37.99 73.36c.01 0 .03.02.04.03c2.35 1.67 4.78 3.22 7.28 4.66c.14.08.26.17.4.24c2.36 1.34 4.79 2.55 7.27 3.68c.31.14.6.3.9.43c2.31 1.01 4.68 1.9 7.08 2.72c.51.17 1 .39 1.51.55c2.25.72 4.55 1.3 6.87 1.85c.69.16 1.35.38 2.05.53c2.28.48 4.61.81 6.95 1.11c.75.1 1.48.26 2.24.34c3.1.32 6.23.5 9.42.5s6.32-.17 9.42-.5c.76-.08 1.49-.24 2.24-.34c2.34-.3 4.67-.63 6.95-1.11zM100 26.36c40.6 0 73.64 33.03 73.64 73.64c0 19.08-7.35 36.43-19.3 49.52c-14.45-12.93-33.42-20.88-54.34-20.88s-39.89 7.95-54.34 20.88c-11.94-13.09-19.3-30.44-19.3-49.52c0-40.6 33.03-73.64 73.64-73.64zM75.45 91.81V71.36c0-1.39.12-2.76.34-4.09C77.74 55.66 87.83 46.82 100 46.82c13.56 0 24.55 10.99 24.55 24.55v20.45c0 13.56-10.99 24.55-24.55 24.55s-24.55-10.99-24.55-24.55z"></path></svg>
                </div> 
            <div id="login-text">Entrar</div>
        </button>
    </div>


    <div id=wrapper-img-mega>
        <div class="background"></div>
       <h1> Encontre as melhores ofertas de aluguel de carros</h1>
    </div>

    <div class="header-bar">
        <ul class="beneficios-lista">
            <li class="beneficios-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-globe base-primary"><circle cx="12" cy="12" r="10"></circle><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path><path d="M2 12h20"></path></svg><p class=" m-0 paragraph beneficios-item">Compare preços em mais de 300 locadoras</p></li>
                <li class="beneficios-item"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-badge-dollar-sign base-primary"><path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"></path><path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"></path><path d="M12 18V6"></path></svg><p class="m-0 paragraph beneficios-item">Melhor preço garantido</p></li>
                <li class="beneficios-item"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ticket base-primary"><path d="M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"></path><path d="M13 5v2"></path><path d="M13 17v2"></path><path d="M13 11v2"></path></svg><p class="m-0 beneficios-item">Cashback para o seu próximo aluguel</p>
            </li>
        </ul>
    </div>

    <section class="nossa-frota">
        <div id="check-frota">
            <h3>Conheça a nossa Frota</h3>
            <p>As melhores condições para você reservar e aproveitar</p>
        </div>
        <div id="content-cars">
            
        </div>
    </section>


   
    <!-- <footer>
        <div>© 2025 LocaFast. Todos os direitos reservados.</div>
    </footer> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>