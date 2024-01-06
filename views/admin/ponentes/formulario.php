<fieldset class="row g-3">
    <legend>Información Personal</legend>
    <div class="mb-3 col-md-6">
        <label for="nombre" class="form-label">Nombre</label>
        <input value="<?php echo $ponente->nombre??""?>" type="text" class="form-control" id="nombre" name="nombre" aria-describedby="nombre">
    </div>
    <div class="mb-3 col-md-6">
        <label for="apellido" class="form-label">Apellido</label>
        <input value="<?php echo $ponente->apellido??""?>" type="text" class="form-control" id="apellido" name="apellido" aria-describedby="apellido">
    </div>
    <div class="mb-3 col-md-4">
        <label for="pais" class="form-label">Pais</label>
        <input value="<?php echo $ponente->pais??""?>" type="text" class="form-control" id="pais" name="pais" aria-describedby="pais">
    </div>
    <div class="mb-3 col-md-4">
        <label for="ciudad" class="form-label">Ciudad</label>
        <input value="<?php echo $ponente->ciudad??""?>" type="text" class="form-control" id="ciudad" name="ciudad" aria-describedby="ciudad">
    </div>
    <div class="mb-3 col-md-4">
        <label for="imagen" class="form-label">Imagén</label>
        <input class="form-control" type="file" name="imagen" id="imagen">
    </div>

    <?php if(isset($ponente->imagen_actual)):?>
        <div class="mb-3 col-6 col-md-4">
            <p>Imagen Actual:</p>
            <picture>
                <source srcset="<?php echo $_ENV["HOST"]."/img/speakers/".$ponente->imagen_actual?>.webp" type="image/webp">
                <source srcset="<?php echo $_ENV["HOST"]."/img/speakers/".$ponente->imagen_actual?>.png" type="image/png">
                <img class="img-fluid" src="<?php echo $_ENV["HOST"]."/img/speakers/".$ponente->imagen_actual?>.png" alt="Imagén ponente">
            </picture>
        </div>
    <?php endif;?>
</fieldset>

<fieldset class="row g-3">
    <legend>Información Extra</legend>
    <div class="mb-3">
        <label for="tags-input" class="form-label">Areas de Experiencia (separadas por coma)</label>
        <input type="text" class="form-control" id="tags-input" name="tags-input" placeholder="Ejemplo: Javascript,PHP,node.js" aria-describedby="tags-input">
        <ul id="contenedorTags" class="d-flex flex-wrap p-0 list-unstyled">
        
        </ul>
        <input type="hidden" id="tags" name="tags" value="<?php echo $ponente->tags??""?>">
    </div>
</fieldset>

<fieldset class="row g-3">
    <legend>Redes Sociales</legend>
    <div class="col-md-6 input-group mb-2">
        <span class="input-group-text" data-bs-theme="dark" id="facebook"><svg class="bi"><use xlink:href="#facebook-icon"/></svg></span>
        <input value="<?php echo $redes->facebook??""?>" type="text" name="redes[facebook]" class="form-control" placeholder="Facebook" aria-label="facebook" aria-describedby="facebook">
    </div>
    <div class="col-md-6 input-group mb-2">
        <span class="input-group-text" data-bs-theme="dark" id="twitter"><svg class="bi"><use xlink:href="#twitter-icon"/></svg></span>
        <input value="<?php echo $redes->twitter??""?>" type="text" name="redes[twitter]" class="form-control" placeholder="Twitter" aria-label="twitter" aria-describedby="twitter">
    </div>

    <div class="col-md-6 input-group mb-2">
        <span class="input-group-text" data-bs-theme="dark" id="instagram"><svg class="bi"><use xlink:href="#instagram-icon"/></svg></span>
        <input value="<?php echo $redes->instagram??""?>" type="text" name="redes[instagram]" class="form-control" placeholder="Instagram" aria-label="instagram" aria-describedby="instagram">
    </div>
</fieldset>