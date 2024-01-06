<?php

namespace Model;

class EventoRegistro extends ActiveRecord {
    protected static $tabla = 'eventos_registros';
    protected static $columnasDB = ['id', 'id_registro','id_evento'];

    public $id;
    public $id_registro;
    public $id_evento;

    public function __construct($args = []){
        $this->id = $args["id"]??null;
        $this->id_registro = $args["id_registro"]??"";
        $this->id_evento = $args["id_evento"]??"";
    }
}
?>