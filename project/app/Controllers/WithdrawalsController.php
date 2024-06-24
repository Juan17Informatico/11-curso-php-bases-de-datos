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

class WithdrawalsController{

    public function index() {

    }

    public function create() {

    }

    public function store($data) {

        $connection = Connection::getInstance()->get_database_instance(); 

        $stmt = $connection->prepare("INSERT INTO withdrawals (payment_method, type, date, amount, description) 
        VALUES ( :payment_method, :type, :date, :amount, :description )"); 

        $stmt->execute($data); 


    }

    public function show() {

    }

    public function edit() {

    }

    public function update() {

    }

    public function destroy() {

    }


}

