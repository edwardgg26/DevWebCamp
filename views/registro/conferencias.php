<main class="my-5">
    <h2 class="text-center mb-4">
        <?php echo $titulo; ?>
    </h2>
    <p class="text-center mb-3">Elige hasta 5 eventos para asistir de forma presencial.</p>

    <div class="container mb-4">
        
        <div class="row g-3 row-cols-1 row-cols-md-2">
            <div class="col-md-8">

                <h3 class="h1 text-secundario">&#60;Conferencias /></h3>
                <p class="text-secondary fs-5">Viernes 5 de Octubre</p>

                <div class="row row-cols-1 row-cols-md-2">
                    <?php foreach ($eventos["conferencias_v"] as $evento): ?>
                        <?php include __DIR__ ."/evento.php";?>
                    <?php endforeach; ?>
                </div>
                <p class="text-secondary mt-4 fs-5">Sabado 6 de Octubre</p>
                <div class="row row-cols-1 row-cols-md-2">
                    <?php foreach ($eventos["conferencias_s"] as $evento): ?>
                        <?php include __DIR__ ."/evento.php";?>
                    <?php endforeach; ?>
                </div>

                <h3 class="h1 mt-4 text-primario">&#60;Workshops /></h3>
                <p class="text-secondary fs-5">Viernes 5 de Octubre</p>

                <div class="row row-cols-1 row-cols-md-2">
                    <?php foreach ($eventos["workshops_v"] as $evento): ?>
                        <?php include __DIR__ ."/evento.php";?>
                    <?php endforeach; ?>
                </div>
                <p class="text-secondary mt-4 fs-5">Sabado 6 de Octubre</p>
                <div class="row row-cols-1 row-cols-md-2">
                    <?php foreach ($eventos["workshops_s"] as $evento): ?>
                        <?php include __DIR__ ."/evento.php";?>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <div class="col-md-4">
                <h3>Tu Registro</h3>

                <div id="registro-resumen">

                </div>

                <div>
                    <div class="mb-3">
                        <label for="regalo" class="form-label">Seleccionar regalo</label>
                        <select id="regalo" class="form-select" aria-label="Seleccionar regalo">
                            <option value="">Selecciona un regalo...</option>
                            <?php foreach ($regalos as $regalo): ?>
                                <?php if ($regalo->id !== "0"): ?>
                                    <option value="<?php echo $regalo->id;?>"><?php echo $regalo->nombre;?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <form id="registro">
                        <input type="submit" class="btn btn-primario w-100" value="Registrarme">
                    </form>
                </div>
            </div>
        </div>
        

    </div>



</main>