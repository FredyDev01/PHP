<?php
require_once("modelo/index.php");
use Cloudinary\Api\Upload\UploadApi;


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
        try{
            $nombre = $_POST["nombre"];
            $portada = $_FILES["portada"]["tmp_name"];
            $sinopsis = $_POST["sinopsis"];            
            $temporadas = $_POST["temporadas"];
            $lanzamiento = $_POST["lanzamiento"];
            $visualizar = $_POST["visualizar"];
            $uploadImage = (new UploadApi())->upload($portada, [
                "folder" => "anime-track"
            ]);
            $url_image = $uploadImage["secure_url"];
            $public_id = $uploadImage["public_id"];
            
            $data = "'".$nombre."','".$url_image."','".$public_id."','".$sinopsis."',".$temporadas.",'".$lanzamiento."','".$visualizar."'";
            $insert = $this->model->insertar("animes", $data);
            $response = ["res" => $insert];
            echo json_encode($response);
        }catch(Exception $err){
            $response = [
                "res" => false,
                "error" => $err->getMessage(),
            ];
            echo json_encode($response);
        }
    }
}
?>