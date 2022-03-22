<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : '';
$nom_alimento = (isset($_POST['nom_alimento '])) ? $_POST['nom_alimento '] : '';
$num_lote = (isset($_POST['num_lote'])) ? $_POST['num_lote'] : '';
$peso = (isset($_POST['peso'])) ? $_POST['peso'] : '';
$cantidad = (isset($_POST['cantidad'])) ? $_POST['cantidad'] : '';
$descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : '';
$promedio= (isset($_POST['promedio'])) ? $_POST['promedio'] : '';
$conversion = (isset($_POST['conversion'])) ? $_POST['conversion'] : '';


$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';


switch($opcion){
    case 1:
        $consulta = "INSERT INTO control_peso (fecha, nom_alimento, num_lote, peso, cantidad, descripcion, promedio, conversion) VALUES('$fecha', '$nom_alimento', '$num_lote', '$peso', '$cantidad', '$descripcion','$promedio','$conversion') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM control_peso ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);        
        break;    
    case 2:        
        $consulta = "UPDATE control_peso SET fecha='$fecha', nom_alimento='$nom_alimento', num_lote='$num_lote', peso='$peso', cantidad='$cantidad', descripcion='$descripcion' , promedio='$promedio',conversion='$conversion' WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM control_peso WHERE id='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM control_peso WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM control_peso";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;