<?php

namespace Controllers;

use Classes\Paginacion;
use Intervention\Image\ImageManagerStatic as Image;
use Model\Ponente;
use MVC\Router;

class PonentesController {

    public static function index(Router $router) {
        if(!isAdmin()) header("Location: /");

        $pagina_actual = filter_var($_GET["page"], FILTER_VALIDATE_INT);
        if(!$pagina_actual || $pagina_actual < 1) header("Location: /admin/ponentes?page=1");
        $registros_por_pagina = 10;
        $total = Ponente::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);
        if($paginacion->total_paginas() < $pagina_actual) header("Location: /admin/ponentes?page=1");
        
        $ponentes = Ponente::paginar($registros_por_pagina, $paginacion->offset());

        $router->render("admin/ponentes/index", [
            "titulo"=> "Ponentes / Conferencistas",
            "ponentes" => $ponentes,
            "paginacion" => $paginacion->paginacion()
        ]);
    }

    public static function crear(Router $router) {
        if(!isAdmin()) header("Location: /");
        $alertas = [];
        $ponente = new Ponente;
        if($_SERVER["REQUEST_METHOD" ] == "POST") {
            if(!empty($_FILES["imagen"]["tmp_name"])){
                $carpeta_imagenes = "../public/img/speakers";
                if(!is_dir($carpeta_imagenes))mkdir($carpeta_imagenes, 0777, true);

                $imagen_png = Image::make($_FILES["imagen"]["tmp_name"])->fit(800,800)->encode("png",80);
                $imagen_webp = Image::make($_FILES["imagen"]["tmp_name"])->fit(800,800)->encode("webp",80);
                $nombre_imagen = md5(uniqid (rand(), true));
                $_POST["imagen"] = $nombre_imagen;
            }

            $_POST["redes"] = json_encode($_POST["redes"],JSON_UNESCAPED_SLASHES);
            $ponente->sincronizar($_POST);
            $alertas = $ponente->validar();

            if(empty($alertas)) {
                //Guardar Imagenes
                $imagen_png->save($carpeta_imagenes."/".$nombre_imagen.".png");
                $imagen_webp->save($carpeta_imagenes."/".$nombre_imagen.".webp");
                $resultado = $ponente->guardar();
                if($resultado) header("Location: /admin/ponentes");
            }
        }

        $router->render("admin/ponentes/crear", [
            "titulo"=> "Agregar Ponente",
            "alertas" => $alertas,
            "ponente" => $ponente,
            "redes"=>json_decode($ponente->redes)
        ]);
    }

    public static function editar(Router $router) {
        if(!isAdmin()) header("Location: /");
        $id = filter_var($_GET["id"],FILTER_VALIDATE_INT);
        if(!$id) header("Location: /admin/ponentes");

        $alertas = [];
        $ponente = Ponente::find($id);
        $ponente->imagen_actual = $ponente->imagen;

        if($_SERVER["REQUEST_METHOD" ] == "POST") {
            if(!empty($_FILES["imagen"]["tmp_name"])){
                $carpeta_imagenes = "../public/img/speakers";
                unlink($carpeta_imagenes . '/' . $ponente->imagen_actual . ".png" );
                unlink($carpeta_imagenes . '/' . $ponente->imagen_actual . ".webp" );

                if(!is_dir($carpeta_imagenes))mkdir($carpeta_imagenes, 0777, true);

                $imagen_png = Image::make($_FILES["imagen"]["tmp_name"])->fit(800,800)->encode("png",80);
                $imagen_webp = Image::make($_FILES["imagen"]["tmp_name"])->fit(800,800)->encode("webp",80);
                $nombre_imagen = md5(uniqid (rand(), true));
                $_POST["imagen"] = $nombre_imagen;
            }else{
                $_POST["imagen"] = $ponente->imagen_actual;
            }

            $_POST["redes"] = json_encode($_POST["redes"],JSON_UNESCAPED_SLASHES);
            $ponente->sincronizar($_POST);
            $alertas = $ponente->validar();

            if(empty($alertas)) {
                if(isset($nombre_imagen)){
                    $imagen_png->save($carpeta_imagenes."/".$nombre_imagen.".png");
                    $imagen_webp->save($carpeta_imagenes."/".$nombre_imagen.".webp");
                }
                $resultado = $ponente->guardar();
                if($resultado) header("Location: /admin/ponentes");
            }
        }

        $router->render("admin/ponentes/editar", [
            "titulo"=> "Editar Ponente",
            "alertas" => $alertas,
            "ponente" => $ponente,
            "redes"=>json_decode($ponente->redes)
        ]);
    }

    public static function eliminar(){
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $id = filter_var($_POST["id"],FILTER_VALIDATE_INT);
            if(!$id) header("Location: /admin/ponentes");
            $ponente = Ponente::find($id);
            
            $resultado = $ponente->eliminar();
            if($resultado) header("Location: /admin/ponentes");
        }
    }
}
