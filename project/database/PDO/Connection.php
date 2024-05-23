<?php

namespace Database\PDO;


class Connection
{
    protected $server;
    protected $database;
    protected $username;
    protected $password;
    protected $sgbd;
    // $driver = "mysql:host=$server;dbname=$database";



    public function __construct($server, $database, $username, $sgbd, $password = "")
    {
        $this->server = $server;
        $this->database = $database;
        $this->username = $username;
        $this->password = $password;
        $this->sgbd = $sgbd;
    }

    public function makeDriver()
    {
        return "$this->sgbd:host=$this->server;dbname=$this->database";
    }


    public function getConexion()
    {
        $driver = self::makeDriver();
        $connection = new \PDO($driver, $this->username, $this->password);

        $setnames = $connection->prepare("SET NAMES 'utf8'");
        $setnames->execute();

        var_dump($setnames);
    }
}


$connection = new Connection(
    "localhost",
    "finanzas_personales",
    "root",
    "mysql"
);


var_dump($connection); 