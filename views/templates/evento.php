<div class="swiper-slide">
    <p class="fw-bold my-1">
        <?php echo $evento->hora; ?>
    </p>

    <div class="btn btn-<?php echo ($evento->id_categoria == "1") ? "secundario":"primario"; ?> text-start p-3">
        <h4 class="h5"
            style="display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical; overflow:hidden;">
            <?php echo $evento->nombre; ?>
        </h4>
        <p style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical; overflow:hidden;">
            <?php echo $evento->descripcion; ?>
        </p>

        <div class="d-flex align-items-center">
            <picture style="max-width: 4rem; width: 10%;" class="w-25">
                <source srcset="<?php echo $_ENV["HOST"] . "/img/speakers/" . $evento->imagen; ?>.webp" type="image/webp">
                <source srcset="<?php echo $_ENV["HOST"] . "/img/speakers/" . $evento->imagen; ?>.png" type="image/png">
                <img class="img-thumbnail rounded-5"
                    src="<?php echo $_ENV["HOST"] . "/img/speakers/" . $evento->imagen; ?>.png" alt="Imagén ponente">
            </picture>
            <p class="fw-bold ms-2 mb-0">
                <?php echo $evento->ponente; ?>
            </p>
        </div>
    </div>
</div>