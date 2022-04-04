<?php 
    include ('funciones.php');

    $ficha = $_POST['ficha'];
    $tipoprograma = $_POST['tipo_programa'];
    $nombreprograma = $_POST['nombre_programa'];
    $liderficha = $_POST['lider_ficha'];
    
    
    $miconexion=conectar_bd('', 'login');
    // $resultado=consulta($miconexion, "INSERT INTO fichas VALUES ('$ficha', '{$tipoprograma}', '{$nombreprograma}', '{$liderficha}')");
    $resultado= "INSERT INTO fichas VALUES ('$ficha', '{$tipoprograma}', '{$nombreprograma}', '{$liderficha}')";

    $result= mysqli_query($miconexion, $resultado);


    // $ingesta= "INSERT into rap (ficha_id, rcp_id) SELECT id_ficha, rcp.id from fichas f 
    // JOIN resultado_competencia_programa rcp
    // JOIN programa p ON rcp.programa_id = p.id_programa
    // WHERE id_ficha = '$ficha' AND p.pro_nombre = '$nombreprograma'";

    // $result2 = mysqli_query($miconexion, $ingesta); 

     $ingesta=consulta($miconexion, "INSERT into rap (ficha_id, rcp_id) SELECT id_ficha, rcp.id from fichas f 
     JOIN resultado_competencia_programa rcp
     JOIN programa p ON rcp.programa_id = p.id_programa
     WHERE id_ficha = '$ficha' AND p.pro_nombre = '$nombreprograma'");

     // $ingesta;

    // $resultado = "INSERT INTO fichas (id_ficha, tipo_programa, nombre_programa, lider_ficha, ) VALUES ('{$ficha}', '{$tipoprograma}', '{$nombreprograma}', '{$liderficha}')";

    if ($result)
        {
            $ingesta;
            echo "Guardado exitoso";
        }
        mysqli_close($miconexion);
        header('Location: consultar_ficha.php');
?>