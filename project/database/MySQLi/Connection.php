<?php

namespace Database\MySQLi;

use mysqli;

class Connection
{
    protected $server = "localhost";
    protected $database = "finanzas_personales";
    protected $username = "root";
    protected $password = "";   
    private static $instance;
    private $connection; 

    private function __construct(){
        $this->get_database_instance();
    }

    public static function getInstance(){

        if (!self::$instance instanceof self)
            self::$instance = new self();
        return self::$instance;
    }

    public function get_database_instance(){
        return $this->connection; 
    }

    private function make_connection(){


        //Orientada a objetos
        $mysqli = new mysqli($this->server, $this->username, $this->password, $this->database);

        // Comprobar conexión de manera orientada a objetos
        if ($mysqli->connect_errno)
            die("Falló la conexión: {$mysqli->connect_error}");

        // Esto nos ayuda a poder usar cualquier caracter en nuestras consultas
        $setnames = $mysqli->prepare("SET NAMES 'utf8'");
        $setnames->execute();

        $this->connection = $mysqli; 
    }
}

$connect = new Connection();

$connect->getInstance();

var_dump($connect); 

// Esta es la forma procedural 
// $mysqli = mysqli_connect($server, $username, $password, $database);

// Comprobar conexión de manera procedural
// if( !$mysqli )
//     die("Falló la conexión" . mysqli_connect_error());
