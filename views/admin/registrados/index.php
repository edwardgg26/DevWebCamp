<div class="container my-3">
    <h2 class="mb-3"><?php echo $titulo;?></h2>

    <?php if(!empty($registros)):?>
        <div class="overflow-auto">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Usuario</th>
                        <th scope="col">Email</th>
                        <th scope="col">Paquete</th>
                        <th scope="col">Pago</th>
                        <th scope="col">Regalo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($registros as $registro):?>
                    <tr>
                        <td><?php echo $registro->usuario;?></td>
                        <td><?php echo $registro->email;?></td>
                        <td><?php echo $registro->paquete;?></td>
                        <td><?php echo $registro->id_pago;?></td>
                        <td><?php echo $registro->regalo;?></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    
        <?php 
            echo $paginacion;
        ?>
    <?php else:?>
        <p>No hay registros en la base de datos.</p>
    <?php endif;?>
</div>