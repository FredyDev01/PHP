<?php 
    require_once('./conexion3.php');    
    require_once('./conexion4.php');
    $registros = $db->exec('INSERT INTO alumnos (nombre, apellidos, dni) VALUES("Juan", "Montengro Suarez", 85743784)');
    if($registros){
        echo "Se han activado $registros registros.";
    }
?>