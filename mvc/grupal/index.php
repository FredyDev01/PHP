<?php
require_once("./controller/productoController.php");

if(isset($_GET['method']) && method_exists("productoController", $_GET['method'])){        
    productoController::{$_GET['method']}();
}

?>