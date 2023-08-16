<?php 
    //1. convertir el arreglo en string
    $json_datos = ["pepe", 20, "ingles i"];
    $obj = json_encode($json_datos);
    print $obj."<br />";

    //2. convierte el string a un arreglo
    $dato = json_decode($obj);
    print_r($dato);
?>