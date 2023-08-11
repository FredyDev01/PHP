<?php
     /*
        EL UTF8:
        Utiliza una configuracion de simbolos, tildes y caracteres especiales para que la base de datos reconosca los mismos.
    */
    $opciones = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"];
    try{
        $db = new PDO('mysql:host=localhost;port=3306;dbname=db_tienda', 'root', '', $opciones);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo 'Fallo la conexion' . $e->getMessage();
    }
?>