<main class="my-5">
    <h2 class="text-center mb-4">Conferencias & Workshops</h2>
    <p class="text-center">Talleres y conferencias dictados por expertos en desarrollo web.</p>

    <div class="container mb-4">
        <h3 class="h1 text-secundario">&#60;Conferencias /></h3>
        <p class="text-secondary fs-5">Viernes 5 de Octubre</p>

        <div class="slider swiper">
            <div class="swiper-wrapper">
                <?php foreach($eventos["conferencias_v"] as $evento):?>
                    <?php include __DIR__ ."../../templates/evento.php";?>
                <?php endforeach;?>
            </div>
            <div class="swiper-button-next" style="color: white;"></div>
            <div class="swiper-button-prev" style="color: white;"></div>
        </div>

        <p class="text-secondary mt-4 fs-5">Sabado 6 de Octubre</p>

        <div class="slider swiper">
            <div class="swiper-wrapper">
                <?php foreach($eventos["conferencias_s"] as $evento):?>
                    <?php include __DIR__ ."../../templates/evento.php";?>
                <?php endforeach;?>
            </div>
            <div class="swiper-button-next" style="color: white;"></div>
            <div class="swiper-button-prev" style="color: white;"></div>
        </div>
    </div>

    <div class="container">
        <h3 class="h1 text-primario">&#60;Workshops /></h3>
        <p class="text-secondary fs-5">Viernes 5 de Octubre</p>

        <div class="slider swiper">
            <div class="swiper-wrapper">
                <?php foreach($eventos["workshops_v"] as $evento):?>
                    <?php include __DIR__ ."../../templates/evento.php";?>
                <?php endforeach;?>
            </div>
            <div class="swiper-button-next" style="color: white;"></div>
            <div class="swiper-button-prev" style="color: white;"></div>
        </div>

        <p class="text-secondary mt-4 fs-5">Sabado 6 de Octubre</p>

        <div class="slider swiper">
            <div class="swiper-wrapper">
                <?php foreach($eventos["workshops_s"] as $evento):?>
                    <?php include __DIR__ ."../../templates/evento.php";?>
                <?php endforeach;?>
            </div>
            <div class="swiper-button-next" style="color: white;"></div>
            <div class="swiper-button-prev" style="color: white;"></div>
        </div>
    </div>
</main>