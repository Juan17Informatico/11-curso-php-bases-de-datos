<?php

namespace App\Controllers;

use Database\PDO\Connection;

/**
 * Los 7 métodos que suelen tener los controladores:
 * index: muestra la lista de todos los recursos.
 * create: muestra un formulario para ingresar un nuevo recurso. (luego manda a llamar al método store).
 * store: registra dentro de la base de datos el nuevo recurso.
 * show: muestra un recurso específico.
 * edit: muestra un formulario para editar un recurso. (luego manda a llamar al método update).
 * update: actualiza el recurso dentro de la base de datos.
 * destroy: elimina un recurso.
 */

class IncomesController
{

    private $connection;

    public function __construct()
    {
        $this->connection = Connection::getInstance()->get_database_instance();
    }

    public function index(){

        $stmt = $this->connection->prepare("SELECT * FROM incomes");
        $stmt->execute();

        $results = $stmt->fetchAll();

        require("../resources/views/incomes/index.php");

    }

    public function create(){

        require("../resources/views/incomes/create.php");

    }

    public function store($data){

        $stmt = $this->connection->prepare("INSERT INTO incomes (payment_method, type, date, amount, description) 
        VALUES ( :payment_method, :type, :date, :amount, :description )");
        
        $stmt->bindValue(":payment_method", $data["payment_method"]);
        $stmt->bindValue(":type", $data["type"]);
        $stmt->bindValue(":date", $data["date"]);
        $stmt->bindValue(":amount", $data["amount"]);
        $stmt->bindValue(":description", $data["description"]);

        $stmt->execute();

        header("location: incomes");

    }

    public function show($id){
        $stmt = $this->connection->prepare("SELECT * FROM incomes WHERE id=:id"); 

        $stmt->execute([
            ":id"=> $id, 
        ]);

        // echo "El registro con id $id dice que te gastaste {$result['amount']} USD en {$result['description']}"; 
    }

    public function edit()
    {
    }

    public function update($data){
        $stmt = $this->connection->
            prepare("UPDATE incomes SET 
                payment_method = :payment_method,
                type = :type, 
                date = :date, 
                amount = :amount, 
                description = :description 
                WHERE id = :id "); 

        $stmt->bindValue(":id", $data["id"]); 
        $stmt->bindValue(":payment_method", $data["payment_method"]);
        $stmt->bindValue(":type", $data["type"]);
        $stmt->bindValue(":date", $data["date"]);
        $stmt->bindValue(":amount", $data["amount"]);
        $stmt->bindValue(":description", $data["description"]);

        $stmt->execute($data);
    }

    public function destroy($id){
        
        // $this->connection->exec("DROP TABLE incomes_test"); 
        $stmt = $this->connection->prepare("DELETE FROM incomes WHERE id = :id");
        $stmt->execute([
            ":id" => $id
        ]);


    }
}
