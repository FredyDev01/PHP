<?php
    $opciones = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"];
    try{
        $db = new PDO('mysql:host=localhost;port=3306;dbname=db_carros_primary', 'root', '', $opciones);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "conexion exitosa en: db_carros_primary <br />";
    }catch(PDOException $e){
        echo 'Fallo la conexion' . $e->getMessage();
    }
?>