<?php
require("../vendor/autoload.php");

use App\Controllers\IncomesController;
use App\Controllers\WithdrawalsController;
use Router\RouterHandler;


// Obtener la URL
$slug = $_GET["slug"] ?? "";
$slug = explode("/", $slug);

$resource = $slug[0] == "" ? "/" : $slug[0];
$id = $slug[1] ?? null;

//Instancia del router
$router = new RouterHandler();

switch ($resource) {
    case "/":
        echo "Estás en la front page"; 
        break;
    
    case "incomes": 
        
        $method = $_POST["method"] ?? "get";
        $router->set_method($method);
        $router->set_data($_POST);

        $router->route(IncomesController::class, $id);

        // echo "Estás en el incomes controler"; 

        break; 
    
    case "withdrawals": 
        // echo "Estás en el withdrawls"; 

        $method = $_POST["method"] ?? "get";
        $router->set_method($method);
        $router->set_data($_POST);

        $router->route(WithdrawalsController::class, $id);

        break;

    default:
        echo "404 Not Found"; 
        break;
}