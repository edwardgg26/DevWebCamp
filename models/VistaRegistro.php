<?php

namespace Model;

class VistaRegistro extends ActiveRecord {
    protected static $tabla = 'vista_registros';
    protected static $columnasDB = ['id', 'usuario', 'email', 'id_pago','token','id_paquete' ,'paquete', 'id_regalo','regalo'];

    public $id;
    public $usuario;
    public $email;
    public $id_pago;
    public $token;
    public $id_paquete;
    public $paquete;
    public $id_regalo;
    public $regalo;
    
    public function __construct($args = []){
        $this->id = $args["id"]??null;
        $this->usuario = $args["usuario"]??"";
        $this->email = $args["email"]??"";
        $this->id_pago = $args["id_pago"]??"";
        $this->token = $args["token"]??"";
        $this->id_paquete = $args["id_paquete"]??"";
        $this->paquete = $args["paquete"]??"";
        $this->id_regalo = $args["id_regalo"]??"";
        $this->regalo = $args["regalo"]??"";
    }
}
?>