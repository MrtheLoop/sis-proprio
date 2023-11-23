<?php

Class Conexao

{
    protected $servidor = "localhost";
    protected $porta = 5432;
    protected $dbname = "teste";
    protected $usuario = "postgres";
    protected $senha = "mss@50ft2020";
    protected $con = null;


function __construct(){} //método construtor

// Inicia conexão

function open() {
    $this->con = @pg_connect("host=$this->servidor user=$this->usuario password=$this->senha dbname=$this->dbname");
    return $this->con;
}


function close() {
    @pg_close($this->con);
}
  

// Verifica status da conexão

function statusCon() {
    if(!$this->con){
        echo "<h3>Essa merda não conectou não, seu bosta</h3>";
        exit;
    }
    else {
        echo "<h1>PARABENS SEU BOSTA, CONECTOU NESSA BUCETA</h1>";
    }
}
}


?>