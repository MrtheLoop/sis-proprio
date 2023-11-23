<?php

Class Conexao

{
    protected $servidor = "";
    protected $porta = ;
    protected $dbname = "";
    protected $usuario = "";
    protected $senha = "";
    protected $con = null;


function __construct(){} //método construtor

// Aqui inicia essa poha de conexão

function open() {
    $this->con = @pg_connect("host=$this->servidor user=$this->usuario password=$this->senha dbname=$this->dbname");
    return $this->con;
}

// function adicionar_usuario() {
//     open();

// }

// Aqui é o caralho que encerra essa merda de conexão

function close() {
    @pg_close($this->con);
}
  

// AGORA VERIFICA A MERDA DA CONEXÃO, PRA SABER SE EU DOU UM TIRO NA MINHA CABEÇA

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