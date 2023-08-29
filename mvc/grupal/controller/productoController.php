<?php
require_once('./model/productoModel.php');


class productoController{
    public static function obtenerProductos(){        
        try{            
            $mostrar_producto = new productoModel(null, null, null, null, null, null, null);            
            $data = $mostrar_producto->mostrar();
            $response = [
                'res' => true,
                'data' => $data
            ];
            echo json_encode($response);
        }catch(Exception $err){            
            $response = [
                'res' => false,
                'error' => $err->getMessage()
            ];
            echo json_encode($response);
        }
    }

    public static function agregarProductos() {        
        try{
            $producto = new productoModel(
                $_FILES['imagen']['tmp_name'],
                null,
                $_POST['categoria'],
                $_POST['nombre'],
                $_POST['precio'],
                $_POST['stock'],
                $_POST['descripcion']
            );
            $status = $producto->agregar();
            $response = ["res" => $status];
            echo json_encode($response);
        }catch(Exception $err){
            $response = [
                'res' => false,
                'error' => $err->getMessage()
            ];
            echo json_encode($response);
        }       
    }

    public static function eliminarProducto() {
        try{
            $producto = new productoModel(null, $_GET['public_id'], null, null, null, null, null);
            $data = $producto->eliminar($_GET['id']);
            $response = [
                "res" => $data
            ];
            echo json_encode($response);
        } catch(Exception $e){
            $response = [
                "res" => false,
                "error" => $e->getMessage()
            ];
            echo json_encode($response);
        }
    }

    public static function actualizarProducto() {
        try{                   
            $producto = new productoModel(
                $_FILES['imagen']['tmp_name'],
                $_POST['public_id'],
                $_POST['categoria'],
                $_POST['nombre'],
                $_POST['precio'],
                $_POST['stock'],
                $_POST['descripcion']
            );
            $status = $producto->actualizar($_GET['id']);
            $response = ["res" => $status];
            echo json_encode($response);
        }catch(Exception $e) {
            $response = [
                "res" => false,
                "error" => $e->getMessage() 
            ];
            echo json_encode($response);
        }
    }
}
?>