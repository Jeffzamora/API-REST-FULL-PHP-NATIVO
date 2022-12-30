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

        //Peticion para Crear Cursos
        if (array_filter($arrayRutas)[2] == "cursos"){
            if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST" ){
                $cursos = new controllerCursos();
                $cursos->create();
            }
            //Peticion para Listar los Cursos
            elseif(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "GET"){
                $cursos = new controllerCursos();
                $cursos->index();
            }

        }
        //Peticion para Crear Registro Cliente
        if (array_filter($arrayRutas)[2] == "registro"){
            if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST" ){
                $datos = array("nombre"=> $_POST["nombre"],
                "apellido"=> $_POST["apellido"],
                "email"=> $_POST["email"]);
                $clientes = new controllerClientes();
                $clientes->create($datos);
            }
        }

    }else{
        if(array_filter($arrayRutas)[2] == "cursos" && is_numeric(array_filter($arrayRutas)[3])){
            //Petecion GET para retornar los ID de los cursos
            if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "GET" ){
                $cursos = new controllerCursos();
                $cursos->show(array_filter($arrayRutas)[3]);
            }

            //Peticion PUT PARA actualizar cursos
            if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "PUT" ){
                $cursos = new controllerCursos();
                $cursos->update(array_filter($arrayRutas)[3]);
            }

            //Peticion DELETE PARA borrar cursos
            if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "DELETE" ){
                $cursos = new controllerCursos();
                $cursos->delete(array_filter($arrayRutas)[3]);
            }

        }
    }
}