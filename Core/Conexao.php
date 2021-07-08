<?php
namespace Core;

use PDO;

class Conexao extends PDO
{
    private $conexao;

    public function __construct($host, $user, $pass, $database)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->database = $database;
    }

    public function conecta()
    {
        if (!$this->conexao) {
            $con = new PDO("mysql:host=".$this->host.";dbname=".$this->database, $this->user, $this->pass);
            $this->conexao = $con;
        }
        return $this->conexao;
    }
}