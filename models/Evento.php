<?php

namespace Model;

class Evento extends ActiveRecord {
    protected static $tabla = 'eventos';
    protected static $columnasDB = ['id', 'nombre', 'descripcion', 'disponibles', 'id_categoria','id_dia','id_hora','id_ponente'];

    public $id;
    public $nombre;
    public $descripcion;
    public $disponibles;
    public $id_categoria;
    public $id_dia;
    public $id_hora;
    public $id_ponente;
    
    public function __construct($args = []){
        $this->id = $args["id"]??null;
        $this->nombre = $args["nombre"]??"";
        $this->descripcion = $args["descripcion"]??"";
        $this->disponibles = $args["disponibles"]??"";
        $this->id_categoria = $args["id_categoria"]??"";
        $this->id_dia = $args["id_dia"]??"";
        $this->id_hora = $args["id_hora"]??"";
        $this->id_ponente = $args["id_ponente"]??"";
    }

    // Mensajes de validación para la creación de un evento
    public function validar() {
        if(!$this->nombre) {
            self::$alertas['danger'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->descripcion) {
            self::$alertas['danger'][] = 'La descripción es Obligatoria';
        }
        if(!$this->id_categoria  || !filter_var($this->id_categoria, FILTER_VALIDATE_INT)) {
            self::$alertas['danger'][] = 'Elige una Categoría';
        }
        if(!$this->id_dia  || !filter_var($this->id_dia, FILTER_VALIDATE_INT)) {
            self::$alertas['danger'][] = 'Elige el Día del evento';
        }
        if(!$this->id_hora  || !filter_var($this->id_hora, FILTER_VALIDATE_INT)) {
            self::$alertas['danger'][] = 'Elige la hora del evento';
        }
        if(!$this->disponibles  || !filter_var($this->disponibles, FILTER_VALIDATE_INT)) {
            self::$alertas['danger'][] = 'Añade una cantidad de Lugares Disponibles';
        }
        if(!$this->id_ponente || !filter_var($this->id_ponente, FILTER_VALIDATE_INT) ) {
            self::$alertas['danger'][] = 'Selecciona la persona encargada del evento';
        }

        return self::$alertas;
    }
}
?>