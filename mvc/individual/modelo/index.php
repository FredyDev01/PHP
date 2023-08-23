<?php
class Modelo{
    private $db;    
    private $datos;    
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;port=3306;dbname=db_animeQuest',"root","");
    }

    public function mostrar($tabla, $condicion){
        try{
            $consult = "SELECT * FROM ".$tabla." WHERE ".$condicion.";";
            $result = $this->db->query($consult);
            while($filas = $result->fetchAll(PDO::FETCH_ASSOC)) {
                    $this->datos[]=$filas;
            }
            return $this->datos;
        }catch(PDOException $err){            
            throw new Exception("Error al obtener los datos: ".$err->getMessage());
        }
    }

    public function insertar($tabla, $data) {
        try{
            $consult = "INSERT INTO ".$tabla." VALUES(NULL,".$data.")";
            $result = $this->db->exec($consult);
            if($result){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $err) {
            throw new Exception("Error al agregar los datos: ".$err->getMessage());
        }
    }
}
?>