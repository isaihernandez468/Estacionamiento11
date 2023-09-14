<?php

include('../app/config.php');

/** aqui estamos rescatando los valores del formulario para actualizar la base de datos */
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$id_user = $_POST['id_user'];
$rol = $_POST['rol'];

    date_default_timezone_set('America/Mexico_City');
    $fechaHora = date("Y-m-d H:i:s");


    //aqui se dice que de la tabla tb_usuario  se actualizen los campos
    $sentencia = $pdo->prepare("UPDATE tb_usuarios SET
    rol = :rol
    WHERE id = :id");
    
    $sentencia->bindParam(':rol', $rol);
    $sentencia->bindParam(':id', $id_user);


    //aqui se comprueba y ejecuta la actualizacion de datos
    if($sentencia->execute()){
        echo "se asigno el rol de manera correcta";
        ?>
        <script>location.href = "../roles/asignar.php";</script>
        <?php
    }else{
        echo "error al actualizar el usuario";
    }

?>