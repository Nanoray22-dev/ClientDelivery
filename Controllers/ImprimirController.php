<?php
require_once $_SERVER['DOCUMENT_ROOT']  . '/Models/ClientInfo.php';
class ImprimirController{

    function index(){
        $join = new ClientInfo;
        $joinData = $join->all(); 
        session_start();
        $_SESSION['join'] = $joinData;
        header('location: ../View/delivery.php'); 
    }
    function create()
    {
        $Data = new ClientInfo;
        $selectData = $Data->selectAll();
        session_start();
        $_SESSION['selectAll'] = $selectData;
        header('location: ../View/Client.php');
    }

    function store(){        
        try {
            $obtenerInfo = new ClientInfo;
            $obtenerInfo->create(
                $_POST['cliente'],
                $_POST['descripcion'],
                $_POST['cantidad'],
                $_POST['precioUnitario'],
                $_POST['fechaPedido']
            );
    
           header('location: ../index.php');
        } catch (PDOException $e) {
            echo  $e->getMessage();
        }
        
    }

}

