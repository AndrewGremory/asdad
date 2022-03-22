<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$nom_alimento = (isset($_POST['nom_alimento'])) ? $_POST['nom_alimento'] : '';
$descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : '';
$fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : '';
$tipo = (isset($_POST['tipo'])) ? $_POST['tipo'] : '';
$cantidad = (isset($_POST['cantidad'])) ? $_POST['cantidad'] : '';



$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';


switch($opcion){
    case 1:
        $consulta = "INSERT INTO alimento (nom_alimento, descripcion, fecha, tipo , cantidad) VALUES('$nom_alimento', '$descripcion', '$fecha', '$tipo', '$cantidad') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM alimento ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);        
        break;    
    case 2:        
        $consulta = "UPDATE alimento SET nom_alimento='$nom_alimento', descripcion='$descripcion', fecha='$fecha', tipo='$tipo', cantidad='$cantidad' WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM alimento WHERE id='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM alimento WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM alimento";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;