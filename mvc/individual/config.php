<?php        
    /*--------- CONFIGURANDO CLOUDINARY ---------*/
    require_once("vendor/autoload.php");
    use Cloudinary\Configuration\Configuration;                   

    Configuration::instance([
      "cloud" => [
          "cloud_name" => "storingprojectimages", 
          "api_key" => "128712431462116", 
          "api_secret" => "bIA-xKPOfZnRjYRzzvLatap3B8k"
      ],
      "url" => ["secure" => true],
    ]);

    /*--------- RUTA GLOBAL ---------*/
    define("urlsite","http://localhost:85/PHP/mvc");
?>