<div class="container my-3">
    <h2 class="mb-3"><?php echo $titulo;?></h2>

    <a href="/admin/ponentes/crear" class="btn btn-secundario mb-3"><svg class="bi"><use xlink:href="#add-circle"/></svg> Crear Ponente</a>

    <?php if(!empty($ponentes)):?>
        <div class="overflow-auto">
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Ubicación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($ponentes as $ponente):?>
                    <tr>
                        <td><?php echo $ponente->nombre." ".$ponente->apellido?></td>
                        <td><?php echo $ponente->ciudad.", ".$ponente->pais?></td>
                        <td>
                            <a href="/admin/ponentes/editar?id=<?php echo $ponente->id;?>" class="btn btn-primario"><svg class="bi"><use xlink:href="#pencil-square"/></svg></a>
                            <form class="d-inline" action="/admin/ponentes/eliminar" method="POST" >
                                <input type="hidden" name="id" value="<?php echo $ponente->id;?>">
                                <button type="submit" class="btn btn-danger">
                                    <svg class='bi'><use xlink:href='#trash'/></svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    
        <?php 
            echo $paginacion;
        ?>
    <?php else:?>
        <p>No hay ponentes en la base de datos.</p>
    <?php endif;?>
</div>