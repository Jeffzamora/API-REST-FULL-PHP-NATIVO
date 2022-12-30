<?php

$arrayRutas = explode("/",$_SERVER['REQUEST_URI']);

//cuando no se hace ninguna peticion a la API
if(count(array_filter($arrayRutas))==1){
    $json = array(
        "Detalle"=>"No Encontrado"
    );

    echo json_encode($json, true);

    return;


}else{
    //cuando pasamos una peticion en el indice array $arrayRutas
    if(count(array_filter($arrayRutas))==2){
        //cuando se hace una peticion a cursos

        if (array_filter($arrayRutas)[2] == "cursos"){
            if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST" ){
                $cursos = new controllerCursos();
                $cursos->index();
            }

        }
        //cuando se hace una peticion a registro
        if (array_filter($arrayRutas)[2] == "registro"){
            $json = array(
                "Detalle"=>"Estas en la Vista Registro"
            );

            echo json_encode($json, true);

            return;

        }

    }
}