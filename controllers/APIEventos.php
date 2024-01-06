<?php

namespace Controllers;
use Model\EventoHorario;

class APIEventos {

    public static function index() {
        $dia = filter_var($_GET["id_dia"],FILTER_VALIDATE_INT);
        $categoria = filter_var($_GET["id_categoria"],FILTER_VALIDATE_INT);

        if(!$dia || !$categoria){
            echo json_encode([]);
            return;
        }

        $eventos = EventoHorario::whereArray(['id_dia'=>$dia , 'id_categoria'=>$categoria])??[];
        echo json_encode($eventos);
    }
}