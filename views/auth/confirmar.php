<main class="my-5 py-5">
    <h2 class="text-center mb-4"><?php echo $titulo;?></h2>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6 mx-auto">
                <?php require_once __DIR__."/../templates/alertas.php";?>
                <?php if(isset($alertas["success"])):?>
                    <a class="link-primario" href="/login">Inicia Sesión</a>
                <?php endif;?>
            </div>
        </div>
    </div>
</main>