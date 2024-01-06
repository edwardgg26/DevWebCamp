<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Categoria;
use Model\Dia;
use Model\Evento;
use Model\Hora;
use Model\VistaEvento;
use MVC\Router;

class EventosController {

    public static function index(Router $router) {
        if(!isAdmin()) header("Location: /");

        $pagina_actual = filter_var($_GET["page"], FILTER_VALIDATE_INT);
        if(!$pagina_actual || $pagina_actual < 1) header("Location: /admin/eventos?page=1");
        $registros_por_pagina = 10;
        $total = VistaEvento::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);
        if($paginacion->total_paginas() < $pagina_actual) header("Location: /admin/eventos?page=1");
        $eventos = VistaEvento::paginar($registros_por_pagina, $paginacion->offset());

        $router->render("admin/eventos/index", [
            "titulo"=> "Conferencias y Workshops",
            "eventos" => $eventos,
            "paginacion" => $paginacion->paginacion()
        ]);
    }

    public static function crear(Router $router) {
        if(!isAdmin()) header("Location: /");
        $alertas = [];
        $categorias = Categoria::all();
        $dias = Dia::all("ASC");
        $horas = Hora::all("ASC");
        $evento = new Evento;

        if($_SERVER["REQUEST_METHOD" ] == "POST") {
            $evento->sincronizar($_POST);
            $alertas = $evento->validar();
            if(empty($alertas)){
                $resultado = $evento->guardar();
                if($resultado) header("Location: /admin/eventos");
            }
        }

        $router->render("admin/eventos/crear", [
            "titulo"=> "Agregar Evento",
            "alertas" => $alertas,
            "categorias"=>$categorias,
            "dias"=>$dias,
            "horas"=>$horas,
            "evento" => $evento
        ]);
    }

    public static function editar(Router $router) {
        if(!isAdmin()) header("Location: /");
        $id = filter_var($_GET["id"],FILTER_VALIDATE_INT);
        if(!$id) header("Location: /admin/eventos");

        $alertas = [];
        $categorias = Categoria::all();
        $dias = Dia::all("ASC");
        $horas = Hora::all("ASC");
        $evento = Evento::find($id);

        if($_SERVER["REQUEST_METHOD" ] == "POST") {
            $evento->sincronizar($_POST);
            $alertas = $evento->validar();
            if(empty($alertas)){
                $resultado = $evento->guardar();
                if($resultado) header("Location: /admin/eventos");
            }
        }

        $router->render("admin/eventos/editar", [
            "titulo"=> "Editar Evento",
            "alertas" => $alertas,
            "evento" => $evento,
            "categorias"=>$categorias,
            "dias"=>$dias,
            "horas"=>$horas,
        ]);
    }

    public static function eliminar(){
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $id = filter_var($_POST["id"],FILTER_VALIDATE_INT);
            if(!$id) header("Location: /admin/eventos");
            $evento = Evento::find($id);
            $resultado = $evento->eliminar();
            if($resultado) header("Location: /admin/eventos");
        }
    }
}