<?php 
    include_once('./cnx_carros_main.php');
    include_once('./cnx_carros_backup.php');
    $sql = $db->exec("INSERT INTO carros (Placa, Marca, Modelo, Color, Precio, Fabricación) VALUES ('ABC123', 'Toyota', 'Corolla', 'Azul', 20000, '2022-08-11')");    
    if($sql){
        echo "Se han activado $sql registros";
    }
?>