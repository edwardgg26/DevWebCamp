<div class="sidebar col-md-3 col-lg-2 border border-right p-0">
  <div class="offcanvas-md offcanvas-end" tabindex="-1" id="sidebarMenu"
    aria-labelledby="sidebarMenuLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title fw-bolder" id="sidebarMenuLabel">&#60;DevWebCamp /></h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
        aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link link-primario active d-flex align-items-center gap-2" href="/admin/dashboard">
            <svg class="bi">
              <use xlink:href="#house-fill" />
            </svg>
            Inicio
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link link-primario d-flex align-items-center gap-2" href="/admin/ponentes">
            <svg class="bi">
              <use xlink:href="#person" />
            </svg>
            Ponentes
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link link-primario d-flex align-items-center gap-2" href="/admin/eventos">
            <svg class="bi">
              <use xlink:href="#calendar3" />
            </svg>
            Eventos
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link link-primario d-flex align-items-center gap-2" href="/admin/registrados">
            <svg class="bi">
              <use xlink:href="#people" />
            </svg>
            Registrados
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link link-primario d-flex align-items-center gap-2" href="/admin/regalos">
            <svg class="bi">
              <use xlink:href="#gift" />
            </svg>
            Regalos
          </a>
        </li>
      </ul>

      <hr class="my-3">

      <ul class="nav flex-column mb-auto">
        <li class="nav-item">
          <form method="POST" action="/logout">
            <button class="nav-link link-primario d-flex align-items-center gap-2"><svg class="bi"><use xlink:href="#door-closed" /></svg> Cerrar Sesión</button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</div>