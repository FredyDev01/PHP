<?php
require_once('./controller/productoController.php');
require_once('vendor/autoload.php');
use Cloudinary\Configuration\Configuration;

Configuration::instance([
    'cloud' => [
        'cloud_name' => 'storingprojectimages', 
        'api_key' => '128712431462116', 
        'api_secret' => 'bIA-xKPOfZnRjYRzzvLatap3B8k'
    ],
    'url' => ['secure' => true],
]);

if(isset($_GET['method']) && method_exists('productoController', $_GET['method'])){        
    productoController::{$_GET['method']}();
}
?>