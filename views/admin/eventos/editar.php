<div class="container my-3">
    <h2 class="mb-3"><?php echo $titulo;?></h2>

    <a href="/admin/eventos" class="btn btn-secundario"><svg class="bi"><use xlink:href="#arrow-back"/></svg> Volver</a>

    <div class="mt-3">
        <div>
            <?php require_once __DIR__."/../../templates/alertas.php";?>
        </div>
        <form method="POST">
            <?php include_once "formulario.php";?>

            <input type="submit" class="btn btn-primario mt-3" value="Guardar">
        </form>
    </div>
</div>