<?php
require_once('./config/database.php');


class productoModel{
    private $file_image;
    private $nombre;
    private $precio;
    private $stock;
    private $db;

    public function __construct($file_image, $nombre, $precio, $stock){        
        $this->db = ConexionDB::obtenerConexion();
        $this->file_image = $file_image;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->stock = $stock;
    }

    /*---------- MÉTODOS CRUD PARA LOS PRODUCTOS ----------*/
    
    public function mostrar() {
        try{
            $query = $this->db->query("SELECT * FROM product");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            return $data;  
        }catch(Exception $e) {
            throw new Exception('Error al mostrar: ' . $e->getMessage());
        }
    }

    public function agregar() {
        $sql = "INSERT INTO product VALUES (NULL, :urlImage, :public_id, :nombre, :precio, :stock)";           
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':urlImage', '', PDO::PARAM_STR);
        $stmt->bindParam(':public_id', '', PDO::PARAM_STR);
        $stmt->bindParam(':nombre', $this->nombre, PDO::PARAM_STR);
        $stmt->bindParam(':precio', $this->precio, PDO::PARAM_INT);
        $stmt->bindParam(':stock', $this->stock, PDO::PARAM_INT);        
        try{
            $status = $stmt->execute();
            return $status; 
        }catch(Exception $e){
            throw new Exception('Error al agregar: ' . $e->getMessage());
        }
    }

    public function eliminar($id){
        $id = (int) $id;
        $sql = 'DELETE FROM product WHERE id_producto = :id'; 
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);        
        try {
            $status = $stmt->execute();
            return $status;
        } catch (PDOException $e) {
            throw new Exception('Error al eliminar: ' . $e->getMessage());
        }
    }

    public function actualizar($id){
        $id = (int) $id;
        $sql = 'UPDATE product SET nombre=:nombre, precio=:precio, stock=:stock WHERE id_producto = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nombre', $this->nombre, PDO::PARAM_STR);
        $stmt->bindParam(':precio', $this->nombre, PDO::PARAM_INT);
        $stmt->bindParam(':stock', $this->nombre, PDO::PARAM_INT);
        try{
            $status = $stmt->execute();
            return $status;
        }catch(Exception $e){
            throw new Exception('Error al actualizar: ' . $e->getMessage());
        }
    }
}

?>