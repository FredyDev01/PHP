<?php
class Modelo{
    private $db;    
    private $datos;    
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;port=3306;dbname=db_animeQuest',"root","");
    }

    public function mostrar($tabla, $condicion){
        try{
            $consul="select * from ".$tabla." where ".$condicion.";";
            $resu=$this->db->query($consul);
            while($filas = $resu->fetchAll(PDO::FETCH_ASSOC)) {
                    $this->datos[]=$filas;
            }
            return $this->datos;
        }catch(PDOException $err){            
            throw new Exception("Error al obtener los datos: " . $err->getMessage());
        }
    } 
}
?>