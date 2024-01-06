<main class="my-5">
    <h2 class="text-center mb-4"><?php echo $titulo;?></h2>
    <p class="text-center">Ingresa tu contraseña nueva.</p>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 mx-auto">
                <div>
                    <?php require_once __DIR__."/../templates/alertas.php";?>
                </div>

                <?php if($token_valido == true):?>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña Nueva</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <input type="submit" class="btn btn-primario mb-3" value="Reestablecer">
                            <p class="m-0">¿Ya tienes una cuenta? <a class="link-primario" href="/login">Inicia Sesión</a></p>
                        </div>
                    </form>
                <?php endif;?>
            </div>
        </div>
    </div>
</main>