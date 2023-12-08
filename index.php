<?php 

if(isset($_GET['action']) && isset($_GET['controller'])){

    require_once './Controllers/' . $_GET['controller'] . '.php';

    $controller = new $_GET['controller'];

    $controller->{$_GET['action']}();
    


}else{
    require_once './Controllers/ImprimirController.php';
    $controller = new ImprimirController;
    $controller->index();
}