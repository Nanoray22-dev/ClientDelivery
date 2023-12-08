<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . '/Models/DB.php';

class ClientInfo{
    private $db;
    public function __construct(){
        $database = new Database();
        $this -> db = $database->getConn();
    }
    public function all(){
        $query = "SELECT pedidos.id, clientes.nombre, descripcion, cantidad, precio_unitario, fecha_pedido FROM `pedidos` JOIN clientes ON cliente_id = clientes.id";
        $stm = $this -> db ->prepare($query);
        $stm -> execute();
        $rs = $stm ->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }
    public function selectAll(){
        $query = "SELECT id, nombre FROM clientes";
        $stm = $this ->db ->prepare($query);
        $stm -> execute();
        $rs = $stm ->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }
    function create($cliente, $descripcion, $cantidad, $precioUnitario, $fechaPedido){
        $query = "INSERT INTO pedidos(`cliente_id`, `descripcion`, `cantidad`, `precio_unitario`, `fecha_pedido`) VALUES (?,?,?,?,?)";
        try {
            $stm = $this->db->prepare($query);
            $stm->execute([
                $cliente,
                $descripcion,
                $cantidad,
                $precioUnitario,
                $fechaPedido
            ]);
        } catch (PDOException $e) {
            echo $e->getMessage(); 
        }
    }

}

