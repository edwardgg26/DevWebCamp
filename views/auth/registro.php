<main class="my-5">
    <h2 class="text-center mb-4"><?php echo $titulo;?></h2>
    <p class="text-center">Ingresa los datos para crear una cuenta.</p>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 mx-auto">
                <div>
                    <?php require_once __DIR__."/../templates/alertas.php";?>
                </div>
                <form method="POST" action="/registro">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" aria-describedby="apellido">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="password2" class="form-label">Confirmar Contraseña</label>
                        <input type="password" class="form-control" id="password2" name="password2">
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <input type="submit" class="btn btn-primario mb-3" value="Crear Cuenta">
                        <p>¿Ya tienes una cuenta? <a class="link-primario" href="/login">Inicia Sesión</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>