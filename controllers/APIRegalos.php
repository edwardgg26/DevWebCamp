<?php

namespace Controllers;
use Model\Regalo;
use Model\Registro;


class APIRegalos {

    public static function index() {

        if(!isAdmin()) return json_encode([]);
        $regalos = Regalo::all("ASC");

        foreach($regalos as $regalo){
            $regalo->total = Registro::totalArray(['id_regalo'=>$regalo->id, 'id_paquete'=>"1"]);
        }

        echo json_encode($regalos);
        return;
    }
}