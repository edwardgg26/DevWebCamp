<main class="my-5">
    <h2 class="text-center mb-4"><?php echo $titulo;?></h2>
    <p class="text-center mb-5">Tu Boleto - te recomendamos almacenarlo, puedes compartirlo en redes sociales.</p>

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 bg-primario rounded-4 p-3 text-blanco">
                <h3>&#60;DevWebCamp /></h3>
                <p><span class="fw-bold">Paquete:</span> <?php echo $registro->paquete->nombre;?></p>
                <p><span class="fw-bold">Registrado/a:</span> <?php echo $registro->usuario->nombre. " ".$registro->usuario->apellido;?></p>
                <p><span class="fw-bold">Token:</span> #<?php echo $registro->token;?></p>
            </div>
        </div>
    </div>
    
</main>