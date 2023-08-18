<?php
    require_once("../config/db_coneccion.php");

    try{
        $result = $db->query("SELECT * FROM productos");
        $data = $result->fetchAll(PDO::FETCH_OBJ);
        $response = [
            "data" => $data,
            "res" => true,             
        ];
        echo json_encode($response);    
    }catch(Exception $err){
        $response = [
            "data" => null,
            "res" => false,
            "error" => $err->getMessage(),
        ];
        echo json_encode($response);
    }
?> 