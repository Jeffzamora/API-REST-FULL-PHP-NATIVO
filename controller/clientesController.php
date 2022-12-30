<?php

class controllerClientes {

    public function create(){
        $json = array(
            "Detalle"=>"Estas en la Vista Registro"
        );

        echo json_encode($json, true);

        return;
    }
}