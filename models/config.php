<?php

class conexion {

    //conexion a la BD
    static public function conect(){
        $link = new PDO("mysql:host=localhost;dbname=api-rest","root","");
        $link->exec("set names utf8");
        return $link;
    }

}