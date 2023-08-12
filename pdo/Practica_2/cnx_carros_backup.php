<?php
    include_once("./credentials.php");
    try{
        $db = new PDO("mysql:host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_BACKUP.";charset=".DB_CHARSET, DB_USERNAME, DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Conexion exitosa en: <strong>".DB_BACKUP."</strong> <br />";
    }catch(PDOException $err){
        echo "Error de conexion: ". $err;
    }
?>