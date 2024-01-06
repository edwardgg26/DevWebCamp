<?php

namespace Model;

class EventoHorario extends ActiveRecord {
    protected static $tabla = 'eventos';
    protected static $columnasDB = ['id', 'id_categoria','id_dia','id_hora'];

    public $id;
    public $id_categoria;
    public $id_dia;
    public $id_hora;
}
?>