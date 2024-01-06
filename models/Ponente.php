<?php

namespace Model;

class Ponente extends ActiveRecord {
    protected static $tabla = 'ponentes';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'pais', 'ciudad', 'imagen', 'tags', 'redes'];

    public $id;
    public $nombre;
    public $apellido;
    public $pais;
    public $ciudad;
    public $imagen;
    public $tags;
    public $redes;

    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->pais = $args['pais'] ?? '';
        $this->ciudad = $args['ciudad'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->tags = $args['tags'] ?? '';
        $this->redes = $args['redes'] ?? '';
    }

    public function validar() {
        if(!$this->nombre) {
            self::$alertas['danger'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->apellido) {
            self::$alertas['danger'][] = 'El Apellido es Obligatorio';
        }
        if(!$this->ciudad) {
            self::$alertas['danger'][] = 'El Campo Ciudad es Obligatorio';
        }
        if(!$this->pais) {
            self::$alertas['danger'][] = 'El Campo País es Obligatorio';
        }
        if(!$this->imagen) {
            self::$alertas['danger'][] = 'La imagen es obligatoria';
        }
        if(!$this->tags) {
            self::$alertas['danger'][] = 'El Campo áreas es obligatorio';
        }
    
        return self::$alertas;
    }
}
?>