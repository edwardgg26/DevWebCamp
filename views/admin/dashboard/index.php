<div class="container px-4 my-3">
    <h2 class="mb-3">
        <?php echo $titulo; ?>
    </h2>

    <div class="row g-3 row-cols-1 row-cols-lg-2">
        <div class="col">
            <div class="btn btn-secundario rounded-4 text-start p-3 w-100">
                <h3 class="h4 text-center">Ultimos Registros</h3>
    
                <div>
                    <?php if (!empty($registros)): ?>
                        <?php foreach ($registros as $registro): ?>
                            <p class="my-2">
                                <?php echo $registro->usuario; ?>
                            </p>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No hay registros en la base de datos.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="btn btn-primario rounded-4 text-start p-3 w-100">
                <h3 class="h4 text-center">Ingresos Totales</h3>
                <p class="my-4 fs-3 fw-bolder text-center">$<?php echo $ingresos;?> USD</p>
            </div>
        </div>

        <div class="col">
            <div class="btn btn-success rounded-4 text-start p-3 w-100">
                <h3 class="h4 text-center">Eventos con más lugares disponibles</h3>
    
                <div>
                    <?php if (!empty($mas_disponibles)): ?>
                        <?php foreach ($mas_disponibles as $evento): ?>
                            <p class="my-2">
                                <?php echo $evento->nombre; ?>
                            </p>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No hay eventos en la base de datos.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="btn btn-terciario rounded-4 text-start p-3 w-100">
                <h3 class="h4 text-center">Eventos con menos lugares disponibles</h3>
    
                <div>
                    <?php if (!empty($menos_disponibles)): ?>
                        <?php foreach ($menos_disponibles as $evento): ?>
                            <p class="my-2">
                                <?php echo $evento->nombre; ?>
                            </p>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No hay eventos en la base de datos.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>