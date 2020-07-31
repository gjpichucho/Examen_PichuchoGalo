<?php

include 'conexion.php';

class MainService{

    protected $conex;
    function _construct(){
        $connection= new Connection();
        $this->conex = $connection->getConnection();

    }
}

?>