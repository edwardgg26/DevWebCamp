<main class="my-5">
    <h2 class="text-center mb-4"><?php echo $titulo;?></h2>
    <p class="text-center">Ingresa tus datos para iniciar sesión.</p>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 mx-auto">
                <form method="POST" action="/login">
                    <div>
                        <?php require_once __DIR__."/../templates/alertas.php";?>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <input type="submit" class="btn btn-primario mb-3" value="Ingresar">
                </form>

                <div class="d-flex justify-content-between align-items-center">
                    <p class="m-0">¿Aún no tienes una cuenta? <a class="link-primario" href="/registro">Crea Una</a></p>
                    <a class="link-primario" href="/olvide">Olvidé mi contraseña</a>
                </div>
            </div>
        </div>
    </div>
</main>