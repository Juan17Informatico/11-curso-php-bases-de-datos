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

class WithdrawalsController
{

    private $connection;

    public function __construct()
    {
        $this->connection = Connection::getInstance()->get_database_instance();
    }

    public function index()
    {
        $stmt = $this->connection->prepare("SELECT * FROM withdrawals");
        $stmt->execute();

        $results = $stmt->fetchAll();

        foreach ($results as $result) {
            echo "Gastaste " . $result["amount"] . " USD es: " . $result["description"] . "\n";
        }

        //Esto es usando Fetch Column
        // $stmt = $this->connection->prepare("SELECT amount, description FROM withdrawals");
        // $stmt->execute();

        // $results = $stmt->fetchAll(\PDO::FETCH_COLUMN, 0);

        // foreach ($results as $result) {
        //     echo "Gastaste $result USD \n"; 
        // }

    }

    public function create()
    {
    }

    public function store($data)
    {

        $stmt = $this->connection->prepare("INSERT INTO withdrawals (payment_method, type, date, amount, description) 
        VALUES ( :payment_method, :type, :date, :amount, :description )");

        $stmt->bindValue(":payment_method", $data["payment_method"]);
        $stmt->bindValue(":type", $data["type"]);
        $stmt->bindValue(":date", $data["date"]);
        $stmt->bindValue(":amount", $data["amount"]);
        $stmt->bindValue(":description", $data["description"]);

        $data["description"] = "Compré cosas para mí";

        $stmt->execute($data);
    }

    public function show($id){

        $stmt = $this->connection->prepare("SELECT * FROM withdrawals WHERE id=:id"); 

        $stmt->execute([
            ":id"=> $id, 
        ]);

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        var_dump($result);

        echo "El registro con id $id dice que te gastaste {$result['amount']} USD en {$result['description']}"; 

    }

    public function edit()
    {
    }

    public function update($data){
        $stmt = $this->connection->
            prepare("UPDATE withdrawals SET 
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

        $stmt = $this->connection->prepare("DELETE FROM withdrawals WHERE id = :id");
        $stmt->execute([
            ":id" => $id
        ]);

    }
}
