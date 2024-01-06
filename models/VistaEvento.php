<?php

namespace Model;

class VistaEvento extends ActiveRecord {
    protected static $tabla = 'vista_eventos';
    protected static $columnasDB = ['id', 'nombre', 'descripcion','disponibles','id_categoria' ,'categoria', 'id_dia','dia', 'id_hora','hora', 'ponente', 'imagen'];

    public $id;
    public $nombre;
    public $descripcion;
    public $disponibles;
    public $id_categoria;
    public $categoria;
    public $id_dia;
    public $dia;
    public $id_hora;
    public $hora;
    public $ponente;
    public $imagen;
    
    public function __construct($args = []){
        $this->id = $args["id"]??null;
        $this->nombre = $args["nombre"]??"";
        $this->descripcion = $args["descripcion"]??"";
        $this->disponibles = $args["disponibles"]??"";
        $this->id_categoria = $args["id_categoria"]??"";
        $this->categoria = $args["categoria"]??"";
        $this->id_dia = $args["id_dia"]??"";
        $this->dia = $args["dia"]??"";
        $this->id_hora = $args["id_hora"]??"";
        $this->hora = $args["hora"]??"";
        $this->ponente = $args["ponente"]??"";
        $this->imagen = $args["imagen"]??"";
    }
}
?>