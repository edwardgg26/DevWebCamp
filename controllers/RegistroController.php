<?php

namespace Controllers;

use Model\Evento;
use Model\EventoRegistro;
use Model\Paquete;
use Model\Regalo;
use Model\Registro;
use Model\Usuario;
use Model\VistaEvento;
use MVC\Router;

class RegistroController {
    public static function crear(Router $router) {

        if(!isAuth()) header("Location: /login");
        $registro = Registro::where('id_usuario',$_SESSION["id"]);

        if(isset($registro) && ($registro->id_paquete == "3" || $registro->id_paquete == "2")){
            header("Location: /boleto?id=".urlencode($registro->token));
        }
        
        if(isset($registro) && $registro->id_paquete == "1"){
            header("Location: /finalizar-registro/conferencias");
        }

        $router->render("registro/crear", [
            "titulo"=> "Finalizar Registro",
        ]);
    }

    public static function gratis() {
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            if(!isAuth())header("Location: /login");

            $token = substr(uniqid(rand(),true), 0 , 8) ;
            $datos = [
                "id_paquete"=>3,
                "id_pago"=>"",
                "token"=>$token,
                "id_usuario"=>$_SESSION["id"]
            ];

            $registro = new Registro($datos);
            $resultado = $registro->guardar();
            if($resultado) header("Location: /boleto?id=".urlencode($registro->token));
        }
    }

    public static function pagar() {
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            if(!isAuth())header("Location: /login");
            if(empty($_POST)) {
                echo json_encode([]);
                return;
            }

            $datos = $_POST;
            $datos["token"] = substr(uniqid(rand(),true), 0 , 8) ;
            $datos["id_usuario"] = $_SESSION["id"];

            try {
                $registro = new Registro($datos);
                $resultado = $registro->guardar();
                echo json_encode($resultado);
            } catch (\Throwable $th) {
                echo json_encode([
                    "resultado" => "danger",
                    "mensaje" => $th
                ]);
            }
        }
    }

    public static function conferencias(Router $router) {

        if(!isAuth()) header("Location: /login");
        $registro = Registro::where('id_usuario',$_SESSION["id"]);

        if(isset($registro) && ($registro->id_regalo !== "0" || $registro->id_paquete !== "1")){
            header("Location: /boleto?id=".urlencode($registro->token));
        }

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

        $regalos = Regalo::all("ASC");

        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $eventos = explode(",",$_POST["eventos"]);
            if(empty($eventos)){
                echo json_encode(["resultado"=>false]);
                return;
            }

            $registro = Registro::where('id_usuario',$_SESSION["id"]);
            
            if(!isset($registro) || $registro->id_paquete !== "1"){
                echo json_encode(["resultado"=>false]);
                return;
            }

            $eventos_array = [];

            foreach($eventos as $id_evento){
                $evento = Evento::find($id_evento);
                
                if(!isset($evento) || $evento->disponibles === "0"){
                    echo json_encode(["resultado"=>false]);
                    return;
                }
                
                $eventos_array[] = $evento;
            }

            foreach($eventos_array as $evento){
                $evento->disponibles -= 1;
                $evento->guardar();

                $datos = [
                    'id_evento'=>$evento->id,
                    'id_registro'=>$registro->id
                ];

                $registro_usuario = new EventoRegistro($datos);
                $registro_usuario->guardar();
            }

            $registro->sincronizar(['id_regalo'=>$_POST["id_regalo"]]);
            $resultado = $registro->guardar();
            if($resultado){
                echo json_encode([
                    'resultado'=>$resultado,
                    'token'=>$registro->token
                ]);
            }else{
                echo json_encode(['resultado'=>false]);
            }
            return;
        }

        $router->render("registro/conferencias", [
            "titulo"=> "Elige tus Workshops/Conferencias",
            "eventos"=>$eventos_formateados,
            "regalos"=>$regalos
        ]);
    }

    public static function boleto(Router $router) {

        $id = $_GET["id"];
        if(!$id || strlen($id) !== 8) header("Location: /");

        $registro = Registro::where('token',$id);
        if(!$registro) header("Location: /");

        $registro->usuario = Usuario::find($registro->id_usuario);
        $registro->paquete = Paquete::find($registro->id_paquete);

        $router->render("registro/boleto", [
            "titulo"=> "Asistencia a DevWebCamp",
            "registro"=>$registro
        ]);
    }
}