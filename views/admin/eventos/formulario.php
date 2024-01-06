<fieldset class="row g-3">
    <legend>Información Evento</legend>
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input value="<?php echo $evento->nombre??""?>" type="text" class="form-control" id="nombre" name="nombre" aria-describedby="nombre">
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea rows="8" class="form-control" id="descripcion" name="descripcion" aria-describedby="descripcion"><?php echo $evento->descripcion??""?></textarea>
    </div>
    <div class="mb-3">
        <label for="categoria" class="form-label">Categoria</label>
        <select id="categoria" name="id_categoria" class="form-select" aria-label="Default select example">
            <option value="">Selecciona una categoria...</option>
            <?php foreach($categorias as $categoria):?> 
            <option <?php echo ($evento->id_categoria === $categoria->id) ? "selected" : "";?>  value="<?php echo $categoria->id;?>"><?php echo $categoria->nombre;?></option>
            <?php endforeach;?> 
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Selecciona el día</label>
        <?php foreach($dias as $dia):?> 
        <div class="form-check">
            <input <?php echo ($evento->id_dia === $dia->id) ? "checked" : "";?> class="form-check-input" type="radio" name="dia" value="<?php echo strtolower($dia->id);?>" id="<?php echo strtolower($dia->nombre);?>">
            <label class="form-check-label" for="<?php echo strtolower($dia->nombre);?>">
                <?php echo $dia->nombre;?>
            </label>
        </div>
        <?php endforeach;?> 
        <input type="hidden" name="id_dia" value="<?php echo $evento->id_dia;?>">
    </div>

    <div>
        <label class="form-label">Selecciona la hora</label>

        <div class="container-fluid p-0 m-0">
            <ul id="horas" class="list-unstyled row g-3">
                <?php foreach($horas as $hora):?> 
                    <li class="col-6">
                        <button type="button" data-hora-id="<?php echo $hora->id;?>" class="btn-hora-disponible btn btn-outline-primario w-100" data-bs-toggle="button" disabled><?php echo $hora->hora;?></button>
                    </li>
                <?php endforeach;?> 
            </ul>
        </div>
        <input type="hidden" name="id_hora" value="<?php echo $evento->id_hora;?>">
    </div>
</fieldset>

<fieldset class="row g-3">
    <legend>Información Extra</legend>

    <div>
        <label for="ponentes" class="form-label">Ponente</label>
        <input placeholder="Buscar Ponente..." type="text" class="form-control" id="ponentes" aria-describedby="ponentes">

        <ul id="listadoPonentes" class="list-unstyled mt-3">

        </ul>
        <input type="hidden" id="ponenteInput" name="id_ponente" value="<?php echo $evento->id_ponente;?>">
    </div>

    <div class="mb-3">
        <label for="disponibles" class="form-label">Lugares Disponibles</label>
        <input value="<?php echo $evento->disponibles??""?>" min="1" type="number" class="form-control" name="disponibles" id="disponibles" aria-describedby="disponibles">
    </div>
</fieldset>