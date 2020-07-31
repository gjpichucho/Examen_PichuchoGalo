<?php
include './service/conexion.php';

class moduloService{

    function insert($codigo,$nombre,$estado){
        $conex= getConnection();
        $stmt = $conex->prepare("INSERT INTO SEG_MODULO (COD_MODULO,NOMBRE,ESTADO) VALUES (?,?,?)");
        $stmt->bind_param("sss",$codigo,$nombre,$estado);
        $stmt->execute();
        $stmt->close();	

        $conex->close();
    
    }
    
    function findAll(){
        $conex= getConnection();
        return $conex->query("SELECT * FROM SEG_MODULO");
    }
    
    function findByPK($codModulo){
        $conex= getConnection();
        $result = $conex->query("SELECT * FROM SEG_MODULO where COD_MODULO=".$codModulo);
            if ($result->num_rows > 0) {
                return  $result->fetch_assoc();
            }else{
                return null;
            }
    }
    
    function update($nombre,$estado,$codigo){
        $conex= getConnection();
        $stmt = $conex->prepare("UPDATE SEG_MODULO SET  NOMBRE=?, ESTADO=? WHERE COD_MODULO=?");
        $stmt->bind_param("sss",$nombre,$estado,$codigo);
        $stmt->execute();
        $stmt->close();
            
    }
    
    function delete($nombre,$codigo){
        $conex= getConnection();
        $stmt = $conex->prepare("UPDATE  SEG_MODULO SET  NOMBRE=?, ESTADO=? WHERE COD_MODULO=?");
        $stmt->bind_param("sss",$nombre,'INA',$codigo);
        $stmt->execute();
        $stmt->close();
    }
}



?>