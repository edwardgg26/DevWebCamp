<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Registro;
use Model\VistaRegistro;
use MVC\Router;

class RegistradosController {

    public static function index(Router $router) {

        if(!isAdmin()) header("Location: /");

        $pagina_actual = filter_var($_GET["page"], FILTER_VALIDATE_INT);
        if(!$pagina_actual || $pagina_actual < 1) header("Location: /admin/registrados?page=1");
        $registros_por_pagina = 10;
        $total = VistaRegistro::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);
        if($paginacion->total_paginas() < $pagina_actual) header("Location: /admin/registrados?page=1");
        
        $registros = VistaRegistro::paginar($registros_por_pagina, $paginacion->offset());

        $router->render("admin/registrados/index", [
            "titulo"=> "Usuarios Registrados",
            "registros"=>$registros,
            "paginacion" => $paginacion->paginacion()
        ]);
    }
}