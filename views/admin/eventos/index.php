<div class="container my-3">
    <h2 class="mb-3"><?php echo $titulo;?></h2>

    <a href="/admin/eventos/crear" class="btn btn-secundario mb-3"><svg class="bi"><use xlink:href="#add-circle"/></svg> Crear Evento</a>

    <?php if(!empty($eventos)):?>
        <div class="overflow-auto">
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Dia y Hora</th>
                        <th scope="col">Ponente</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($eventos as $evento):?>
                    <tr>
                        <td><?php echo $evento->nombre;?></td>
                        <td><?php echo $evento->categoria;?></td>
                        <td><?php echo $evento->dia.", ".$evento->hora;?></td>
                        <td><?php echo $evento->ponente;?></td>
                        <td>
                            <a href="/admin/eventos/editar?id=<?php echo $evento->id;?>" class="btn btn-primario"><svg class="bi"><use xlink:href="#pencil-square"/></svg></a>
                            <form class="d-inline" action="/admin/eventos/eliminar" method="POST" >
                                <input type="hidden" name="id" value="<?php echo $evento->id;?>">
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
        <p>No hay eventos en la base de datos.</p>
    <?php endif;?>
</div>