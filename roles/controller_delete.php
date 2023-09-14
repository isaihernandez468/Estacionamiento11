<?php

include('../app/config.php');

//aqui estamoes recibiendo el valor del id
$id_rol = $_GET['id_rol'];
$estado_inactivo = "0";
//aqui estamos calculando la hora actual
date_default_timezone_set('America/Mexico_City');
$fechaHora = date("Y-m-d H:i:s");

//aqui preparamos la consulta
$sentencia = $pdo->prepare("UPDATE tb_roles SET
    estado = :estado, fyh_eliminacion = :fyh_eliminacion
    WHERE id_rol = :id_rol");
    /* aqui estamos apsandole los valores que vienen el get */
    $sentencia->bindParam(':estado', $estado_inactivo,);
    $sentencia->bindParam(':fyh_eliminacion', $fechaHora);
    $sentencia->bindParam(':id_rol', $id_rol);


if($sentencia->execute()){
    echo "se elimino el registro de la manera correcta";
    ?>
    <script>location.href = "../roles/";</script>
    <?php
}else{
    echo "error al eliminar el registro";
}

?>