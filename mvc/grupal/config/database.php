<?php

class ConexionDB{
    public static function obtenerConexion(){        
        try{
            $cn = new PDO('mysql:host=localhost;port=3306;dbname=db_myshop', 'root', '');                        
            $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);            
            return $cn;
        } catch(PDOException $e){     
            throw new Exception('Error al conectarse a la base de datos' . $e->getMessage());            
        }
    }
}

?>