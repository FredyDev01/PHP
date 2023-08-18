<?php        
    require_once("../config/db_coneccion.php");

    try{
        $GetData = file_get_contents("php://input");
        $JsonData = json_decode($GetData);        
        
        if(empty($JsonData)){            
            throw new Exception("Los campos necesarios para el formulario no fueron enviados.");
        }
        
        $nombre = $JsonData->nombre;
        $precio = $JsonData->precio;
        $stock = $JsonData->stock;
        $envió = $JsonData->envió;
        $caducidad = $JsonData->caducidad;
        $observación = $JsonData->observación;

        $insert = $db->exec("INSERT INTO productos VALUES(NULL, '$nombre', $precio, $stock, '$envió', '$caducidad', '$observación')");                
        $response = ["res" => true];
        echo json_encode($response);    

    }catch(Exception $err){
        $response = [            
            "res" => false,
            "error" => $err->getMessage(),
        ];
        echo json_encode($response);
    }
?> 