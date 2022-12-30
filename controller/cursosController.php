<?php

class controllerCursos{
    public function index(){
            $json = array(
                "Detalle"=>"Estas en la Vista Cursos"
            );

            echo json_encode($json, true);

            return;
    }
    public function create(){
        $json = array(
            "Detalle"=>"Estas en la Vista CREAR cursos"
        );

        echo json_encode($json, true);

        return;
}
}