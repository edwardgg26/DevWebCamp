<header class="bg-header h-50">
    <div class="container">
        <nav class="navbar navbar-expand d-flex justify-content-end">
            <div>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if(isAuth()):?>
                        <?php if(isAdmin()):?>
                            <li class="nav-item">
                                <a class="nav-link link-blanco" aria-current="page" href="/admin/dashboard">Administrar</a>
                            </li>
                        <?php endif;?>
                        <li class="nav-item">
                            <form method="POST" action="/logout">
                                <button class="nav-link link-blanco">Cerrar Sesión</button>
                            </form>
                        </li>
                    <?php else:?>
                    <li class="nav-item">
                        <a class="nav-link link-blanco" aria-current="page" href="/registro">Registro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-blanco" href="/login">Iniciar Sesión</a>
                    </li>
                    <?php endif;?>
                </ul>
            </div>
        </nav>

        <div class="py-5 text-blanco">
            <a href="/" class="link-primario text-decoration-none logo p-0 m-2">
                <h1 class="fs-7 fw-bolder">&#60;DevWebCamp /></h1>
            </a>
            <p class="fs-4 mb-1 text-uppercase fw-bold">Octubre 5-6 del 2023</p>
            <p class="fs-5 text-uppercase">En Linea - Presencial</p>

            <a href="/finalizar-registro" class="btn btn-secundario mt-3 mb-5">Comprar Pase</a>
        </div>
    </div>
</header>

<div class="bg-primario">
    <nav class="container navbar navbar-expand-lg" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand fw-bolder shadow-none" href="/">&#60;DevWebCamp /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-lg-flex justify-content-lg-end" id="navbarsExample11">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($_SERVER["REQUEST_URI"] == "/devwebcamp") ? "active" : "";?>" href="/devwebcamp">Evento</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo($_SERVER["REQUEST_URI"] == "/paquetes") ? "active" : "";?>" href="/paquetes">Paquetes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo($_SERVER["REQUEST_URI"] == "/workshops-conferencias") ? "active" : "";?>" href="/workshops-conferencias">Workshops/Conferencias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/finalizar-registro">Comprar Pase</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
    