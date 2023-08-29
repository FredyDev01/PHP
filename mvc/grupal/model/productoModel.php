<?php
require_once('./config/database.php');
use Cloudinary\Api\Upload\UploadApi;


class productoModel{    
    private $db;
    private $tmp_image;
    private $public_id;
    private $categoria;
    private $nombre;
    private $precio;
    private $stock;
    private $descripcion;

    public function __construct($tmp_image, $public_id,$categoria, $nombre, $precio, $stock, $descripcion){        
        $this->db = ConexionDB::obtenerConexion();
        $this->tmp_image = $tmp_image;
        $this->public_id = $public_id;
        $this->categoria = $categoria;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->stock = $stock;
        $this->descripcion = $descripcion;
    }

    /*---------- MÉTODOS CRUD PARA LOS PRODUCTOS ----------*/

    public function mostrar(){
        try{
            $query = $this->db->query("SELECT * FROM fasae_producs");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return $data;  
        }catch(Exception $e) {
            throw new Exception('Error al mostrar: ' . $e->getMessage());
        }
    }

    public function agregar(){
        $sql = "INSERT INTO fasae_producs VALUES (NULL, :categoria, :urlImage, :public_id, :nombre, :precio, :stock, :descripcion)";           
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':categoria', $this->categoria, PDO::PARAM_STR);
        $stmt->bindParam(':nombre', $this->nombre, PDO::PARAM_STR);
        $stmt->bindParam(':precio', $this->precio);
        $stmt->bindParam(':stock', $this->stock, PDO::PARAM_INT);    
        $stmt->bindParam(':descripcion', $this->descripcion, PDO::PARAM_STR); 
           
        try{
            $uploadImage = (new UploadApi())->upload($this->tmp_image, [
                "folder" => "Fasae-shop"
            ]);
            $stmt->bindParam(':urlImage', $uploadImage["secure_url"], PDO::PARAM_STR);
            $stmt->bindParam(':public_id', $uploadImage["public_id"], PDO::PARAM_STR);
            $status = $stmt->execute();
            return $status;
        }catch(Exception $e){            
            throw new Exception('Error al agregar: ' . $e->getMessage());
        }
    }

    public function eliminar($id){
        $id = (int) $id;
        $sql = 'DELETE FROM fasae_producs WHERE id_producto = :id'; 
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);        
        try {
            (new UploadApi())->destroy($this->public_id);
            $status = $stmt->execute();
            return $status;
        } catch (PDOException $e) {
            throw new Exception('Error al eliminar: ' . $e->getMessage());
        }
    }

    public function actualizar($id){
        $id = (int) $id;
        $sql = 'UPDATE fasae_producs SET categoria = :categoria, nombre = :nombre, precio = :precio, stock = :stock, descripcion = :descripcion WHERE id_producto = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':categoria', $this->categoria, PDO::PARAM_STR);
        $stmt->bindParam(':nombre', $this->nombre, PDO::PARAM_STR);
        $stmt->bindParam(':precio', $this->precio, PDO::PARAM_INT);
        $stmt->bindParam(':stock', $this->stock, PDO::PARAM_INT);  
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':descripcion', $this->descripcion, PDO::PARAM_STR); 

        try{            
            if(!empty($this->tmp_image)){
                $newImage = (new UploadApi())->upload($this->tmp_image, [
                    "public_id" => $this->public_id
                ]);
                $sql = 'UPDATE product SET url_image = :url_image WHERE id_producto = :id';
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':url_image', $newImage['secure_url'], PDO::PARAM_STR);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            }
            $status = $stmt->execute();
            return $status;
        }catch(Exception $e){
            throw new Exception('Error al actualizar: ' . $e->getMessage());
        }
    }
}

?>