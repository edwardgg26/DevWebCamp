
<?php 
    include_once "conferencias.php";
?>

<section class="container-fluid bg-datos">
    <div class="container py-5">
        <div class="row g-3 text-blanco text-center">
            <div class="col-6">
                <p class="h1 m-0"><?php echo $ponentes_total;?></p>
                <p class="h5">Speakers</p>
            </div>

            <div class="col-6">
                <p class="h1 m-0"><?php echo $conferencias;?></p>
                <p class="h5">Conferencias</p>
            </div>

            <div class="col-6">
                <p class="h1 m-0"><?php echo $workshops;?></p>
                <p class="h5">Workshops</p>
            </div>

            <div class="col-6">
                <p class="h1 m-0">500</p>
                <p class="h5">Asistentes</p>
            </div>
        </div>
    </div>
</section>

<section class="container px-4 py-5">
    <h2 class="text-center">Speakers</h2>
    <p class="text-center">Conoce a nuestros expertos de DevWebCamp.</p>

    <div class="row g-3 row-cols-1 row-cols-md-2 row-cols-lg-3">
        <?php foreach($ponentes as $ponente):?>
            <div class="col">
                <div class="card">
                    <picture>
                        <source srcset="<?php echo $_ENV["HOST"] . "/img/speakers/" . $ponente->imagen; ?>.webp" type="image/webp">
                        <source srcset="<?php echo $_ENV["HOST"] . "/img/speakers/" . $ponente->imagen; ?>.png" type="image/png">
                        <img class="card-img-top" src="<?php echo $_ENV["HOST"] . "/img/speakers/" . $ponente->imagen; ?>.png" alt="Imagén ponente">
                    </picture>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $ponente->nombre. " ".$ponente->apellido; ?></h5>
                        <p class="card-text"><?php echo $ponente->ciudad. ", ".$ponente->pais; ?></p>
                        <div class="mb-1">
                            <?php if($ponente->redes->facebook):?>
                                <a class="btn btn-secondary" target="_blank" href="<?php echo $ponente->redes->facebook;?>"><svg class="bi"><use xlink:href="#facebook-icon"/></svg></a>
                            <?php endif;?>

                            <?php if($ponente->redes->twitter):?>
                                <a class="btn btn-secondary" target="_blank" href="<?php echo $ponente->redes->twitter;?>"><svg class="bi"><use xlink:href="#twitter-icon"/></svg></a>
                            <?php endif;?>

                            <?php if($ponente->redes->instagram):?>
                                <a class="btn btn-secondary" target="_blank" href="<?php echo $ponente->redes->instagram;?>"><svg class="bi"><use xlink:href="#instagram-icon"/></svg></a>
                            <?php endif;?>
                        </div>
                        <div>
                            <?php foreach($ponente->tags as $tag):?>
                            <button type="button" class="btn btn-primary btn-sm mb-1"><?php echo $tag;?></button>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
           
        <?php endforeach;?>
    </div>
</section>

<section id="mapa" style="height: 45rem; max-height: 25rem;">
</section>

<?php 
    include_once "paquetes.php";
?>
