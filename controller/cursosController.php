<?php

class controllerCursos{
    public function index(){

        $cursos = ModelsCursos::index("cursos");
        $json = array(
            "Detalle"=>$cursos
        );

        echo json_encode($json, true);

        return;
    }

    //Funcion para Ver cursos
    public function create(){
        $json = array(
            "Detalle"=>"Estas en la Vista CREAR cursos"
        );

        echo json_encode($json, true);

        return;
    }

    //Funcion para ver cursos por ID
    public function show($id){
        $json = array(
            "Detalle"=>"Este es el curso con el id -----".$id
        );

        echo json_encode($json, true);

        return;
    }

    //Funcion para Actualizar cursos
    public function update($id){
        $json = array(
            "Detalle"=>"Actualizando Curso --->".$id
        );

        echo json_encode($json, true);

        return;
    }

    //Funcion para Actualizar cursos
    public function delete($id){
        $json = array(
            "Detalle"=>"Curso Borrado --->".$id
        );

        echo json_encode($json, true);

        return;
    }
}