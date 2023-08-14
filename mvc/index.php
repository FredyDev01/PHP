<?php
    require_once("config.php");
    require_once("controlador/index.php");

    $Controller = new modeloController();

    if(isset($_GET['url']) && method_exists("modeloController",$_GET['url'])):                    
        $Controller->{$_GET['url']}();        
    else:    
        header("location:".urlsite."/inicio");
    endif;    
?>