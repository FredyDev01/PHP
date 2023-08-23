<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC</title>    
    <!--Jquery-->
    <script src="vista/js/jquery.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!--Tailwind-->
    <link rel="stylesheet" href="vista/css/tailwind.css">
    <!--Js para las vistas-->
    <script src="vista/js/helpers.js"></script>
    <?php
        switch($_GET["url"]){
            case "nuevo":
                echo '<script src="vista/js/nuevo.js"></script>';
                break;
        }
    ?>
<body 
    class="<?= $_GET["url"] === "nuevo" 
        ? "bg-no-repeat bg-cover bg-center bg-fixed bg-bgVistaNuevo" 
        : "bg-gray-100" 
    ?>"    
>