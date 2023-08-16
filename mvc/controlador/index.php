<?php
require_once("modelo/index.php");

class modeloController{
    private $model;
    public function __construct(){
        $this->model = new Modelo();
    }
    
    public function inicio(){
        try{
            $dato = $this->model->mostrar("animes","1");           
            require_once("vista/index.php");
        }catch(Exception $err){
            echo $err;
        }
    }

    public function nuevo(){
        require_once("vista/nuevo.php");
    }

    public function guardar() {
        var_dump($_FILES);
    }    
}
?>