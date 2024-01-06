<?php

namespace Controllers;
use Model\Evento;
use Model\Ponente;
use Model\VistaEvento;
use MVC\Router;

class PaginasController {

    public static function index(Router $router) {
        $eventos = VistaEvento::order('id_hora', 'ASC');
        $eventos_formateados = [];
        foreach($eventos as $evento){
            if($evento->id_dia === "1" && $evento->id_categoria === '1'){
                $eventos_formateados["conferencias_v"][] = $evento;
            }

            if($evento->id_dia === "2" && $evento->id_categoria === '1'){
                $eventos_formateados["conferencias_s"][] = $evento;
            }

            if($evento->id_dia === "1" && $evento->id_categoria === '2'){
                $eventos_formateados["workshops_v"][] = $evento;
            }

            if($evento->id_dia === "2" && $evento->id_categoria === '2'){
                $eventos_formateados["workshops_s"][] = $evento;
            }
        }

        $ponentes_total = Ponente::total();
        $conferencias = Evento::total('id_categoria',1);
        $workshops = Evento::total('id_categoria',2);
        $ponentes = Ponente::all();

        foreach($ponentes as $ponente){
            $ponente->redes = json_decode($ponente->redes);
            $ponente->tags = explode(",",$ponente->tags);
        }

        $router->render("paginas/index", [
            "titulo"=> "Inicio",
            "eventos" => $eventos_formateados,
            "ponentes_total" => $ponentes_total,
            "conferencias"=>$conferencias,
            "workshops"=>$workshops,
            "ponentes" => $ponentes
        ]);
    }

    public static function evento(Router $router) {

        $router->render("paginas/devwebcamp", [
            "titulo"=> "Sobre DevWebCamp"
        ]);
    }

    public static function paquetes(Router $router) {

        $router->render("paginas/paquetes", [
            "titulo"=> "Paquetes DevWebCamp"
        ]);
    }

    public static function conferencias(Router $router) {

        $eventos = VistaEvento::order('id_hora', 'ASC');
        $eventos_formateados = [];
        foreach($eventos as $evento){
            if($evento->id_dia === "1" && $evento->id_categoria === '1'){
                $eventos_formateados["conferencias_v"][] = $evento;
            }

            if($evento->id_dia === "2" && $evento->id_categoria === '1'){
                $eventos_formateados["conferencias_s"][] = $evento;
            }

            if($evento->id_dia === "1" && $evento->id_categoria === '2'){
                $eventos_formateados["workshops_v"][] = $evento;
            }

            if($evento->id_dia === "2" && $evento->id_categoria === '2'){
                $eventos_formateados["workshops_s"][] = $evento;
            }
        }

        $router->render("paginas/conferencias", [
            "titulo"=> "Conferencias & Workshops",
            "eventos" => $eventos_formateados
        ]);
    }

    public static function error(Router $router) {
        $router->render("paginas/error", [
            "titulo"=> "Pagina no encontrada"
        ]);
    }
}