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

    public function show($id){
        $json = array(
            "Detalle"=>"Este es el curso con el id -----".$id
        );

        echo json_encode($json, true);

        return;
    }

    public function update(){
        $json = array(
            "Detalle"=>"Actualizando Curso"
        );

        echo json_encode($json, true);

        return;
    }
}