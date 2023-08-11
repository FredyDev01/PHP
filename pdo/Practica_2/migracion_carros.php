<?php 
    /*
        CASO PRACTICO DE EMPRESAS:
        Se tiene una empresa de autos en el cual las ventas de los carros no se tienen
        un buen control en los productos que es lo que sucede, los precios y las cantidades 
        no son los adecuados existen errores en los montos totales, lo que se requiere es implementar
        una base de datos primaria y de contigencia cone el fin que los autos tengan un control
        de las ventas ok. conforme. 
        - Deberas de crear un script de migracion de php.
        
        DESARROLLO:
        La base de datos tendra una tabla llamada carros y esta contendra los siguientes campos:
        - Placa -> (Primary key) -> VARCHAR (max. 8)
        - Marca -> VARCHAR (max. 50)
        - Modelo -> VARCHAR (max. 50)
        - Color -> VARCHAR (max. 20)
        - Precio -> DOUBLE(max. 10,2)
        - Fabricacion (año) -> DATE
    */
    include_once('./conexion_carros_primary.php');
    include_once('./conexion_carros_secondary.php');
    $sql = $db->exec('INSERT INTO carros (Plac)')
?>