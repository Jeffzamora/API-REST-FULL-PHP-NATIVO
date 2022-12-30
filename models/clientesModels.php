<?php

require_once "config.php";

class ModelsClientes {

    //Mostrar todo los registro de la tabla clientes
    static public function index($tabla){
        $stmt = conexion::conect()->prepare("SELECT * FROM $tabla");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt-> close();
        $stmt = null;

    }

    static public function creates($tabla,$datos){

        $stmt=conexion::conect()->prepare("INSERT INTO $tabla(nombre, apellido, email, id_cliente, llave_secreta, created_at, updated_at) VALUES (:nombre, :apellido, :email, :id_cliente, :llave_secreta, :created_at, :updated_at)");

       	$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt -> bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_STR);
		$stmt -> bindParam(":llave_secreta", $datos["llave_secreta"], PDO::PARAM_STR);
		$stmt -> bindParam(":created_at", $datos["created_at"], PDO::PARAM_STR);
		$stmt -> bindParam(":updated_at", $datos["updated_at"], PDO::PARAM_STR);
        if($stmt->execute()){
            return "ok";
        }else{
			print_r(conexion::conect()->errorInfo());
		}
        $stmt-> close();
		$stmt = null;
    }
}