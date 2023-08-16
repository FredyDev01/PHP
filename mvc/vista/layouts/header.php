<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC</title>
    <!--Framework tailwind-->   
    <link rel="stylesheet" href="<?= urlsite ?>/vista/css/tailwind.css">
    <!--Código reutilizable-->
    <script src="<?= urlsite ?>/vista/js/common.js"></script>                
    <!--Jquery-->
    <script src="<?= urlsite ?>/vista/js/jquery.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<body 
    class="<?= $_GET["url"] === "nuevo" 
        ? "bg-no-repeat bg-cover bg-center bg-fixed bg-bgVistaNuevo" 
        : "bg-gray-100" 
    ?>"
>