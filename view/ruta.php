<?php

$arrayRutas=explode("/",$_SERVER['REQUEST_URI']);

if(isset($_GET["pagina"]) && is_numeric($_GET["pagina"])){
    $cursos=new controllerCursos();
    $cursos->index($_GET["pagina"]);
}
else{
    if(count(array_filter($arrayRutas)) == 1){
        /*=============================================
		Cuando no se hace ninguna petición a la API
		=============================================*/
        $json=array(
            "detalle"=>"no encontrado"
        );
        echo json_encode($json,true);
        return;
    }
    else{
        /*=============================================
        Cuando pasamos solo un índice en el array $arrayRutas
        =============================================*/
        if(count(array_filter($arrayRutas)) == 2){
            /*=============================================
			Cuando se hace peticiones desde cursos
            =============================================*/
            if(array_filter($arrayRutas)[2] == "cursos"){
                if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST" ){
                    /*=============================================
					Capturar datos
					=============================================*/
                    $datos = array( "titulo"=>$_POST["titulo"],
						"descripcion"=>$_POST["descripcion"],
						"instructor"=>$_POST["instructor"],
						"imagen"=>$_POST["imagen"],
						"precio"=>$_POST["precio"]);
                    $cursos=new controllerCursos();
                    $cursos->create($datos);
                }
                else if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "GET" ){
                    $cursos=new controllerCursos();
                    $cursos->index(null);
                }
            }
            /*=============================================
			Cuando se hace peticiones desde registro
		    =============================================*/
            if(array_filter($arrayRutas)[2] == "registro"){
                if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST" ){
                    $datos = array("nombre" => $_POST["nombre"],
                        "apellido" => $_POST["apellido"],
                        "email" => $_POST["email"]);
                    $clientes=new controllerClientes();
                    $clientes->create($datos);
                }
            }
        }
            else{
                if(array_filter($arrayRutas)[2] == "cursos" && is_numeric(array_filter($arrayRutas)[3])){
                    /*=============================================
		            Peticiones GET
		            =============================================*/
                    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "GET" ){
                        $curso=new controllerCursos();
                        $curso->show(array_filter($arrayRutas)[3]);
                    }
                        /*=============================================
			            Peticiones put
			            =============================================*/
                    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "PUT" ){
                        /*=============================================
			            Capturar datos
			            =============================================*/
                        $datos = array();
                        parse_str(file_get_contents('php://input'), $datos);
                        $editarCurso=new controllerCursos();
                        $editarCurso->update(array_filter($arrayRutas)[3],$datos);
                    }
                        /*=============================================
			            Peticiones DELETE
			            =============================================*/
                    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "DELETE" ){
                        $borrarCurso=new controllerCursos();
                        $borrarCurso->delete(array_filter($arrayRutas)[3]);
                    }
                }
            }
        }
    }
