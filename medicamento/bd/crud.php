<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$medicamento = (isset($_POST['medicamento'])) ? $_POST['medicamento'] : '';
$fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : '';
$descripcion  = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : '';
$cantidad= (isset($_POST['cantidad'])) ? $_POST['cantidad'] : '';



$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';


switch($opcion){
    case 1:
        $consulta = "INSERT INTO medicamento (medicamento, fecha, descripcion, cantidad) VALUES('$medicamento', '$fecha', '$descripcion', '$cantidad') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM medicamento ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    
    case 2:        
        $consulta = "UPDATE medicamento SET medicamento='$medicamento', fecha='$fecha', descripcion='$descripcion', cantidad='$cantidad'WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM medicamento WHERE id='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM medicamento WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM medicamento";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;