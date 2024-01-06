<?php

namespace Controllers;

use Model\Evento;
use Model\VistaRegistro;
use MVC\Router;

class DashboardController {

    public static function index(Router $router) {

        $registros = VistaRegistro::get(5);
        $virtuales = VistaRegistro::total('id_paquete',2);
        $presenciales = VistaRegistro::total('id_paquete',1);

        $ingresos = ($virtuales * 36.59) + ($presenciales * 74.43);

        $menos_disponibles = Evento::orderLimit('disponibles','ASC',5);
        $mas_disponibles = Evento::orderLimit('disponibles','DESC',5);

        $router->render("admin/dashboard/index", [
            "titulo"=> "Panel de Administración",
            'registros'=>$registros,
            'ingresos'=>$ingresos,
            'menos_disponibles'=>$menos_disponibles,
            'mas_disponibles'=>$mas_disponibles
        ]);
    }
}


?>