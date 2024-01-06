<?php

namespace Model;

class Registro extends ActiveRecord {
    protected static $tabla = 'registros';
    protected static $columnasDB = ['id', 'id_paquete', 'id_pago', 'token', 'id_usuario','id_regalo'];

    public $id;
    public $id_paquete;
    public $id_pago;
    public $token;
    public $id_usuario;
    public $id_regalo;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->id_paquete = $args['id_paquete'] ?? '';
        $this->id_pago = $args['id_pago'] ?? '';
        $this->token = $args['token'] ?? '';
        $this->id_usuario = $args['id_usuario'] ?? '';
        $this->id_regalo = $args['id_regalo'] ?? 0;
    }
}
?>