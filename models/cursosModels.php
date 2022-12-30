<?php

require_once "config.php";
class ModelsCursos{

    static public function index($tabla){
        $stmt = conexion::conect()->prepare("SELECT * FROM $tabla");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
        $stmt->close();
        $stmt = null;
    }
}