<main class="my-5">
    <h2 class="text-center mb-4"><?php echo $titulo;?></h2>
    <p class="text-center">Ingresa tu email para recuperar tu contraseña.</p>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 mx-auto">
                <div>
                    <?php require_once __DIR__."/../templates/alertas.php";?>
                </div>
                <form method="POST" action="/olvide">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                    </div>
                    <input type="submit" class="btn btn-primario mb-3" value="Ingresar">
                </form>

                <div class="d-flex justify-content-between align-items-center">
                    <p class="m-0">¿Aún no tienes una cuenta? <a class="link-primario" href="/registro">Crea Una</a></p>
                    <p class="m-0">¿Ya tienes una cuenta? <a class="link-primario" href="/login">Inicia Sesión</a></p>
                </div>
            </div>
        </div>
    </div>
</main>