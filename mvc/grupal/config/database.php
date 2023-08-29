<?php
class ConexionDB{
    public static function obtenerConexion(){
        $options = [
            PDO::MYSQL_ATTR_SSL_CA => './config/cacert-2023-08-22.pem',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]; 
        try{
            $cn = new PDO(
                'mysql:host=aws.connect.psdb.cloud;dbname=projects_data',
                '6eytniuut6en3ht7ogdy', 
                'pscale_pw_BB92DFLGEQWCYqeJ2ZNCCZANJFBCCMThKKVdqU6bxfo', 
                $options
            );                       
            return $cn;
        } catch(PDOException $e){   
            throw new Exception('Error al conectarse a la base de datos' . $e->getMessage());            
        }
    }
}
?>