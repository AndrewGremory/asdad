<?php
include_once("config.php");

$ficha =$_POST["ficha"];


$registros = mysqli_query($con, "SELECT * FROM fichas WHERE id_ficha='$ficha'") or die("Problemas en el select consulta".mysqli_error($con));

if ($reg = mysqli_fetch_array($registros)) {
    mysqli_query($con, "DELETE FROM fichas WHERE id_ficha='$ficha'") or die("Problemas eliminando registros".mysqli_error($con));    

    mysqli_query($con, "DELETE FROM rap WHERE ficha_id='$ficha'") or die("Problemas eliminando registros".mysqli_error($con)); 

    header("Location: consultar_ficha.php");

    
}else{
    echo "No existe la ficha".$ficha;

}
mysqli_close($con);
