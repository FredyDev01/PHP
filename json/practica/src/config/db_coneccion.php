<?php
    try{
        $db = new PDO("mysql:host=localhost;port=3306;dbname=db_tienda;charset=utf8", "root", "");        
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $err){
        echo $err->getMessage();
    }    
?>